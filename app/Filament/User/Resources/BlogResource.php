<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\BlogResource\Pages;
use App\Models\Blog;
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

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';
    protected static ?int $navigationSort = 6;

    protected static bool $shouldRegisterNavigation = false;
    public function mount(): void
    {
        if(!auth()->user()->canManageSettings()){
            $company = \App\Models\Company::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
            if($company){
                redirect('/user/dashboard/companies/'.$company->id);
            }else{
                redirect('/user/dashboard/companies/create');
            }
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail Image')
                            ->directory('blog/thumbnail')
                            ->visibility('public')
                            ->required(),
                    ]),
                Section::make()
                    ->schema([
                        SelectTree::make('category_id')
                            ->label('Select Category')
                            ->enableBranchNode()
                            ->withCount()
                            ->emptyLabel('Oops! No Category Found')
                            ->relationship('category', 'name', 'parent_id', function ($query){
                                return $query->where('type', 'blog');
                            }),
                        TextInput::make('title')
                            ->label('Title')
                            ->placeholder('Enter title')
                            ->live(onBlur: true)
                            ->required()
                            ->maxLength(191)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('Enter slug')
                            ->required()
                            ->maxLength(191),
                        TagsInput::make('tags')
                            ->label('Tags')
                            ->placeholder('Enter tags')
                            ->required(),
                        MarkdownEditor::make('content')
                            ->label('Content')
                            ->columnSpanFull(),
                    ])->columns(4),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('SEO Title')
                            ->placeholder('Enter title')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->label('Meta Description')
                            ->maxLength(300),
                        TagsInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->placeholder('Enter keywords')
                            ->required(),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('seo.title')
                    ->label('SEO')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
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
                $query->where('user_id', auth()->user()->id);
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
