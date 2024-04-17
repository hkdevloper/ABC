<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Check if property exists or not
        if (array_key_exists('is_claimed', $data) && $data['is_claimed'] == 'on') {
            $data['is_claimed'] = true;
        }

        // if its true, then change the company owner to the claimed_by user
        if ($data['is_claimed']) {
            $data['user_id'] = $data['claimed_by'];
        } else {
            $data['claimed_by'] = null;
        }

        $user = User::find($data['user_id']);
        $company = $user->company;
        if ($company->is_approved != $data['is_approved'] ||
            $company->is_active != $data['is_active'] ||
            $company->is_rejected != $data['is_rejected']
        ) {
            // Send Online notification about Company profile status update
            if ($data['is_approved'] == 1 && $data['is_active'] == null && $data['is_rejected'] == null) {
                Notification::make()
                    ->title('Your request has been approved!')
                    ->body('Congratulations! Your request has been approved by the admin.')
                    ->sendToDatabase($user);
            }

            if ($data['is_active'] == 1 && $data['is_approved'] == 1 && $data['is_rejected'] == null) {
                Notification::make()
                    ->title('Account activated')
                    ->body('Your account has been activated by the admin.')
                    ->sendToDatabase($user);
            }

            if ($data['is_rejected'] == 1) {
                Notification::make()
                    ->title('Your request has been rejected')
                    ->body('Sorry, your request has been rejected by the admin.')
                    ->sendToDatabase($user);
            }
        }
        return parent::mutateFormDataBeforeSave($data);
    }
}
