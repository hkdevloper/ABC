<?php

namespace App\Filament\User\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\User\Resources\ProductResource\Pages;
use App\Filament\User\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
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

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        SelectTree::make('category_id')
                            ->label('Select Category')
                            ->enableBranchNode()
                            ->withCount()
                            ->emptyLabel('Oops! No Category Found')
                            ->relationship('category', 'name', 'parent_id', function ($query) {
                                return $query->where('type', 'product');
                            }),
                        TextInput::make('name')
                            ->label('Product Name')
                            ->placeholder('Enter product name')
                            ->live(onBlur: true)
                            ->required()
                            ->maxLength(191)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('Enter slug')
                            ->required()
                            ->hidden()
                            ->unique(ignoreRecord: true)
                            ->maxLength(70),
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->toolbarButtons([
                                'blockquote',
                                'bold',
                                'bulletList',
                                'h2',
                                'h3',
                                'italic',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make()
                    ->schema([
                        TextInput::make('price')
                            ->label('Price')
                            ->placeholder('Enter price')
                            ->numeric()
                            ->default('0.00')
                            ->prefix('₹'),
                        Select::make('condition')
                            ->label('Select Condition')
                            ->native(false)
                            ->default('new')
                            ->options([
                                'new' => 'New',
                                'used' => 'Used',
                                'refurbished' => 'Refurbished',
                            ]),
                        TextInput::make('brand')
                            ->label('Country of Origin')
                            ->placeholder('Enter Country of origin')
                            ->maxLength(191),
                        TextInput::make('color')
                            ->label('Color')
                            ->maxLength(191),
                        TextInput::make('size')
                            ->label('Size')
                            ->maxLength(191),
                        TextInput::make('material')
                            ->label('Material')
                            ->maxLength(191),
                    ])->columns(3),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Image')
                            ->directory('product/thumbnail')
                            ->visibility('public')
                            ->required(),
                        FileUpload::make('gallery')
                            ->label('Product Photos')
                            ->directory('product/gallery')
                            ->multiple()
                            ->maxFiles(4)
                            ->visibility('public')
                            ->required(),
                    ])->columns(2),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Enter SEO Title')
                            ->required()
                            ->maxLength(70),
                        TagsInput::make('meta_keywords')
                            ->splitKeys(['Tab', ','])
                            ->label('Enter SEO Meta Keywords'),
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                    ])->columns(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
