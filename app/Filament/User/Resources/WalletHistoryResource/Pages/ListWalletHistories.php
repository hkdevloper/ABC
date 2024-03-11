<?php

namespace App\Filament\User\Resources\WalletHistoryResource\Pages;

use App\Filament\User\Resources\WalletHistoryResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListWalletHistories extends ListRecords
{
    protected static string $resource = WalletHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Add Money to Wallet')
                ->hidden(auth()->user()->type == 'Admin')
                ->action(function () {
                    return redirect()->route('razorpay.create.payment');
                })
                ->icon('heroicon-o-banknotes')
                ->size('sm'),
        ];
    }
}
