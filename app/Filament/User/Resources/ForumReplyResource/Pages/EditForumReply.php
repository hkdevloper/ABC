<?php

namespace App\Filament\User\Resources\ForumReplyResource\Pages;

use App\Filament\User\Resources\ForumReplyResource;
use App\Models\Forum;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Session;

class EditForumReply extends EditRecord
{
    protected static string $resource = ForumReplyResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return ;
    }
    protected function getSavedNotification(): ?Notification
    {
        return null;
    }
}
