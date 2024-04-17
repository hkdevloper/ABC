<?php

namespace App\Filament\Resources\RequirementResource\Pages;

use App\Filament\Resources\RequirementResource;
use App\Models\User;
use Filament\Actions;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;
use Str;

class EditRequirement extends EditRecord
{
    protected static string $resource = RequirementResource::class;
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (array_key_exists('status', $data) && $data['status'] == 'Approved') {
            Notification::make()
                ->title('New Requirement Posted.')
                ->body(Str::limit($data['subject'], 70, '...'))
                ->actions([
                    Action::make('view')
                        ->url('/user/requirements'),
                ])
                ->sendToDatabase(User::where('id', '!=', '1')->get());
        }
        return parent::mutateFormDataBeforeSave($data);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
