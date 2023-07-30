<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make an Admin and a SelectUser
        User::factory()->create([
            [
                'first_name' => 'Demo',
                'last_name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
                'email_verified' => true,
                'user_group_id' => 1,
                'approved' => true,
                'taxable' => true,
                'banned' => false,
                'banned_reason' => null,
                'balance' => 0,
            ],
            [
                'first_name' => 'Demo',
                'last_name' => 'SelectUser',
                'email' => 'user@mail.com',
                'password' => bcrypt('user'),
                'email_verified' => true,
                'user_group_id' => 2,
                'approved' => true,
                'taxable' => true,
                'banned' => false,
                'banned_reason' => null,
                'balance' => 0,
            ]
        ]);

    }
}
