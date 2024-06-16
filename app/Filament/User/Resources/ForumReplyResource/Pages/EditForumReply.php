<?php

namespace App\Filament\User\Resources\ForumReplyResource\Pages;

use App\Filament\User\Resources\ForumReplyResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditForumReply extends EditRecord
{
    protected static string $resource = ForumReplyResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSavedNotification(): ?Notification
    {
        return null;
    }
}
