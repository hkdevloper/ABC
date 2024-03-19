<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\BlogResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogsRelationManager extends RelationManager
{
    protected static string $relationship = 'blogs';
    protected static bool $isLazy = false;

    public function form(Form $form): Form
    {
        return BlogResource::form($form);
    }

    public function table(Table $table): Table
    {
        return BlogResource::table($table);
    }
}
