<?php

namespace App\Filament\User\Resources\ForumReplyResource\Pages;

use AllowDynamicProperties;
use App\Filament\User\Resources\ForumReplyResource;
use App\Models\Forum;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Session;
use Filament\Notifications\Notification;

#[AllowDynamicProperties] class CreateForumReply extends CreateRecord
{
    protected static string $resource = ForumReplyResource::class;
    protected static bool $canCreateAnother = false;
    public function mount(): void
    {
        parent::mount();
        // Validate Forum ID
        if (!Session::has('forum_id')) {
            redirect()->route('forum');
        }
        Forum::findOrFail(Session::get('forum_id'));
        static::$title = Forum::find(Session::get('forum_id'))->title;
    }

    protected function getRedirectUrl(): string
    {
        $forum = Forum::find(Session::get('forum_id'));
        // Forgot session
        Session::forget('forum_id');
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'forum');
        return route('view.forum', ['id' => $forum->id, 'title' => $forum->title]);
    }
    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }
}
