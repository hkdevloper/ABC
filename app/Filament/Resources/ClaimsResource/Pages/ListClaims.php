<?php

namespace App\Filament\Resources\ClaimsResource\Pages;

use App\Filament\Resources\ClaimsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClaims extends ListRecords
{
    protected static string $resource = ClaimsResource::class;

    protected function getHeaderActions(): array
    {
        return [ ];
    }
}
