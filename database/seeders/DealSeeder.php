<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Deal::factory()->count(50)->create();
    }

}
