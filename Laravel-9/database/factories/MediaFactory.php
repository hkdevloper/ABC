<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'mime_type' => $this->faker->mimeType,
            'size' => $this->faker->randomNumber(5),
            'path' => $this->faker->url,
            'upload_type' => $this->faker->randomElement(['image', 'video', 'audio', null]),
            'is_deletable' => $this->faker->boolean,
            'is_downloadable' => $this->faker->boolean,
        ];
    }
}
