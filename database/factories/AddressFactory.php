<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_featured' => $this->faker->boolean,
            'address_line_1' => $this->faker->streetAddress,
            'country_id' => \App\Models\Country::pluck('id')->random(),
            'state_id' => \App\Models\State::pluck('id')->random(),
            'city' => $this->faker->city,
            'zip_code' => $this->faker->postcode,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'summary' => $this->faker->text(300),
            'description' => $this->faker->text,
            'seo_id' => \App\Models\Seo::pluck('id')->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
