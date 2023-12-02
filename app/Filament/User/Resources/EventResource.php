<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\EventResource\Pages;
use App\Filament\User\Resources\EventResource\RelationManagers;
use App\Models\City;
use App\Models\Event;
use App\Models\State;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
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

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        SelectTree::make('category_id')
                            ->label('Select Category')
                            ->enableBranchNode()
                            ->withCount()
                            ->emptyLabel('Oops! No Category Found')
                            ->relationship('category', 'name', 'parent_id', function ($query) {
                                return $query->where('type', 'event');
                            }),
                        TextInput::make('title')
                            ->label('Event Title')
                            ->placeholder('Enter event title')
                            ->live(onBlur: true)
                            ->required()
                            ->maxLength(191)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('Enter slug')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                        Section::make()
                            ->schema([
                                DateTimePicker::make('start')
                                    ->label('Event Start Date')
                                    ->prefixIcon('heroicon-o-calendar')
                                    ->default(now())
                                    ->required(),
                                DateTimePicker::make('end')
                                    ->label('Event End Date')
                                    ->prefixIcon('heroicon-o-calendar')
                                    ->default(now()->addDays(1))
                                    ->required(),
                            ])->columns(2),
                    ])->columnSpanFull(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Image')
                            ->directory('event/thumbnail')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('gallery')
                            ->label('Event gallery')
                            ->directory('event/gallery')
                            ->multiple()
                            ->maxFiles(4)
                            ->visibility('public')
                            ->required(),
                    ])->columns(2),
                Section::make('Address Details')
                    ->relationship('address')
                    ->schema([
                        Select::make('country_id')
                            ->label('Country')
                            ->live(onBlur: true)
                            ->relationship('country', 'name')
                            ->default(101)
                            ->searchable()
                            ->required(),
                        Select::make('state_id')
                            ->label('State')
                            ->live(onBlur: true)
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('city_id')
                            ->label('City')
                            ->required(),
                        TextInput::make('zip_code')
                            ->label('Zip Code')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\Textarea::make('address_line_1')
                            ->label('Address Line 1')
                            ->placeholder('Enter address line 1')
                            ->required()
                            ->maxLength(191),
                    ])->columns(1),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Enter SEO Title')
                            ->required()
                            ->maxLength(191),
                        TagsInput::make('meta_keywords')
                            ->splitKeys(['Tab', ' ', ','])
                            ->label('Enter SEO Meta Keywords'),
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                    ])->columns(1),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make()
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', auth()->user()->id);
            });
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
