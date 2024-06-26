<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\DealResource\Pages;
use App\Models\Deal;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
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
use Str;

class DealResource extends Resource
{
    protected static ?string $model = Deal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')->schema([
                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true)
                        ->required(),
                    Toggle::make('is_featured')
                        ->label('Featured')
                        ->required(),
                ])->columns(),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->required()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query) {
                        return $query->where('type', 'deal');
                    }),
                TextInput::make('title')
                    ->label('Enter Title')
                    ->live(onBlur: true)
                    ->required()
                    ->autofocus()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Slug')
                    ->hidden()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->autofocus()
                    ->maxLength(70),
                TextInput::make('discount_price')
                    ->label('Deal Price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('original_price')
                    ->label('MRP (Selling Price)')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\RichEditor::make('description')
                    ->autofocus()
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
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->optimize('webp')
                            ->resize(50)
                            ->label('Thumbnail')
                            ->directory('deals/thumbnail')
                            ->autofocus()
                            ->required(),
                        FileUpload::make('gallery')
                            ->image()
                            ->optimize('webp')
                            ->resize(50)
                            ->label('Gallery')
                            ->directory('deals/gallery')
                            ->maxFiles(4)
                            ->autofocus()
                            ->multiple(),
                    ])->columns(2),
                Forms\Components\RichEditor::make('terms_and_conditions')
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
                        Textarea::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->rows(5)
                            ->maxLength(160),
                    ])->columns(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),

                Tables\Columns\TextColumn::make('original_price')
                    ->label('Price')
                    ->money('INR')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('discount_price')
                    ->label('Discounted Price')
                    ->money('INR')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),
                Tables\Columns\ToggleColumn::make('is_featured')
                    ->label('Featured'),
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
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('company_id', auth()->user()->company->id)->orderBy('created_at', 'desc');
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
            'index' => Pages\ListDeals::route('/'),
            'create' => Pages\CreateDeal::route('/create'),
            'edit' => Pages\EditDeal::route('/{record}/edit'),
        ];
    }
}
