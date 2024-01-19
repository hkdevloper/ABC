<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['company', 'product', 'event', 'blog', 'job', 'forum']),
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'is_active' => 1,
            'is_featured' => $this->faker->boolean,
            'parent_id' => null,
            'seo_id' => Seo::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
