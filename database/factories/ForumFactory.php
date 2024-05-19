<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ForumFactory extends Factory
{
    protected $model = Forum::class;

    public function definition(): array
    {
        return [
            'is_approved' => true,
            'is_featured' => $this->faker->boolean(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(10, true),
            'is_active' => true,
            'summary' => $this->faker->sentence,
            'category_id' => Category::where('type', 'forum')->pluck('id')->random(),
            'company_id' => Company::pluck('id')->random(),
        ];
    }
}
