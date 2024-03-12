<?php

namespace App\Filament\User\Resources\ProductResource\Pages;

use App\Filament\User\Resources\ProductResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
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
            'company_id' => auth()->user()->company->id,
        ]);
    }
}
