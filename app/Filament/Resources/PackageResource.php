<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make()->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->required(),
                        Forms\Components\Toggle::make('is_popular')
                            ->required(),
                    ])->columns(),
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpanFull()
                        ->maxLength(191),
                    Forms\Components\TextInput::make('duration')
                        ->helperText('If your are creating this package for company profile can show their details for this duration. For example: 30 days, 1 month, 1 year etc.')
                        ->numeric(),
                    Forms\Components\Select::make('duration_type')
                        ->native(false)
                        ->options(Package::$durationTypes),
                    Forms\Components\TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->default(0.00),
                    Forms\Components\TextInput::make('discount_price')
                        ->required()
                        ->numeric()
                        ->default(0.00),
                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])
                    ->columns()
                    ->columnSpan(2),

                Forms\Components\Group::make()->schema([
                    Forms\Components\KeyValue::make('featured')
                        ->addable(false)
                        ->deletable(false)
                        ->keyLabel('Item')
                        ->editableKeys(false)
                        ->valueLabel('Count')
                        ->default([
                            'Company' => '0',
                            'Product' => '0',
                            'Event' => '0',
                            'Jobs' => '0',
                            'Blogs' => '0',
                            'Forums' => '0',
                        ])
                        ->helperText('Enter the number of count which is Available to set item as featured. If you want to set all items as featured then enter 0. If you want to set only 5 items as featured then enter 5.'),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_popular')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([ ]);
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
            'create' => Pages\CreatePackage::route('/create'),
            'view' => Pages\ViewPackage::route('/{record}'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
