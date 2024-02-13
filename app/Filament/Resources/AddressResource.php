<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Locations';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('is_featured')
                    ->label('Featured')
                    ->required(),
                TextInput::make('address_line_1')
                    ->label('Address Line 1')
                    ->required()
                    ->maxLength(191),
                Select::make('country_id')
                    ->label('Select Country')
                    ->preload()
                    ->default(1)
                    ->relationship('country', 'name')
                    ->searchable()
                    ->required(),
                Select::make('state_id')
                    ->label('Select State')
                    ->preload()
                    ->default(1)
                    ->relationship('state', 'name')
                    ->searchable()
                    ->required(),
                TextInput::make('city')
                    ->label('City')
                    ->required(),
                TextInput::make('zip_code')
                    ->label('Zip Code')
                    ->required()
                    ->maxLength(191),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_featured')->label('Featured'),
                Tables\Columns\TextColumn::make('address_line_1')
                    ->label('Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->label('Country')
                    ->sortable(),
                Tables\Columns\TextColumn::make('state.name')
                    ->label('State')
                    ->sortable(),
                Tables\Columns\TextColumn::make('city')
                    ->label('City')
                    ->sortable(),
                Tables\Columns\TextColumn::make('zip_code')
                    ->label('ZIP CODE')
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
                Tables\Filters\Filter::make('is_featured')
                    ->label('Featured')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_featured', 1);
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
