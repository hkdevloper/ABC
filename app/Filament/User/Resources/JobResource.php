<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\JobResource\Pages;
use App\Filament\User\Resources\JobResource\RelationManagers;
use App\Models\Job;
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
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->required()
                    ->relationship('category', 'name'),
                TextInput::make('name')
                    ->live(debounce: 500)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(191),
                TextInput::make('summary')
                    ->maxLength(191),
                TextInput::make('website')
                    ->maxLength(191),
                DateTimePicker::make('valid_until'),
                TextInput::make('employment_type')
                    ->maxLength(191),
                TextInput::make('salary')
                    ->maxLength(191),
                TextInput::make('organization')
                    ->maxLength(191),
                Section::make()
            ->schema([
                Forms\Components\RichEditor::make('description'),
                Forms\Components\RichEditor::make('overview')
                    ->maxLength(65535),
                Forms\Components\RichEditor::make('education')
                    ->maxLength(65535),
                Forms\Components\RichEditor::make('experience')
                    ->maxLength(65535),
            ])->columns(2),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->directory('events/thumbnail')
                            ->required(),
                        FileUpload::make('gallery')
                            ->directory('events/gallery')
                            ->multiple(),
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
                            ->relationship('country', 'name')
                            ->required(),
                        Select::make('state_id')
                            ->relationship('state', 'name')
                            ->required(),
                        Select::make('city_id')
                            ->relationship('city', 'name')
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
                        TextInput::make('map_zoom_level')
                            ->required()
                            ->numeric(),
                        TextInput::make('summary')
                            ->maxLength(300),
                        Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('seo.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('summary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valid_until')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employment_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
