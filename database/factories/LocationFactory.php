<?php

namespace Database\Factories;

use App\Models\Location;
use Faker\Provider\en_IN\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $faker->addProvider(new Address($faker));
        return [
            'name' => $faker->unique()->city,
            'featured' => $faker->boolean,
            'parent_id' => null,
            'slug' => $faker->unique()->slug,
            'summary' => $faker->sentence(10),
            'description' => $faker->paragraph(3),
            'longitude' => $faker->longitude,
            'latitude' => $faker->latitude,
            'map_zoom_level' => $faker->numberBetween(1, 10),
            'seo_id' => null,
        ];
    }
}
