<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Deals;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Deals>
 */
class DealsFactory extends Factory
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
            'description' => $this->faker->paragraph,
            'offer_start_date' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'offer_end_date' => $this->faker->dateTimeBetween('+2 weeks', '+1 month'),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discount_type' => $this->faker->randomElement(['percentage', 'fixed']),
            'discount_value' => $this->faker->randomFloat(2, 5, 50),
            'discount_code' => $this->faker->word,
            'terms_and_conditions' => $this->faker->paragraph,
        ];
    }
}
