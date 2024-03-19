<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\BlogCommentsResource\Pages;
use App\Models\BlogComments;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogCommentsResource extends Resource
{
    protected static ?string $model = BlogComments::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('blog_id')
                    ->relationship('blog', 'title')
                    ->native(false)
                    ->disabled()
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->native(false)
                    ->disabled()
                    ->required(),
                TinyEditor::make('comment')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('editor/uploads')
                    ->profile('simple')
                    ->columnSpan('full')
                    ->autofocus()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->disabled()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->disabled()
                    ->required()
                    ->maxLength(191),
                Forms\Components\Toggle::make('is_approved')
                    ->required(),
                Forms\Components\Toggle::make('is_spam')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('blog.title')
                    ->numeric()
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->html()
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_spam')
                    ->label('Spam')
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
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                //
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->orderBy('created_at', 'desc');
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
            'index' => Pages\ListBlogComments::route('/'),
            'edit' => Pages\EditBlogComments::route('/{record}/edit'),
        ];
    }
}
