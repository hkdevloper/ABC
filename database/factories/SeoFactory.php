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
        $keywords = [
            'Tech', 'Green', 'Innovators', 'HealthCare', 'Smart',
            'Gadget', 'Eco-Friendly', 'Innovative', 'Health & Wellness', 'Fashion',
            'Tech Summit', 'Green Living', 'Innovation', 'Health and Wellness', 'Fashion Forward',
            'Tech Insights', 'Eco Living', 'Innovation Spotlight', 'Wellness Wisdom', 'Fashion Trends',
            'Software Engineer', 'Environmental Analyst', 'Product Designer', 'HealthCare Specialist', 'Fashion Designer',
            'Tech Enthusiasts', 'Green Living Community', 'Innovation Discussion', 'Health & Wellness Exchange', 'Fashion Enthusiasts',
        ];
        return [
            'title' => $this->faker->sentence,
            'meta_description' => $this->faker->text(56),
            'meta_keywords' => $this->faker->randomElements($keywords, rand(1, 5)),
        ];
    }
}
