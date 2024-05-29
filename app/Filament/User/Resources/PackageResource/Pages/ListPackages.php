<?php

namespace App\Filament\User\Resources\PackageResource\Pages;

use App\Filament\User\Resources\PackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackages extends ListRecords
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No Actions
        ];
    }
}
