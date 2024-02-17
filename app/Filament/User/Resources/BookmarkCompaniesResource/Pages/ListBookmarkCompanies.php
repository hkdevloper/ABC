<?php

namespace App\Filament\User\Resources\BookmarkCompaniesResource\Pages;

use App\Filament\User\Resources\BookmarkCompaniesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookmarkCompanies extends ListRecords
{
    protected static string $resource = BookmarkCompaniesResource::class;

    protected function getHeaderActions(): array
    {
        return [ ];
    }
}
