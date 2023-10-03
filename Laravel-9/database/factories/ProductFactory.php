<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'name' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'condition' => $this->faker->randomElement(['New', 'Used', 'Refurbished']),
            'brand' => $this->faker->word,
            'thumbnail_id' => Media::inRandomOrder()->first(),
            'gallery' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
        ];
    }
}
