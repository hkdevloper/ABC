<?php

namespace Database\Factories;
use App\Models\Company;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RateReview>
 */
class RateReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['company', 'product', 'event'];

        return [
            'user_id' => User::where('type', 'user')->pluck('id')->random(),
            'type' => $this->faker->randomElement($types),
            'item_id' => function (array $attributes) {
                return $this->getAssociatedItemId($attributes['type']);
            },
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->paragraph,
            'is_approved' => $this->faker->boolean(90), // 90% chance of being approved
        ];
    }

    private function getAssociatedItemId(string $type): int
    {
        return match ($type) {
            'company' => Company::pluck('id')->random(),
            'product' => Product::pluck('id')->random(),
            'event' => Event::pluck('id')->random(),
            default => 0,
        };
    }
}
