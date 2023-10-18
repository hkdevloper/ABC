<?php

namespace App\Filament\User\Resources\ForumResource\Pages;

use App\Filament\User\Resources\ForumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateForum extends CreateRecord
{
    protected static string $resource = ForumResource::class;
}
