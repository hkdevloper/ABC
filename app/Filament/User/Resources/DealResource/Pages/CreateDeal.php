<?php

namespace App\Filament\User\Resources\DealResource\Pages;

use App\Filament\user\Resources\DealResource;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Str;

class CreateDeal extends CreateRecord
{
    protected static string $resource = DealResource::class;

    protected static bool $canCreateAnother = false;
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
            'slug' => Str::slug($data['title']),
        ]);
    }

}
