<?php

namespace App\Filament\User\Resources\CompanyResource\Pages;

use App\Filament\User\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

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
