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
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Company')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.address.country.name')
                    ->label('Location')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.established_at')
                    ->label('Established At')
                    ->date('Y-m-d')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.number_of_employees')
                    ->label('Employees')
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
                // View Company Profile
                Tables\Actions\LinkAction::make('view')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->url(fn (BookmarkCompanies $bookmarkCompanies) => route('view.company', $bookmarkCompanies->company->slug)),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc');
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
            'index' => Pages\ListBookmarkCompanies::route('/'),
        ];
    }
}
