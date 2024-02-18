<?php

namespace App\Filament\User\Resources\BlogResource\Pages;

use App\Filament\User\Resources\BlogResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;
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
