<?php

namespace App\Filament\User\Pages;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Contracts\View\View;

class LoginPage extends BaseAuth
{
    protected static string $view = 'test.login';
    protected static string $layout = 'layouts.user';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
            ]);
    }
}
