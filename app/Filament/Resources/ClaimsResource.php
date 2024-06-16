<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClaimsResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\CompanyRelationManager;
use App\Models\Claims;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClaimsResource extends Resource
{
    protected static ?string $model = Claims::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';
    protected static ?string $navigationGroup = 'Support & Communication';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->disabled()
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('company_id') // This is the company that the user is claiming
                    ->disabled()
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->disabled()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->disabled()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('website')
                    ->required()
                    ->disabled()
                    ->maxLength(191),
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->disabled()
                    ->maxLength(191),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->disabled()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                    ->default('Pending')
                    ->native(false)
                    ->disabled(fn(Claims $record): bool => $record->status === 'Approved' || $record->status === 'Rejected')
                    ->options([
                        'Pending' => 'Pending',
                        'Approved' => 'Approved',
                        'Rejected' => 'Rejected',
                    ])
                    ->required(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->emptyStateHeading('No Contact Us yet')
            ->emptyStateDescription('Enjoy your day!')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Rejected' => 'danger',
                        'Approved' => 'success',
                    }),
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

            ])
            ->emptyStateActions([])
            ->modifyQueryUsing(function (Builder $query) {
                $query->orderBy('created_at', 'desc');
            });
    }

    public static function getRelations(): array
    {
        return [
            CompanyRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClaims::route('/'),
            'edit' => Pages\EditClaims::route('/{record}/edit'),
        ];
    }
}
