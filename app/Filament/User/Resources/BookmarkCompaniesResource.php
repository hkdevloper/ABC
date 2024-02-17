<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BookmarkCompaniesResource\Pages;
use App\Filament\User\Resources\BookmarkCompaniesResource\RelationManagers;
use App\Models\BookmarkCompanies;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookmarkCompaniesResource extends Resource
{
    protected static ?string $model = BookmarkCompanies::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company')
                    ->wrap()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.email')
                    ->label('Email')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.phone')
                    ->label('Phone')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.website')
                    ->label('Website')
                    ->wrap()
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([]);
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
            'index' => Pages\ListBookmarkCompanies::route('/'),
        ];
    }
}
