<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WalletHistoryResource\Pages;
use App\Models\WalletHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use ValentinMorice\FilamentJsonColumn\FilamentJsonColumn;

class WalletHistoryResource extends Resource
{
    protected static ?string $model = WalletHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('transaction_id')
                    ->maxLength(191),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(191)
                    ->default('pending'),
                Forms\Components\TextInput::make('method')
                    ->maxLength(191),
                Forms\Components\TextInput::make('currency')
                    ->maxLength(191),
                Forms\Components\TextInput::make('user_email')
                    ->email()
                    ->maxLength(191),
                Forms\Components\TextInput::make('contact')
                    ->maxLength(191),
                Forms\Components\TextInput::make('fee')
                    ->maxLength(191),
                Forms\Components\TextInput::make('tax')
                    ->maxLength(191),
                FilamentJsonColumn::make('json_response')
                    ->disabled()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transaction_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('method')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user_email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('fee')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tax')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\ViewAction::make(),
            ])
            ->emptyStateHeading('No Wallet Histories yet')
            ->emptyStateDescription('Enjoy your day!')
            ->emptyStateActions([
                //
            ])
            ->bulkActions([
                //
            ])
            ->modifyQueryUsing(function (Builder $query) {

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
            'index' => Pages\ListWalletHistories::route('/'),
        ];
    }
}
