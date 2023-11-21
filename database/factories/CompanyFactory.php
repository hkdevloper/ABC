<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_approved' => $this->faker->boolean,
            'is_claimed' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'category_id' => \App\Models\Category::pluck('id')->random(),
            'business_type' => $this->faker->word,
            'name' => $this->faker->company,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->randomHtml,
            'extra_things' => [
                $this->faker->word,
                $this->faker->word,
                $this->faker->word,
            ],
            'banner' => $this->faker->imageUrl(),
            'logo' => $this->faker->imageUrl(),
            'gallery' => json_encode([
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
            ]),
            'phone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->unique()->url,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'instagram' => $this->faker->url,
            'linkdin' => $this->faker->url,
            'youtube' => $this->faker->url,
            'address_id' => \App\Models\Address::pluck('id')->random(),
            'seo_id' => \App\Models\Seo::pluck('id')->random(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
