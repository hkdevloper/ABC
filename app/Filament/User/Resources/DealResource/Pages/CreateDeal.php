<?php

namespace App\Filament\User\Resources\DealResource\Pages;

use App\Filament\user\Resources\DealResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateDeal extends CreateRecord
{
    protected static string $resource = DealResource::class;
    protected function onValidationError(\Illuminate\Validation\ValidationException $exception): void
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
