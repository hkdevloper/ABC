<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\User;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
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
use Illuminate\Support\Collection;
use Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Featured'),
                Toggle::make('is_claimed')
                    ->label('Claimed')
                    ->live(),
                Toggle::make('is_approved')
                    ->label('Approved')
                    ->default(true)
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
                Select::make('claimed_by')
                    ->label('Claimed By User')
                    ->default(1)
                    ->disabled(fn(Get $get) => !$get('is_claimed'))
                    ->options(fn(Get $get): Collection => User::query()
                        ->where('is_approved', 1)
                        ->where('is_banned', 0)
                        ->pluck('name', 'id'))
                    ->relationship('user', 'name'),
                SelectTree::make('category_id')
                    ->required()
                    ->enableBranchNode()
                    ->label('Select Category')
                    ->withCount()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query){
                        return $query->where('type', 'product');
                    }),
                TextInput::make('name')
                    ->label('Enter Product Name')
                    ->live(onBlur: true)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state){
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(191),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Select::make('condition')
                    ->label('Condition')
                    ->native(false)
                    ->options([
                        'new' => 'New',
                        'used' => 'Used',
                        'refurbished' => 'Refurbished',
                    ])
                    ->required(),
                TextInput::make('brand')
                    ->required()
                    ->label('Brand')
                    ->maxLength(191),
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
                            ->maxLength(191),
                        TagsInput::make('meta_keywords')
                            ->splitKeys(['Tab', ' ', ','])
                            ->label('Enter SEO Meta Keywords'),
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                    ])->columns(1),
            ])->columns(4);
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_approved')->label('Approved'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active'),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Featured'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
