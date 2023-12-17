<?php

namespace Database\Factories;

use App\Models\Address;
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
            'user_id' => \App\Models\User::pluck('id')->random(),
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
            'banner' => "companies/banner/1 (".rand(1,13).").jpg",
            'logo' => "companies/logo/".rand(1,50).".webp",
            'gallery' => json_encode([
                "companies/gallery/1.jpg",
                "companies/gallery/2.jpg",
                "companies/gallery/3.jpg",
                "companies/gallery/4.jpg",
                "companies/gallery/5.jpg",
            ]),
            'phone' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->unique()->url,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'instagram' => $this->faker->url,
            'linkdin' => $this->faker->url,
            'youtube' => $this->faker->url,
            'address_id' => Address::factory()->create()->id,
            'seo_id' => \App\Models\Seo::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
