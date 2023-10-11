<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::factory()->count(50)->create();
        $locations = Location::all();
        foreach ($locations as $location) {
            if (rand(0, 2) == 1) {
                $location->parent_id = null;
                $location->save();
                continue;
            }
            $location->parent_id = Location::inRandomOrder()->first()->id;
            $location->save();
        }
    }
}
