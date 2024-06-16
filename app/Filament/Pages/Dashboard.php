<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;

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
                $this->redirect('/user/companies/'.$company->id);
            }else{
                $this->redirect('/user/companies/create');
            }
        }

        // Change Title with Welcome Message
        static::$title = 'Welcome '.auth()->user()->name;
    }

    public function getHeaderActions(): array
    {
        // Action to Add money in wallet
        return [
            Action::make('Add Money to Wallet')
                ->hidden(auth()->user()->type == 'Admin')
                ->action(function () {
                    return redirect()->route('razorpay.create.payment');
                })
                ->hidden()
                ->icon('heroicon-o-banknotes')
                ->size('sm'),
        ];
    }
}
