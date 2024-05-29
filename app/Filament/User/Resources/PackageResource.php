<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Placeholder::make('name')
                        ->label('Package Name')
                        ->content(fn (Package $record): string => $record->name),
                    Forms\Components\Placeholder::make('duration')
                        ->content(fn (Package $record): string => $record->duration . ' ' . $record->duration_type),
                    Forms\Components\Placeholder::make('price')
                        ->content(fn (Package $record): string => $record->price . ' / ' . $record->duration_type),
                    Forms\Components\Placeholder::make('discount_price')
                        ->content(fn (Package $record): string => $record->discount_price . ' / ' . $record->duration_type),
                    Forms\Components\RichEditor::make('description')
                        ->columnSpanFull(),
                ])->columnSpan(2)->columns(2),
                Forms\Components\Group::make()->schema([
                    Forms\Components\KeyValue::make('featured')
                        ->label('Featured Items available in this package')
                        ->keyLabel('Items')
                        ->valueLabel('Count')
                        ->helperText('Number of items to be featured in this package'),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ColumnGroup::make('duration')
                    ->label('Duration')
                    ->columns([
                        Tables\Columns\TextColumn::make('duration')
                            ->searchable(),
                        Tables\Columns\TextColumn::make('duration_type')
                            ->searchable(),
                    ]),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_popular')
                    ->label('Popular')
                    ->boolean(),
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

            ])
            ->bulkActions([]);
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
            'index' => Pages\ListPackages::route('/'),
            'view' => Pages\ViewPackage::route('/{record}'),
        ];
    }
}
