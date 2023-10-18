<?php

namespace App\Filament\User\Resources\ForumResource\Pages;

use App\Filament\User\Resources\ForumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForum extends EditRecord
{
    protected static string $resource = ForumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
