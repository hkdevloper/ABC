<?php

namespace App\Filament\User\Resources\CompanyResource\Pages;

use App\Filament\User\Resources\CompanyResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash')
                ->requiresConfirmation(),
            Actions\Action::make('cancel')
                ->icon('heroicon-o-x-circle')
                ->label('Cancel')
                ->url(fn () => CompanyResource::getUrl('view', [$this->record->id])),
        ];
    }
}
