<?php

namespace App\Filament\Resources\BlockedDomainResource\Pages;

use App\Filament\Resources\BlockedDomainResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlockedDomain extends CreateRecord
{
    protected static string $resource = BlockedDomainResource::class;
}
