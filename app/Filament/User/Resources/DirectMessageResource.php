<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\DirectMessageResource\Pages;
use App\Models\Claims;
use App\Models\DirectMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DirectMessageResource extends Resource
{
    protected static ?string $model = DirectMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->disabled()
                    ->maxLength(191),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->disabled()
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->disabled()
                    ->maxLength(191),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->disabled()
                    ->maxLength(191),
                Forms\Components\Select::make('status')
                    ->default('Pending')
                    ->native(false)
                    ->options(['Pending' => 'Pending', 'Completed' => 'Completed', 'Cancelled' => 'Cancelled', 'Spam' => 'Spam', 'onHold' => 'On Hold'])
                    ->required(),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->disabled()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->wrap()
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company Name')
                    ->wrap()
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Contact Person')
                    ->wrap()
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Completed' => 'success',
                        'Cancelled', 'Spam' => 'danger',
                        'onHold' => 'primary',
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
            ])
            ->bulkActions([
                //
            ])
            ->modifyQueryUsing(function (Builder $query) {
                // show only the records of the logged-in user's company
                $query->where('company_id', auth()->user()->company->id)->orderBy('created_at', 'desc');
            })
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
            'index' => Pages\ListDirectMessages::route('/'),
        ];
    }
}
