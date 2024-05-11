<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\DealResource;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealsRelationManager extends RelationManager
{
    protected static string $relationship = 'deals';
    protected static bool $isLazy = false;

    public function form(Form $form): Form
    {
        return DealResource::form($form);
    }

    public function table(Table $table): Table
    {
        $user = User::find($this->getOwnerRecord()->id ?? 0);
        return DealResource::table($table)->modifyQueryUsing(function (Builder $query) use ($user) {
            $query->orWhere('company_id',$user->company->id);
        });
    }
}
