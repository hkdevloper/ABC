<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seo>
 */
class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'meta_description' => $this->faker->text(300),
            'meta_keywords' => [
                $this->faker->word,
                $this->faker->word,
                $this->faker->word,
            ],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
