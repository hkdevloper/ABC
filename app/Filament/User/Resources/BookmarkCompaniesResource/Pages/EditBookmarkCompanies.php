<?php

namespace App\Filament\User\Resources\BookmarkCompaniesResource\Pages;

use App\Filament\User\Resources\BookmarkCompaniesResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditBookmarkCompanies extends EditRecord
{
    protected static string $resource = BookmarkCompaniesResource::class;
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
            Actions\DeleteAction::make(),
        ];
    }
}
