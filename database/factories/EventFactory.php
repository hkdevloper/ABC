<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Category;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'claimed_by' => rand(0, 1) ? User::pluck('id')->random() : null,
            'category_id' => Category::pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
            'thumbnail' => 'events/thumbnail/event- (' . rand(1, 33) . ').jpg',
            'gallery' => [
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
            ],
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_claimed' => $this->faker->boolean,
            'is_approved' => $this->faker->boolean,
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'start' => $this->faker->dateTimeThisMonth(),
            'end' => $this->faker->dateTimeThisMonth(),
            'address_id' => Address::factory()->create()->id,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
