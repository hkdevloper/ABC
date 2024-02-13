<?php

namespace App\Filament\User\Resources\DirectMessageResource\Pages;

use App\Filament\User\Resources\DirectMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDirectMessages extends ListRecords
{
    protected static string $resource = DirectMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
