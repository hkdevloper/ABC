<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DealResource\Pages;
use App\Filament\Resources\DealResource\RelationManagers;
use App\Models\Deal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealResource extends Resource
{
    protected static ?string $model = Deal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 5;
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
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('offer_start_date'),
                Forms\Components\DateTimePicker::make('offer_end_date'),
                Forms\Components\TextInput::make('price')
                    ->maxLength(191),
                Forms\Components\TextInput::make('discount_type')
                    ->required()
                    ->maxLength(191)
                    ->default('percentage'),
                Forms\Components\TextInput::make('discount_value')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('discount_code')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Textarea::make('terms_and_conditions')
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('offer_start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('offer_end_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_code')
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
            'index' => Pages\ListDeals::route('/'),
            'create' => Pages\CreateDeal::route('/create'),
            'edit' => Pages\EditDeal::route('/{record}/edit'),
        ];
    }
}
