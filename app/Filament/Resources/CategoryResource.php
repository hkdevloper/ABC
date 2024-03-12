<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
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
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Joshembling\ImageOptimizer\Components\SpatieMediaLibraryFileUpload;
use Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationGroup = 'Management';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Toggle::make('is_active')
                        ->default(1)
                        ->label('Active')
                        ->autofocus()
                            ->required(),
                    Toggle::make('is_featured')
                        ->label('Featured')
                        ->autofocus()
                            ->required(),
                ])->columns(),
                FileUpload::make('image')
                    ->label('category image')
                    ->directory('category')
                    ->default(''),
//                SpatieMediaLibraryFileUpload::make('image')
//                    ->label('Category Image')
//                    ->directory('category')
//                    ->autofocus()
                TextInput::make('name')
                    ->label('Enter Category Name')
                    ->live(onBlur: true)
                    ->autofocus()
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->maxLength(70),
                Select::make('type')
                    ->label('Select Type')
                    ->native(false)
                    ->required()
                    ->live(true)
                    ->options([
                        "company" => "Company",
                        "product" => "Product",
                        "job" => "Job",
                        "deal" => "Deals",
                        "blog" => "Blog",
                        "event" => "Event",
                        "forum" => "Forum",
                    ]),
                SelectTree::make('parent_id')
                    ->label('Select Parent Category')
                    ->withCount()
                    ->enableBranchNode()
                    ->live(true)
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('parent', 'name', 'parent_id', function ($query, Forms\Get $get){
                        // Get only active categories and selected Type category
                        return $query->where('type', $get('type'));
                    }),
                Forms\Components\RichEditor::make('description')
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
                    ->label('Description')
                    ->maxLength(65535)
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
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                    ])->columns(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('is_deleted', 0);
            })
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                //Tables\Columns\SpatieMediaLibraryImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active'),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Featured'),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent Category')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $data = $records->all();
                            foreach ($data as $item) {
                                $category = Category::find($item->id);
                                // Delete Related Data
                                $category->seo()->delete();
                                $category->children()->delete();
                                $category->companies()->delete();
                                $category->products()->delete();
                                $category->jobs()->delete();
                                $category->deals()->delete();
                                $category->blogs()->delete();
                                $category->events()->delete();
                                $category->forums()->delete();
                                $category->delete();
                            }
                        }),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
