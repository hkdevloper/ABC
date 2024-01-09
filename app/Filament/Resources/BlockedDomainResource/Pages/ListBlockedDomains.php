<?php

namespace App\Filament\Resources\BlockedDomainResource\Pages;

use App\Filament\Resources\BlockedDomainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlockedDomains extends ListRecords
{
    protected static string $resource = BlockedDomainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
