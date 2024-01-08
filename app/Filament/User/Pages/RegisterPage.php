<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Filament\Pages\Auth\Register as BaseAuth;


class RegisterPage extends BaseAuth
{
    protected static string $layout = 'auth.register';
}
