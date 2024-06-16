<?php

namespace Database\Factories;

use App\Models\FavoriteCompanies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FavoriteCompaniesFactory extends Factory
{
    protected $model = FavoriteCompanies::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
