<?php

namespace App\Filament\User\Resources\CompanyResource\Pages;

use App\Filament\User\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCompany extends ViewRecord
{
    protected static string $resource = CompanyResource::class;

    protected static ?string $title = 'Company Profile';

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Edit Company')
                ->icon('heroicon-o-pencil')
                ->url(fn () => CompanyResource::getUrl('edit', [$this->record->id])),
        ];
    }
}
