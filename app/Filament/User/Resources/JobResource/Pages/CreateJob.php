<?php

namespace App\Filament\User\Resources\JobResource\Pages;

use App\Filament\User\Resources\JobResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;
    protected static bool $canCreateAnother = false;
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return array_merge($data, [
            'user_id' => auth()->user()->id,
        ]);
    }
}
