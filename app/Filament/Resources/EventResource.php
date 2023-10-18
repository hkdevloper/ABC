<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\City;
use App\Models\Event;
use App\Models\State;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Toggle::make('is_active')
                    ->label('Active')
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Featured')
                    ->required(),
                Toggle::make('is_claimed')
                    ->label('Claimed')
                    ->required(),
                Toggle::make('is_approved')
                    ->label('Approved')
                    ->required(),
                Select::make('user_id')
                    ->label('Select User')
                    ->relationship('user', 'name'),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->withCount()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query){
                        return $query->where('type', 'event');
                    }),
                TextInput::make('title')
                    ->live(debounce: 500)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state){
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(191),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start')
                    ->label('Start Date')
                    ->required(),
                Forms\Components\DatePicker::make('end')
                    ->label('End Date')
                    ->required(),
                TextInput::make('website')
                    ->url()
                    ->maxLength(191),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->disk('public')
                            ->directory('event/thumbnail')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('gallery')
                            ->disk('public')
                            ->directory('event/gallery')
                            ->visibility('public'),
                    ])->columns(2),

                Section::make('Address Details')
                    ->relationship('address')
                    ->schema([
                        TextInput::make('address_line_1')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('address_line_2')
                            ->required()
                            ->maxLength(191),
                        Select::make('country_id')
                            ->live()
                            ->relationship('country', 'name')
                            ->searchable()
                            ->default(101)
                            ->required(),
                        Select::make('state_id')
                            ->live()
                            ->options(fn (Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('city_id')
                            ->options(fn (Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('zip_code')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('longitude')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('latitude')
                            ->required()
                            ->maxLength(191),
                    ])->columns(4),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->maxLength(300),
                        TagsInput::make('meta_keywords'),
                    ])->columns(3),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seo.title')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->visibility('public')
                    ->disk('public'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_claimed')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->boolean(),

                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('start')
                    ->label('Start Date')
                    // Format: Sep 10, 2021 12:00 AM
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->label('End Date')
                    // Format: Sep 10, 2021 12:00 AM
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('website')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
