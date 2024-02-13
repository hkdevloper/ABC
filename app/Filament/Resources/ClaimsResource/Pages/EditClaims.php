<?php

namespace App\Filament\Resources\ClaimsResource\Pages;

use App\Filament\Resources\ClaimsResource;
use App\Models\Company;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditClaims extends EditRecord
{
    protected static string $resource = ClaimsResource::class;

    /**
     * @throws \Throwable
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if($data['status'] == 'Approved'){
            // If the status is approved, then we need to update the company user_id to the user_id of the claim (the user who claimed the company)
            $company = Company::findOrFail($data['company_id']);
            $company->user_id = $data['user_id'];
            $company->is_claimed = 1;
            $company->claimed_by = $data['user_id'];
            $company->saveOrFail();
        }
        return parent::handleRecordUpdate($record, $data);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
