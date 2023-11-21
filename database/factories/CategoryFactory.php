<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
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
            'name' => $this->faker->word,
            'type' => 'company',
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'is_active' => 1,
            'is_featured' => $this->faker->boolean,
            'parent_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'seo_id' => \App\Models\Seo::pluck('id')->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
