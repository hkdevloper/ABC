<?php

namespace Database\Seeders;

use App\Models\Blogs;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blogs::factory()->count(50)->create();
    }
}
