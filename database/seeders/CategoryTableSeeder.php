<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'company' => ['Tech Solutions Inc.', 'Green Earth Industries', 'Global Innovators Co.', 'HealthCare Providers Ltd.', 'Smart Solutions Group'],
            'product' => ['GadgetMaster Pro', 'Eco-Friendly Home', 'Innovative Tools', 'Health & Wellness Essentials', 'Fashion Trends Outlet'],
            'event' => ['Tech Summit 2022', 'Green Living Expo', 'Innovation Showcase', 'Health and Wellness Conference', 'Fashion Forward Gala'],
            'blog' => ['Tech Insights Today', 'Eco Living Chronicles', 'Innovation Spotlight', 'Wellness Wisdom', 'Fashion Trends Blog'],
            'job' => ['Software Engineer at Tech Solutions Inc.', 'Environmental Analyst at Green Earth Industries', 'Product Designer at Global Innovators Co.', 'HealthCare Specialist at HealthCare Providers Ltd.', 'Fashion Designer at Smart Solutions Group'],
            'forum' => ['Tech Enthusiasts Hub', 'Green Living Community', 'Innovation Discussion Forum', 'Health & Wellness Exchange', 'Fashion Enthusiasts Club'],
            'deal' => ['Tech Solutions Inc. Discount', 'Green Earth Industries Sale', 'Global Innovators Co. Offer', 'HealthCare Providers Ltd. Promo', 'Smart Solutions Group Deal'],
        ];
        foreach ($categories as $type => $names) {
            foreach ($names as $name) {
                \App\Models\Category::factory()->create([
                    'name' => $name,
                    'type' => $type,
                    'image' => 'image/404.png'
                ]);
            }
        }
    }
}
