<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate two user groups
        UserGroup::factory()->create(
            [
                [
                'name' => 'Admin',
                'permissions' => [
                    'admin_login' => true,
                    'user_login' => true,
                    'admin_content' => true,
                    'admin_listings' => true,
                    'admin_reviews' => true,
                    'admin_messages' => true,
                    'admin_claims' => true,
                    'admin_categories' => true,
                    'admin_products' => true,
                    'admin_fields' => true,
                    'admin_users' => true,
                    'admin_files' => true,
                    'admin_locations' => true,
                    'admin_email' => true,
                    'admin_appearance' => true,
                    'admin_settings' => true,
                    'admin_import' => true,
                    'admin_export' => true,
                ],
            ],
                [
                    'name' => 'Registered SelectUser',
                    'permissions' => [
                        'admin_login' => false,
                        'user_login' => true,
                        'admin_content' => false,
                        'admin_listings' => false,
                        'admin_reviews' => false,
                        'admin_messages' => false,
                        'admin_claims' => false,
                        'admin_categories' => false,
                        'admin_products' => false,
                        'admin_fields' => false,
                        'admin_users' => false,
                        'admin_files' => false,
                        'admin_locations' => false,
                        'admin_email' => false,
                        'admin_appearance' => false,
                        'admin_settings' => false,
                        'admin_import' => false,
                        'admin_export' => false,
                    ],
                ]
            ]
        );
    }
}
