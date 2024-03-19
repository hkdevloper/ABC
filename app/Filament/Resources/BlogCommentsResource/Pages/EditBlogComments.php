<?php

namespace App\Filament\Resources\BlogCommentsResource\Pages;

use App\Filament\Resources\BlogCommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogComments extends EditRecord
{
    protected static string $resource = BlogCommentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
