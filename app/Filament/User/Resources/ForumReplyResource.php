<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\ForumReplyResource\Pages;
use App\Models\ForumReply;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class ForumReplyResource extends Resource
{
    protected static ?string $model = ForumReply::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('body')
                    ->label('')
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
                    ->columnSpanFull()
                    ->required()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForumReplies::route('/'),
            //'create' => Pages\CreateForumReply::route('/create'),
            'edit' => Pages\EditForumReply::route('/{record}/edit'),
        ];
    }
}
