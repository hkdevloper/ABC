<?php

namespace App\Filament\User\Resources\WalletHistoryResource\Pages;

use App\Filament\User\Resources\WalletHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWalletHistories extends ListRecords
{
    protected static string $resource = WalletHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
