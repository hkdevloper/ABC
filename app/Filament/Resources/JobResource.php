<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('category_id')
                    ->relationship('category', 'name'),
                Toggle::make('is_active')
                    ->required(),
                Toggle::make('is_featured')
                    ->required(),
                TextInput::make('title')
                    ->required()
                    ->maxLength(191),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(191),
                TextInput::make('summary')
                    ->maxLength(191),
                Textarea::make('description')
                    ->columnSpanFull(),
                DateTimePicker::make('valid_until'),
                TextInput::make('employment_type')
                    ->maxLength(191),
                TextInput::make('salary')
                    ->maxLength(191),
                TextInput::make('organization')
                    ->maxLength(191),
                Textarea::make('overview')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('education')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Textarea::make('experience')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->directory('events/thumbnail')
                    ->required(),
                FileUpload::make('gallery')
                    ->directory('events/gallery')
                    ->multiple(),
                TextInput::make('website')
                    ->maxLength(191),
                Section::make('address_id')
                    ->label('Address Details')
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
                Section::make('seo_id')
                    ->label('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->maxLength(300),
                        TextInput::make('meta_keywords'),
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
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
