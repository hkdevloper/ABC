<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
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
            'thumbnail' => 'product/thumbnail/prod- (' . rand(1, 99) . ').jpg',
            'gallery' => [
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
                'product/gallery/prod-gallery- (' . rand(1, 100) . ').jpg',
            ],
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'discount_price' => $this->faker->randomNumber(5),
            'original_price' => $this->faker->randomNumber(5),
            'terms_and_conditions' => $this->faker->realText(500),
            'company_id' => Company::pluck('id')->random(),
            'category_id' => Category::where('type', 'deal')->pluck('id')->random(),
            'seo_id' => Seo::factory()->create()->id,
        ];
    }
}
