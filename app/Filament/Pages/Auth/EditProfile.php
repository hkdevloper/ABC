<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Select;
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
                Select::make('currency')
                    ->label('Select Preferred Currency')
                    ->default('$')
                    ->hidden()
                    ->native(false)
                    ->preload(false)
                    ->options(function(){
                        $country = \App\Models\Country::where('currency', '!=', null)->get();
                        $currency = [];
                        foreach($country as $c){
                            $currency[$c->currency] = $c->currency;
                        }
                        // If There is no currency, then add default
                        if(count($currency) === 0){
                            $currency['$'] = '$';
                        }
                        return $currency;
                    }),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
