<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\RelationManagers\UserRelationManager;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(components: [
                TextInput::make('name')
                    ->label('Enter User Full Name')
                    ->required()
                    ->maxLength(191),
                TextInput::make('email')
                    ->label('Enter User Email')
                    ->email()
                    ->required()
                    ->maxLength(191),
                DateTimePicker::make('email_verified_at')->label('Email Verified At'),
                TextInput::make('balance')
                    ->label('Balance')
                    ->required()
                    ->maxLength(191)
                    ->default(0),
                Select::make('type')
                    ->label('Select Type')
                    ->options([
                        'user' => 'User',
                        'admin' => 'Admin',
                    ])
                    ->required()
                    ->default('user'),
                Forms\Components\Section::make('Status')
                    ->schema([
                        Toggle::make('approved')
                            ->label('Approved')
                            ->required(),
                        Toggle::make('taxable')
                            ->label('Taxable')
                            ->required(),
                        Toggle::make('banned')
                            ->label('Banned')
                            ->live(onBlur: true)
                            ->required(),
                        Toggle::make('update_password')
                            ->label('Update Password')
                            ->dehydrated(false)
                            ->live(onBlur: true)
                            ->hidden(fn(Get $get) => !$get('id'))
                            ->required(fn(Get $get) => $get('update_password')),
                    ])->columns(4),
                TextInput::make('password')
                    ->label('Password')
                    ->live(onBlur: true)
                    ->hidden(fn(Get $get) => !$get('update_password'))
                    ->required(fn(Get $get) => $get('update_password'))
                    ->maxLength(191),
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
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ToggleColumn::make('approved')->label('Approved'),
                Tables\Columns\ToggleColumn::make('taxable')->label('Taxable'),
                Tables\Columns\ToggleColumn::make('banned')->label('Banned'),
                Tables\Columns\TextColumn::make('banned_reason')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('balance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
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
