<?php

namespace App\Filament\Pages;

use Auth;

class Dashboard extends \Filament\Pages\Dashboard
{
    public static string $icon = 'heroicon-o-home';
    protected static ?string $title = 'Dashboard';
    protected static ?string $navigationLabel = 'Dashboard';
    public function mount(): void
    {
        if(!auth()->user()->canManageSettings()){
            $company = \App\Models\Company::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
            if($company){
                $this->redirect('/user/dashboard/companies/'.$company->id);
            }else{
                $this->redirect('/user/dashboard/companies/create');
            }
        }

        // Change Title with Welcome Message
        static::$title = 'Welcome '.auth()->user()->name;
    }
}
