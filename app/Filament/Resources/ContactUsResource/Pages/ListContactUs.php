<?php

namespace App\Filament\Resources\ContactUsResource\Pages;

use App\Filament\Resources\ContactUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListContactUs extends ListRecords
{
    protected static string $resource = ContactUsResource::class;
    protected static ?string $title = 'Contact Us';

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getTableEmptyStateActions(): array
    {
        return [];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No Contact Us yet';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return "Enjoy your day!";
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-chat-alt-2';
    }
}
