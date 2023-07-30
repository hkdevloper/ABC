<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Jobs;
use App\Models\Location;
use App\Models\Media;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
            'seo_id' => Seo::inRandomOrder()->first(),
            'is_active' => $this->faker->boolean(true),
            'is_featured' => $this->faker->boolean(false),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'summary' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'valid_until' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
            'employment_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Temporary', 'Internship']),
            'salary' => $this->faker->numberBetween(30000, 100000),
            'organization' => $this->faker->company,
            'overview' => $this->faker->paragraph,
            'education' => $this->faker->paragraph,
            'experience' => $this->faker->paragraph,
            'thumbnail_id' => Media::inRandomOrder()->first(),
            'gallery' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'website' => $this->faker->url,
            'address' => $this->faker->address,
            'city_id' => Location::inRandomOrder()->first(),
            'state_id' => Location::inRandomOrder()->first(),
            'country_id' => Location::inRandomOrder()->first(),
            'zip_code' => $this->faker->postcode,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'map_zoom_level' => $this->faker->numberBetween(1, 10),
        ];
    }
}
