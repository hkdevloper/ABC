<?php

namespace App\Filament\User\Resources\DirectMessageResource\Pages;

use App\Filament\User\Resources\DirectMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDirectMessage extends CreateRecord
{
    protected static string $resource = DirectMessageResource::class;
}
