<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\CompanyResource;
use App\Filament\Resources\CompanyResource\Pages\CreateCompany;
use App\Filament\Resources\CompanyResource\Pages\EditCompany;
use App\Filament\Resources\CompanyResource\Pages\ListCompanies;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class CompanyRelationManager extends RelationManager
{
    protected static string $relationship = 'company';
    protected static bool $isLazy = false;
    public function form(Form $form): Form
    {
        return CompanyResource::form($form);
    }
    public function table(Table $table): Table
    {
        return CompanyResource::table($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanies::route('/'),
            'create' => CreateCompany::route('/create'),
            'edit' => EditCompany::route('/{record}/edit'),
        ];
    }
}
