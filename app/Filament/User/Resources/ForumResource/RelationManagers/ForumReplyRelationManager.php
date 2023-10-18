<?php

namespace App\Filament\User\Resources\ForumResource\RelationManagers;

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
                Forms\Components\Textarea::make('body')
                    ->label('Answer')
                    ->required(),
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ForumReply')
            ->columns([
                Tables\Columns\TextColumn::make('body'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
