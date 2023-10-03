<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->string('name');
            $table->text('description');
            $table->json('settings');
            $table->timestamps();
        });

        // add default payment gateways
        DB::table('payment_gateways')->insert([
            [
                'is_active' => 0,
                'name' => 'PayPal',
                'description' => 'PayPal payment gateway',
                'settings' => json_encode([
                    'client_id' => '',
                    'client_secret' => '',
                    'sandbox_mode' => 1,
                    'currency' => 'USD',
                ])
            ],
            [
                'is_active' => 0,
                'name' => 'Stripe',
                'description' => 'Stripe payment gateway',
                'settings' => json_encode([
                    'publishable_key' => '',
                    'secret_key' => '',
                    'api_key' => '',
                    'currency' => 'USD',
                    'sandbox_mode' => 1,
                ])
            ],
            [
                'is_active' => 1,
                'name' => 'Bank Transfer',
                'description' => 'Bank Transfer payment gateway',
                'settings' => json_encode([
                    'account_name' => '',
                    'account_number' => '',
                    'bank_name' => '',
                    'bank_branch' => '',
                ])
            ],
            [
                'is_active' => 1,
                'name' => 'offline/Wire Transfer',
                'description' => 'Offline payment gateway',
                'settings' => json_encode([
                    'instructions' => '',
                ])
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
