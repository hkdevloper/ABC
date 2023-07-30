<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::factory()->count(30)->create();
    }
}
