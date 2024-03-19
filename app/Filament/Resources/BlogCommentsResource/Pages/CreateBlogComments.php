<?php

namespace App\Filament\Resources\BlogCommentsResource\Pages;

use App\Filament\Resources\BlogCommentsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogComments extends CreateRecord
{
    protected static string $resource = BlogCommentsResource::class;
}
