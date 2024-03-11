<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\RelationManagers\UserRelationManager;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
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
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                TextInput::make('balance')
                    ->label('Balance')
                    ->required()
                    ->maxLength(191)
                    ->default(0),
                Select::make('type')
                    ->label('Select Type')
                    ->default('user')
                    ->native(false)
                    ->live()
                    ->options([
                        'user' => 'User',
                        'Admin' => 'Admin',
                    ])
                    ->required()
                    ->default('user'),
                TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->live(onBlur: true)
                    ->required(fn(Get $get) => $get('update_password'))
                    ->visibleOn('create')
                    ->visible(function(Get $get, string $operation):bool{
                        if($operation === 'create'){
                            return true;
                        }
                        if($get('update_password')){
                            return true;
                        }
                        return false;
                    })
                    ->maxLength(191),
                Placeholder::make('created')
                    ->label('Created')
                    ->hidden(fn(Get $get) => !$get('id'))
                    ->content(fn (User $record): string => $record->created_at->toFormattedDateString()),
                Placeholder::make('email_verified_at')
                    ->label('Email Verified At')
                    ->hidden(fn(Get $get) => !$get('id'))
                    ->content(fn (User $record): string => $record->email_verified_at ? $record->email_verified_at->toFormattedDateString() : 'Not Verified'),
                TextInput::make('banned_reason')
                    ->label('Banned Reason')
                    ->live(onBlur: true)
                    ->hidden(fn(Get $get) => !$get('banned'))
                    ->required(fn(Get $get) => $get('banned'))
                    ->maxLength(500),
                Forms\Components\Section::make('Status')
                    ->schema([
                        Toggle::make('approved')
                            ->label('Approved')
                            ->disabled(fn(Get $get) => $get('type') === 'Admin')
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
                            ->disabled(fn(Get $get) => $get('type') === 'Admin')
                            ->default(fn(User $record): bool => $record->email_verified_at !== null)
                            ->required(),
                    ])->columns(3),
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
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
