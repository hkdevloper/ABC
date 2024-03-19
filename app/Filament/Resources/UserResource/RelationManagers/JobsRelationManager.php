<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\JobResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobsRelationManager extends RelationManager
{
    protected static string $relationship = 'jobs';
    protected static bool $isLazy = false;

    public function form(Form $form): Form
    {
        return JobResource::form($form);
    }

    public function table(Table $table): Table
    {
        return JobResource::table($table);
    }
}
