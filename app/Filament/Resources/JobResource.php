<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
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
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name'),
                Forms\Components\Select::make('seo_id')
                    ->relationship('seo', 'title'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\Toggle::make('is_featured')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('summary')
                    ->maxLength(191),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('valid_until'),
                Forms\Components\TextInput::make('employment_type')
                    ->maxLength(191),
                Forms\Components\TextInput::make('salary')
                    ->maxLength(191),
                Forms\Components\TextInput::make('organization')
                    ->maxLength(191),
                Forms\Components\Textarea::make('overview')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('education')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('experience')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('thumbnail')
                    ->maxLength(191),
                Forms\Components\TextInput::make('gallery')
                    ->required(),
                Forms\Components\TextInput::make('website')
                    ->maxLength(191),
                Forms\Components\TextInput::make('address_id')
                    ->numeric(),
            ]);
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
