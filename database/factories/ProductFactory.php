<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Products;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'GadgetMaster Pro', 'Eco-Friendly Home', 'Innovative Tools', 'Health & Wellness Essentials', 'Fashion Trends Outlet',
            'Tech Summit 2022', 'Green Living Expo', 'Innovation Showcase', 'Health and Wellness Conference', 'Fashion Forward Gala',
            'Tech Insights Today', 'Eco Living Chronicles', 'Innovation Spotlight', 'Wellness Wisdom', 'Fashion Trends Blog',
            'Software Engineer at Tech Solutions Inc.', 'Environmental Analyst at Green Earth Industries', 'Product Designer at Global Innovators Co.', 'HealthCare Specialist at HealthCare Providers Ltd.', 'Fashion Designer at Smart Solutions Group','Tech Enthusiasts Hub', 'Green Living Community', 'Innovation Discussion Forum', 'Health & Wellness Exchange', 'Fashion Enthusiasts Club', 'Smartphone Pro X', 'Eco-Friendly Water Bottle', 'Innovative Multi-Tool Kit', 'Health & Fitness Tracker', 'Fashionable Smartwatch', 'Gourmet Coffee Maker', 'Organic Skincare Set', 'Digital Nomad Backpack', 'Premium Noise-Canceling Headphones', 'Designer Sunglasses', 'Home Automation System', 'Biodegradable Cleaning Products', 'Portable Electric Blender', 'Stylish Fitness Apparel Set', 'Artisanal Handbag Collection', 'Tech Gadget Organizer', 'Solar-Powered Outdoor Lights', 'Luxury Spa Day Experience', 'Virtual Reality Gaming Console', 'Contemporary Wall Art Collection',
        ];
        $condition = [
            'New', 'Used', 'Refurbished', 'For Parts', 'Other',
        ];
        $brands = [
            'Apple', 'Samsung', 'Microsoft', 'Sony', 'LG', 'Lenovo', 'Asus', 'HP', 'Dell', 'Acer', 'Huawei', 'Xiaomi', 'Oppo', 'Vivo', 'Realme', 'OnePlus', 'Google', 'Motorola', 'Nokia', 'Blackberry', 'HTC', 'ZTE', 'Alcatel', 'TCL', 'Amazon', 'Razer', 'Panasonic', 'Toshiba', 'Fujitsu', 'Sharp', 'Infinix', 'Tecno', 'Meizu', 'Coolpad', 'Gionee', 'Micromax', 'Lava', 'Intex', 'Karbonn', 'YU', 'Xolo', 'LeEco', 'BLU', 'InFocus', 'Itel', 'Spice', 'QMobile', 'Vodafone', 'Airtel', 'BSNL', 'Idea', 'Reliance Jio', 'T-Mobile', 'Verizon', 'AT&T', 'Sprint', 'Virgin Mobile', 'US Cellular', 'Boost Mobile', 'Cricket Wireless', 'TracFone', 'MetroPCS', 'Xfinity Mobile', 'Google Fi', 'Consumer Cellular', 'Straight Talk', 'Simple Mobile', 'H2O Wireless', 'Mint Mobile', 'Ting', 'Republic Wireless', 'Net10', 'SpeedTalk Mobile', 'FreedomPop', 'Walmart Family Mobile', 'Total Wireless', 'Red Pocket Mobile', 'Project Fi', 'Telcel', 'Tracfone', 'SafeLink Wireless', 'Page Plus Cellular', 'GoSmart Mobile', 'Airvoice Wireless', 'Pix Wireless', 'Puppy Wireless', 'Net10 Wireless', 'US Mobile', 'Ultra Mobile', 'Tello', 'Good2Go Mobile', 'Black Wireless', 'Red Pocket Mobile', 'EcoMobile', 'Ting', 'ROK Mobile', 'TPO Mobile', 'Unreal Mobile', 'Republic Wireless', 'CREDO Mobile', 'TextNow'
        ];
        return [
            'user_id' => User::all()->random()->id,
            'claimed_by' => rand(0, 1) ? User::all()->random()->id : null,
            'category_id' => Category::where('type', 'product')->pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
            'is_claimed' => $this->faker->boolean,
            'is_approved' => $this->faker->boolean,
            'name' => $this->faker->randomElement($productNames),
            'slug' => $this->faker->slug,
            'description' => $this->faker->realText(1000),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'condition' => $this->faker->randomElement($condition),
            'brand' => $this->faker->randomElement($brands),
            'thumbnail' => 'product/thumbnail/prod- (' . rand(1, 99) . ').jpg',
            'gallery' => [
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
            ],
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
