<?php

namespace App\Filament\User\Resources\ForumResource\RelationManagers;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ForumReplyRelationManager extends RelationManager
{
    protected static string $relationship = 'forumReplies';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->user()->id),
                Forms\Components\Hidden::make('forum_id')
                    ->default(request()->route('record')),
                Forms\Components\RichEditor::make('body')
                    ->toolbarButtons([
                        'attachFiles',
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
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('forumReplies')
                    ->fileAttachmentsVisibility('public')
                    ->autofocus()
                    ->required(),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->recordTitleAttribute('ForumReply')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Answered By User'),
                Tables\Columns\TextColumn::make('body')
                    ->wrap()
                    ->html(),
                // posted at
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Posted At')
                    ->date('d M Y h:i A')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()->hidden(function ($record) {
                        return $record->user_id != auth()->user()->id;
                    }),
                    Tables\Actions\DeleteAction::make()->hidden(function ($record) {
                        return $record->user_id != auth()->user()->id;
                    }),
                    Tables\Actions\ViewAction::make('view')
                ])
            ])
            ->bulkActions([
                // Do not allow bulk deletion of records.
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
