<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make an Admin and a User
        \App\Models\User::factory()->create([
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
                'last_name' => 'User',
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
