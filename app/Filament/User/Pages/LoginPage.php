<?php

namespace App\Filament\User\Pages;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Contracts\View\View;

class LoginPage extends BaseAuth
{
    public function getHeader(): ?View
    {
        return view('includes.header');
    }
}
