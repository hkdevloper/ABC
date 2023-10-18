<?php

namespace App\classes;

use Filament\Forms\Components\Wizard\Step;
use Shipu\WebInstaller\Concerns\StepContract;

class CompanyProfileSetup implements StepContract
{

    public static function make(): Step
    {
        return Step::make('Overview')
            ->label('Company Profile Setup')
            ->schema([

            ]);
    }
}
