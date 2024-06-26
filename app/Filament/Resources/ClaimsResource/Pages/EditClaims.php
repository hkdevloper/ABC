<?php

namespace App\Filament\Resources\ClaimsResource\Pages;

use App\Filament\Resources\ClaimsResource;
use App\Models\Company;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Throwable;

class EditClaims extends EditRecord
{
    protected static string $resource = ClaimsResource::class;

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    /**
     * @throws Throwable
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (array_key_exists('status', $data) && $data['status'] == 'Approved') {
            // If the status is approved, then we need to update the company user_id to the user_id of the claim (the user who claimed the company)
            $company = Company::findOrFail($data['company_id']);
            $company->user_id = $data['user_id'];
            $company->is_claimed = 1;
            $company->claimed_by = $data['user_id'];
            $company->saveOrFail();
        }
        return parent::mutateFormDataBeforeSave($data); // TODO: Change the autogenerated stub
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
