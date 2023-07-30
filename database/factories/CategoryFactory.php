<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Media;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['product', 'deals', 'job', 'event', 'company', 'blogs']),
            'slug' => $this->faker->unique()->slug,
            'summary' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'icon' => $this->faker->randomElement(['fas fa-home', 'fas fa-car', 'fas fa-briefcase', 'fas fa-calendar-alt', 'fas fa-building', 'fas fa-blog']),
            'media_id' => Media::inRandomOrder()->first(),
            'seo_id' => Seo::inRandomOrder()->first(),
            'is_active' => true,
            'is_featured' => false,
        ];
    }
}
