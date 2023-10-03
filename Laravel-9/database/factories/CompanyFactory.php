<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Location;
use App\Models\Media;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'approved' => $this->faker->boolean(true),
            'claimed' => $this->faker->boolean(true),
            'user_id' => User::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
            'name' => $this->faker->company,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'extra_things' => json_encode($this->faker->words(5)),
            'gallery' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'instagram' => $this->faker->url,
            'linkdin' => $this->faker->url,
            'youtube' => $this->faker->url,
            'address' => $this->faker->address,
            'city_id' => Location::inRandomOrder()->first(),
            'state_id' => Location::inRandomOrder()->first(),
            'country_id' => Location::inRandomOrder()->first(),
            'zip_code' => $this->faker->postcode,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'map_zoom_level' => $this->faker->numberBetween(1, 10),
            'seo_id' => Seo::inRandomOrder()->first(),
            'media_logo_id' => Media::inRandomOrder()->first(),
        ];

    }
}
