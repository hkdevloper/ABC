<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Address::factory()->count(10)->create();
    }
}
