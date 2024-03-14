<?php

namespace App\Filament\User\Resources\RequirementsResource\Pages;

use App\Filament\User\Resources\RequirementsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRequirements extends ListRecords
{
    protected static string $resource = RequirementsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
