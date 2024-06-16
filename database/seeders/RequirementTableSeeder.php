<?php

namespace Database\Seeders;

use App\Models\Requirement;
use Illuminate\Database\Seeder;

class RequirementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Requirement::factory()
            ->count(100)
            ->create();
    }
}
