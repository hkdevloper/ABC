<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\RelationManagers\UserRelationManager;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Country;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
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

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'User Management';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(components: [
                Forms\Components\Hidden::make('type')
                    ->default('user')
                    ->required(),
                Forms\Components\Hidden::make('email_verified_at'),
                Forms\Components\Section::make([
                    Toggle::make('approved')
                        ->label('Approved')
                        ->disabled(fn(Get $get) => $get('type') === 'Admin')
                        ->autofocus()
                        ->required(),
                    Toggle::make('banned')
                        ->label('Banned')
                        ->live(onBlur: true)
                        ->disabled(fn(Get $get) => $get('type') === 'Admin')
                        ->hidden(fn(Get $get) => !$get('id'))
                        ->required(),
                    Toggle::make('update_password')
                        ->label('Update Password')
                        ->dehydrated(false)
                        ->live(onBlur: true)
                        ->hidden(fn(Get $get) => !$get('id')),
                    Toggle::make('is_verified')
                        ->label('Email Verified')
                        ->dehydrated(false)
                        ->hidden(fn(Get $get) => $get('email_verified_at'))
                        ->afterStateUpdated(function(User $record, Get $get, Set $set){
                            $record->email_verified_at = $get('is_verified') ? now() : null;
                            $set('email_verified_at', $record->email_verified_at);
                        })
                ])
                    ->hidden(fn(Get $get) => !$get('id'))
                    ->columns(4),
                TextInput::make('name')
                    ->label('Enter User Full Name')
                    ->required()
                    ->maxLength(191),
                TextInput::make('email')
                    ->label('Enter User Email')
                    ->email()
                    ->required()
                    ->maxLength(191),
                Placeholder::make('email_verified_at_placeholder')
                    ->label('Email Verified At')
                    ->hidden(fn(Get $get) => !$get('id'))
                    ->content(fn(User $record): string => $record->email_verified_at ? $record->email_verified_at->toFormattedDateString() : 'Not Verified'),
                Select::make('currency')
                    ->label('Select Preferred Currency')
                    ->default('INR')
                    ->native(false)
                    ->preload(false)
                    ->options(function () {
                        $country = Country::where('currency', '!=', null)->get();
                        $currency = [];
                        foreach ($country as $c) {
                            $currency[$c->currency] = $c->currency;
                        }
                        // If There is no currency, then add default
                        if (count($currency) === 0) {
                            $currency['INR'] = 'INR';
                        }
                        return $currency;
                    }),
                TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->live(onBlur: true)
                    ->required(fn(Get $get) => $get('update_password'))
                    ->visibleOn('create')
                    ->visible(function (Get $get, string $operation): bool {
                        if ($operation === 'create') {
                            return true;
                        }
                        if ($get('update_password')) {
                            return true;
                        }
                        return false;
                    })
                    ->maxLength(191),
                TextInput::make('balance')
                    ->prefix('$')
                    ->numeric()
                    ->minValue(0)
                    ->label('Wallet Amount')
                    ->required()
                    ->default(0),
                Placeholder::make('created')
                    ->label('Created')
                    ->hidden(fn(Get $get) => !$get('id'))
                    ->content(fn(User $record): string => $record->created_at->toFormattedDateString()),
                TextInput::make('banned_reason')
                    ->label('Banned Reason')
                    ->live(onBlur: true)
                    ->hidden(fn(Get $get) => !$get('banned'))
                    ->required(fn(Get $get) => $get('banned'))
                    ->maxLength(500),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('approved')->label('Approved'),
                Tables\Columns\IconColumn::make('banned')->label('Banned'),
                Tables\Columns\TextColumn::make('banned_reason')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('balance')
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
                Tables\Filters\Filter::make('banned')
                    ->label('Banned')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('banned', 1);
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                //
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('type', '!=', 'Admin')->orderBy('created_at', 'desc');
            });
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CompanyRelationManager::class,
            RelationManagers\ProductRelationManager::class,
            RelationManagers\EventRelationManager::class,
            RelationManagers\JobsRelationManager::class,
            RelationManagers\BlogsRelationManager::class,
            RelationManagers\DealsRelationManager::class,
            RelationManagers\ForumsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
