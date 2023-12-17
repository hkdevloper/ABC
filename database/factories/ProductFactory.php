<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
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
            'user_id' => User::all()->random()->id,
            'claimed_by' => rand(0, 1) ? User::all()->random()->id : null,
            'category_id' => Category::pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_claimed' => $this->faker->boolean,
            'is_approved' => $this->faker->boolean,
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->randomHtml,
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'condition' => $this->faker->word,
            'brand' => $this->faker->word,
            'thumbnail' => 'products/thumbnail/prod- (' . rand(1, 99) . ').jpg',
            'gallery' => json_encode([
                'products/gallery/product-gallery- (' . rand(1, 100) . ').jpg',
                'products/gallery/product-gallery- (' . rand(1, 100) . ').jpg',
                'products/gallery/product-gallery- (' . rand(1, 100) . ').jpg',
                'products/gallery/product-gallery- (' . rand(1, 100) . ').jpg',
            ]),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
