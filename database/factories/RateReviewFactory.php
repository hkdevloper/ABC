<?php

namespace Database\Factories;

use App\Models\RateReview;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RateReviewFactory extends Factory
{
    protected $model = RateReview::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'type' => $this->faker->word(),
            'item_id' => $this->faker->word(),
            'rating' => $this->faker->randomNumber(0,5),
            'review' => $this->faker->word(),
            'is_approved' => $this->faker->boolean(),
            'parent_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
