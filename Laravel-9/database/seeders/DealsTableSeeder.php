<?php

namespace Database\Seeders;

use App\Models\Deals;
use Illuminate\Database\Seeder;

class DealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deals::factory()->count(15)->create();
    }
}
