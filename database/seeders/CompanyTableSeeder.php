<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Company::factory()->count(15)->create();
    }
}
