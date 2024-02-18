<?php

namespace App\Filament\Resources\ClaimsResource\Pages;

use App\Filament\Resources\ClaimsResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateClaims extends CreateRecord
{
    protected static string $resource = ClaimsResource::class;
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }
}
