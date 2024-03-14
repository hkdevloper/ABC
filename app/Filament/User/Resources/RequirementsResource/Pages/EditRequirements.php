<?php

namespace App\Filament\User\Resources\RequirementsResource\Pages;

use App\Filament\User\Resources\RequirementsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRequirements extends EditRecord
{
    protected static string $resource = RequirementsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
