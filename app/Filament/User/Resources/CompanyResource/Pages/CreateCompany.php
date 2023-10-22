<?php

namespace App\Filament\User\Resources\CompanyResource\Pages;

use App\Filament\User\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;
        $data['is_approved'] = false;
        $data['is_active'] = false;
        $data['is_featured'] = false;
        $data['is_claimed'] = false;
        return $data;
    }
}
