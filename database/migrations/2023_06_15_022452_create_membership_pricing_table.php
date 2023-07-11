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
        Schema::create('membership_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->boolean('auto_approve_listings')->default(false);
            $table->boolean('used_for_claiming')->default(false);
            $table->boolean('hidden')->default(false);
            $table->enum('billing_period', ['monthly', 'yearly', 'daily'])->default('monthly');
            $table->integer('billing_cycle')->default(1);
            $table->double('price')->default(0);
            $table->integer('users_limit')->default(1);
            $table->integer('per_user_limit')->default(1);
            $table->enum('payment_gateway', [
                'paypal',
                'stripe',
                'authorize.net',
                'razorpay',
                'offline',
            ])->nullable();
            $table->foreignId('upgrade_pricing_id')->nullable()->constrained('pricing')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_pricing');
    }
};
