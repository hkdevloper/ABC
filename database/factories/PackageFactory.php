<?php
namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(),
            'balance' => $this->faker->randomFloat(),
            'duration' => Carbon::now(),
            'duration_type' => $this->faker->word(),
            'is_active' => $this->faker->boolean(),
            'is_featured' => $this->faker->boolean(),
            'is_popular' => $this->faker->boolean(),
            'is_trending' => $this->faker->boolean(),
            'is_new' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
