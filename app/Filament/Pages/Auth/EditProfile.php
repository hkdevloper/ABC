<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                TextInput::make('email')
                    ->label(__('filament-panels::pages/auth/edit-profile.form.email.label'))
                    ->email()
                    ->required()
                    ->disabled()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
