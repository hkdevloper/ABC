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
        $blogTitles = [
            'The Future of Artificial Intelligence in Business',
            '10 Sustainable Living Practices You Can Adopt Today',
            'Innovative Strategies for Small Business Growth',
            'Mindfulness Techniques for a Healthier Lifestyle',
            'Fashion Trends to Watch Out for This Season',
            'Digital Marketing Trends Shaping 2023',
            'Unlocking Your Potential: A Guide to Personal Development',
            'Discovering the Wonders of Space Exploration',
            'The Importance of Environmental Conservation',
            'Success Stories of Inspiring Entrepreneurs',
            'Exploring the World of Virtual Reality Gaming',
            'How to Build an Eco-Friendly Home on a Budget',
            'Navigating the Challenges of Remote Work',
            'In-Depth Analysis of Climate Change Impact',
            'The Art of Effective Time Management',
            '10 Must-Have Gadgets for Modern Living',
            'Understanding the Power of Renewable Energy',
            'Entrepreneurial Lessons from Silicon Valley',
            'Healthy Eating Habits for a Balanced Life',
            'The Influence of Art and Culture in Society',
            'Tips for Building a Successful Online Business',
            'The Science Behind Popular Health Supplements',
            'Mastering the Basics of Coding and Programming',
            'Inspiring Stories of Women in Tech',
            'Exploring Ancient Civilizations: A Historical Journey',
            'How to Create a Successful Fashion Blog',
            'Latest Innovations in Green Technology',
            'Empowering Yourself Through Continuous Learning',
            'The Role of Artificial Intelligence in Healthcare',
            'Tips for Effective Social Media Marketing',
            'Understanding Mental Health: Myths and Facts',
            'The Impact of Social Media on Society',
            '10 Exciting Travel Destinations for Adventure Seekers',
            'The Future of Work: Remote Collaboration Trends',
            'Tips for Starting Your Own Photography Business',
            'Exploring the Marvels of Underwater Life',
            'The Art of Mindful Parenting',
            'How to Kickstart Your Fitness Journey',
            'Innovation in Sustainable Fashion',
            'The Rise of Podcasting: A New Era of Storytelling',
            'The Science of Happiness: Practices for Well-Being',
            'Navigating Cybersecurity in the Digital Age',
            'The Role of Blockchain in Modern Finance',
            'Inspiring Stories of Social Entrepreneurs',
            'The Evolution of Language: From Ancient to Modern Times',
            'Effective Strategies for Project Management',
            'The Impact of Artificial Intelligence on Education',
        ];

        $tags = [
            'tech', 'green', 'innovators', 'healthcare', 'smart',
            'gadget', 'eco-friendly', 'innovative', 'health & wellness', 'fashion',
            'tech summit', 'green living', 'innovation', 'health and wellness', 'fashion forward',
            'tech insights', 'eco living', 'innovation spotlight', 'wellness wisdom', 'fashion trends',
            'software engineer', 'environmental analyst', 'product designer', 'healthcare specialist', 'fashion designer',
            'tech enthusiasts', 'green living community', 'innovation discussion', 'health & wellness exchange', 'fashion enthusiasts',
        ];
        return [
            'user_id' => User::where('type', 'user')->pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
            'category_id' => Category::where('type', 'blog')->pluck('id')->random(),
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_approved' => $this->faker->boolean,
            'thumbnail' => 'blog/thumbnail/blog- ('. rand(1, 60) .').jpg',
            'title' => $this->faker->randomElement($blogTitles),
            'slug' => $this->faker->slug,
            'tags' => $this->faker->randomElements($tags, rand(1,5)),
            'content' => $this->faker->realText(2500),
        ];
    }
}
