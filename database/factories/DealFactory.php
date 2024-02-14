<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DealFactory extends Factory
{
    protected $model = Deal::class;

    public function definition(): array
    {
        return [
            'is_active' => $this->faker->boolean(),
            'is_featured' => $this->faker->boolean(),
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'price' => $this->faker->word(),
            'discount_type' => $this->faker->word(),
            'discount_value' => $this->faker->word(),
            'terms_and_conditions' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'seo_id' => Seo::factory(),
        ];
    }
}
