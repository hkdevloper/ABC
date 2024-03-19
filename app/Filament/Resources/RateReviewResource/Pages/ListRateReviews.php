<?php

namespace App\Filament\Resources\RateReviewResource\Pages;

use App\Filament\Resources\RateReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListRateReviews extends ListRecords
{
    protected static string $resource = RateReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'company' => Tab::make()->query(fn ($query) => $query->where('type', 'company')),
            'product' => Tab::make()->query(fn ($query) => $query->where('type', 'product')),
            'blog' => Tab::make()->query(fn ($query) => $query->where('type', 'blog')),
        ];
    }
}
