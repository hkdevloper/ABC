<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Location;
use App\Models\Media;
use App\Models\Model;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class EventsFactory extends Factory
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
            'thumbnail_id' => Media::inRandomOrder()->first(),
            'gallery' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'seo_id' => Seo::inRandomOrder()->first(),
            'is_active' => $this->faker->boolean(true),
            'is_featured' => $this->faker->boolean(false),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'start' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'end' => $this->faker->dateTimeBetween('+3 weeks', '+4 weeks'),
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
