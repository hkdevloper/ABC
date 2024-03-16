<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('company_id')
                    ->label('Select Company')
                    ->native(false)
                    ->required()
                    ->relationship('company', 'name'),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->autofocus()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query) {
                        return $query->where('type', 'blog');
                    }),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(true)
                    ->autofocus()
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Is Featured')
                    ->autofocus()
                    ->required(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->optimize('webp')
                            ->label('Thumbnail Image')
                            ->directory('blog/thumbnail')
                            ->visibility('public')
                            ->autofocus()
                            ->required(),
                    ]),
                TextInput::make('title')
                    ->label('Enter Title')
                    ->live(onBlur: true)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Blog Slug url')
                    ->unique(ignoreRecord: true)
                    ->autofocus()
                    ->required()
                    ->maxLength(70),
                TagsInput::make('tags')
                    ->splitKeys(['Tab', ','])
                    ->autofocus()
                    ->required(),
                TinyEditor::make('content')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('editor/uploads')
                    ->profile('simple')
                    ->columnSpan('full')
                    ->autofocus()
                    ->required(),
                Textarea::make('summary')
                    ->label('Enter Summary')
                    ->columnSpan('full')
                    ->default('')
                    ->hidden()
                    ->required()
                    ->maxLength(191),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Enter SEO Title')
                            ->required()
                            ->autofocus()
                            ->maxLength(70),
                        TagsInput::make('meta_keywords')
                            ->splitKeys(['Tab', ','])
                            ->required()
                            ->autofocus()
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
            'index' => Pages\ListBlogs::route('/'),
        ];
    }
}
