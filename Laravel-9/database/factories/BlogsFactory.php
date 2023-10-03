<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Model;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class BlogsFactory extends Factory
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
            'thumbnail_id' => Media::inRandomOrder()->first(),
            'seo_id' => Seo::inRandomOrder()->first(),
            'is_active' => $this->faker->boolean(true),
            'is_featured' => $this->faker->boolean(false),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'content' => $this->faker->paragraphs(3, true),
        ];

    }
}
