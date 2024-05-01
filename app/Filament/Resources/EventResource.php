<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\City;
use App\Models\Event;
use App\Models\State;
use App\Models\User;
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

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Toggle::make('is_active')
                        ->default(true)
                        ->label('Active')
                        ->required(),
                    Toggle::make('is_featured')
                        ->label('Featured')
                        ->required(),
                    Toggle::make('is_claimed')
                        ->label('Claimed')
                        ->live()
                        ->required(),
                    Toggle::make('is_approved')
                        ->default(true)
                        ->label('Approved')
                        ->required(),
                ])->columns(4),
                Select::make('company_id')
                    ->label('Select Company')
                    ->native(false)
                    ->required()
                    ->relationship('company', 'name'),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->required()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query) {
                        return $query->where('type', 'event');
                    }),
                TextInput::make('title')
                    ->label('Enter Title')
                    ->live(onBlur: true)
                    ->required()
                    ->autofocus()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->autofocus()
                    ->maxLength(70),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->autofocus()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start')
                    ->label('Start Date')
                    ->before('end')
                    ->autofocus()
                    ->required(),
                Forms\Components\DatePicker::make('end')
                    ->label('End Date')
                    ->after('start')
                    ->autofocus()
                    ->required(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->optimize('webp')
                            ->label('Thumbnail Image')
                            ->disk('public')
                            ->directory('events/thumbnail')
                            ->visibility('public')
                            ->autofocus()
                            ->required(),
                        FileUpload::make('gallery')
                            ->label('Product Photos')
                            ->image()
                            ->optimize('webp')
                            ->multiple()
                            ->autofocus()
                            ->label('Gallery')
                            ->maxFiles(4)
                            ->disk('public')
                            ->directory('events/gallery')
                            ->visibility('public'),
                    ])->columns(2),

                Section::make('Address Details')
                    ->relationship('address')
                    ->schema([
                        Select::make('country_id')
                            ->label('Country')
                            ->preload()
                            ->live(onBlur: true)
                            ->relationship('country', 'name')
                            ->searchable()
                            ->required(),
                        Select::make('state_id')
                            ->label('State')
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('city')
                            ->label('City')
                            ->autofocus()
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
                            ->maxLength(70),
                        TagsInput::make('meta_keywords')
                            ->splitKeys(['Tab', ','])
                            ->label('Enter SEO Meta Keywords'),
                        Textarea::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->rows(5)
                            ->maxLength(160),
                    ])->columns(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_approved')->label('Approved'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active'),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Featured'),
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
                // filters for status
                Tables\Filters\Filter::make('is_approved')
                    ->label('Approved')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_approved', 1);
                    }),
                Tables\Filters\Filter::make('is_active')
                    ->label('Active')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_active', 1);
                    }),
                Tables\Filters\Filter::make('is_featured')
                    ->label('Featured')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_featured', 1);
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
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
                $query->orderBy('created_at', 'desc');
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
