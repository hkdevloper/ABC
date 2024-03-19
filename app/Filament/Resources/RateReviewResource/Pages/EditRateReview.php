<?php

namespace App\Filament\Resources\RateReviewResource\Pages;

use App\Filament\Resources\RateReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRateReview extends EditRecord
{
    protected static string $resource = RateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
