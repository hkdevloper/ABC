<?php

namespace Database\Factories;

use App\Models\Requirement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RequirementFactory extends Factory
{
    protected $model = Requirement::class;

    public function definition(): array
    {
        return [
            'subject' => $this->faker->word(),
            'country' => $this->faker->country(),
            'images' => null,
            'customer_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
            'status' => 'Pending',
        ];
    }
}
