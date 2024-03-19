<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\ForumResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ForumsRelationManager extends RelationManager
{
    protected static string $relationship = 'forums';
    protected static bool $isLazy = false;

    public function form($form): Form
    {
        return ForumResource::form($form);
    }
    public function table(Table $table): Table
    {
        return ForumResource::table($table);
    }
}
