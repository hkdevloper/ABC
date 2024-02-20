<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Category;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('type', 'user')->pluck('id')->random(),
            'category_id' => Category::where('type', 'job')->pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
            'is_active' => true,
            'is_featured' => $this->faker->boolean,
            'is_approved' => true,
            'title' => $this->faker->jobTitle,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'valid_until' => $this->faker->dateTime,
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'temporary', 'volunteer', 'internship']),
            'salary' => $this->faker->randomNumber(5),
            'organization' => $this->faker->company,
            'education' => $this->faker->randomElement(['high school', 'bachelor', 'master', 'doctorate', 'associate', 'diploma']),
            'experience' => $this->faker->randomElement(['entry level', 'associate', 'mid-senior level', 'director', 'internship', 'executive']),
            'thumbnail' => "companies/logo/".rand(1,50).".webp",
            'address_id' => Address::factory()->create()->id,
        ];
    }
}
