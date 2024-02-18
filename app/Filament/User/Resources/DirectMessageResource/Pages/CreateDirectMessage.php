<?php

namespace App\Filament\User\Resources\DirectMessageResource\Pages;

use App\Filament\User\Resources\DirectMessageResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateDirectMessage extends CreateRecord
{
    protected static string $resource = DirectMessageResource::class;
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

}
