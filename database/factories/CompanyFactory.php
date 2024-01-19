<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Category;
use App\Models\Seo;
use App\Models\User;
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
        $companies = [
            'Tech Solutions Inc.', 'Green Earth Industries', 'Global Innovators Co.', 'HealthCare Providers Ltd.', 'Smart Solutions Group',
            'GadgetMaster Pro', 'Eco-Friendly Home', 'Innovative Tools', 'Health & Wellness Essentials', 'Fashion Trends Outlet',
            'Tech Summit 2022', 'Green Living Expo', 'Innovation Showcase', 'Health and Wellness Conference', 'Fashion Forward Gala',
            'Tech Insights Today', 'Eco Living Chronicles', 'Innovation Spotlight', 'Wellness Wisdom', 'Fashion Trends Blog',
            'Software Engineer at Tech Solutions Inc.', 'Environmental Analyst at Green Earth Industries', 'Product Designer at Global Innovators Co.', 'HealthCare Specialist at HealthCare Providers Ltd.', 'Fashion Designer at Smart Solutions Group',
            'Tech Enthusiasts Hub', 'Green Living Community', 'Innovation Discussion Forum', 'Health & Wellness Exchange', 'Fashion Enthusiasts Club',
        ];
        $products = [
            'GadgetMaster Pro', 'Eco-Friendly Home', 'Innovative Tools', 'Health & Wellness Essentials', 'Fashion Trends Outlet',
            'Tech Summit 2022', 'Green Living Expo', 'Innovation Showcase', 'Health and Wellness Conference', 'Fashion Forward Gala',
            'Tech Insights Today', 'Eco Living Chronicles', 'Innovation Spotlight', 'Wellness Wisdom', 'Fashion Trends Blog',
            'Software Engineer at Tech Solutions Inc.', 'Environmental Analyst at Green Earth Industries', 'Product Designer at Global Innovators Co.', 'HealthCare Specialist at HealthCare Providers Ltd.', 'Fashion Designer at Smart Solutions Group',
            'Tech Enthusiasts Hub', 'Green Living Community', 'Innovation Discussion Forum', 'Health & Wellness Exchange', 'Fashion Enthusiasts Club',
        ];
        $category = Category::where('type', 'blog')->get();
        $category = $category->pluck('id')->toArray();
        return [
            'is_approved' => $this->faker->boolean,
            'is_claimed' => false,
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'user_id' => User::pluck('id')->random(),
            'category_id' => $this->faker->randomElement($category),
            'business_type' => $this->faker->randomElement(['private', 'public',  'partnership', 'sole proprietorship', 'limited liability company', 'cooperative']),
            'name' => $this->faker->randomElement($companies),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->realText(1000),
            'extra_things' => $this->faker->randomElements($products, rand(1,5)),
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
            'seo_id' => Seo::factory()->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
