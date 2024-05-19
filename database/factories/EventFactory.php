<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Category;
use App\Models\Company;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Tech Summit 2022', 'Green Living Expo', 'Innovation Showcase', 'Health and Wellness Conference', 'Fashion Forward Gala',
            'Tech Insights Today', 'Eco Living Chronicles', 'Innovation Spotlight', 'Wellness Wisdom', 'Fashion Trends Blog', 'Tech Expo 2023', 'Green Living Symposium', 'Innovation Summit', 'Health and Wellness Retreat', 'Fashion Forward Gala', 'Sustainable Energy Conference', 'Digital Marketing Masterclass', 'Eco-Friendly Home Workshop', 'Startup Showcase', 'Fitness and Yoga Festival', 'Art and Culture Exhibition', 'Future of Technology Forum', 'Environmental Conservation Workshop', 'Wellness Wisdom Seminar', 'Fashion Trends Preview', 'Science and Technology Fair', 'Community Health Fair', 'Sustainable Living Symposium', 'Innovation Challenge', 'Fashion Design Workshop', 'Tech Solutions Conference', 'Green Building Expo', 'Virtual Reality Experience Day', 'Fashion Show Extravaganza', 'Climate Change Awareness Campaign', 'Wellness and Mindfulness Workshop', 'Future of Fashion Forum', 'Tech Startups Networking Event', 'Green Living Showcase', 'Robotics and AI Exhibition', 'Health and Fitness Challenge', 'Sustainable Fashion Workshop', 'Digital Art Exhibition', 'Environmental Film Festival', 'Wearable Tech Showcase', 'Eco-Friendly Gardening Workshop', 'Tech Innovation Hackathon', 'Nature Photography Exhibition', 'Health and Nutrition Seminar', 'Sustainable Fashion Show', 'Virtual Reality Gaming Tournament', 'Women in Technology Symposium', 'Green Energy Expo', 'Tech and Wellness Expo', 'Innovation in Education Forum', 'Fashion Design Competition', 'Clean Energy Workshop', 'Fitness and Wellness Expo', 'Future of AI and Robotics Symposium'
        ];
        return [
            'company_id' => Company::pluck('id')->random(),
            'claimed_by' => null,
            'category_id' => Category::pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
            'thumbnail' => 'events/thumbnail/event- (' . rand(1, 33) . ').jpg',
            'gallery' => [
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
                'events/gallery/event- (' . rand(1, 25) . ').jpg',
            ],
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_claimed' => $this->faker->boolean,
            'is_approved' => $this->faker->boolean,
            'title' => $this->faker->randomElement($titles),
            'slug' => $this->faker->slug,
            'description' => $this->faker->realText(1000),
            'start' => $this->faker->dateTimeThisMonth(),
            'end' => $this->faker->dateTimeThisMonth(),
            'address_id' => Address::factory()->create()->id,
            'created_at' => $this->faker->dateTime,
        ];
    }
}
