<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RateReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RateReview::factory()
            ->count(500)
            ->create();
    }
}
