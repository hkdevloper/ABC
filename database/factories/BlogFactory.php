<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogFactory extends Factory
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
            'seo_id' => Seo::factory()->create()->id,
            'category_id' => Category::pluck('id')->random(),
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_approved' => $this->faker->boolean,
            'thumbnail' => 'blog/thumbnail/blog- ('. rand(1, 60) .').jpg',
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'tags' => json_encode([$this->faker->word, $this->faker->word]),
            'content' => $this->faker->paragraphs(50)
        ];
    }
}
