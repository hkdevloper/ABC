<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\ProductResource\Pages;
use App\Filament\User\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
            ->schema([
                Select::make('category_id')
                    ->required()
                    ->relationship('category', 'name'),
                TextInput::make('name')
                    ->live(debounce: 500)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(191),
                TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
                Select::make('condition')
                    ->options([
                        'new' => 'New',
                        'used' => 'Used',
                        'refurbished' => 'Refurbished',
                    ])
                    ->required(),
                TextInput::make('brand')
                    ->maxLength(191),
            ])->columns(3),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->directory('product/thumbnail')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('gallery')
                            ->directory('product/gallery')
                            ->multiple()
                            ->visibility('public'),
                    ])->columns(2),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->maxLength(300),
                        TagsInput::make('meta_keywords'),
                    ])->columns(3),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('seo.title')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('condition')
                    ->label('Condition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand')
                    ->label('Brand')
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
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
