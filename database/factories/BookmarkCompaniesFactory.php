<?php
namespace Database\Factories;

use App\Models\BookmarkCompanies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookmarkCompaniesFactory extends Factory
{
    protected $model = BookmarkCompanies::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
