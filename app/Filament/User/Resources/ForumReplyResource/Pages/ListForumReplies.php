<?php

namespace App\Filament\User\Resources\ForumReplyResource\Pages;

use App\Filament\User\Resources\ForumReplyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForumReplies extends ListRecords
{
    protected static string $resource = ForumReplyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
