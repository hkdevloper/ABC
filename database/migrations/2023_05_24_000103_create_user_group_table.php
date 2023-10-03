<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_group', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('permissions')->nullable();
            $table->timestamps();
        });

        // Insert default user groups
        DB::table('user_group')->insert([
            [
                'name' => 'Admin',
                'permissions' => json_encode([
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
                        ]),
            ],
            [
                'name' => 'Registered SelectUser',
                'permissions' => json_encode([
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
                ]),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_group');
    }
};
