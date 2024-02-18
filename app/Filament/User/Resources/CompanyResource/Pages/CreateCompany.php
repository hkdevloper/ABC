<?php

namespace App\Filament\User\Resources\CompanyResource\Pages;

use App\Filament\User\Resources\CompanyResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;
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
        $data['user_id'] = auth()->user()->id;
        $data['is_approved'] = false;
        $data['is_active'] = false;
        $data['is_featured'] = false;
        $data['is_claimed'] = false;
        return $data;
    }
}
