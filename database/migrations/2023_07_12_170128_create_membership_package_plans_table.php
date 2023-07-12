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
        Schema::create('membership_package_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membership_package_id');
            $table->foreign('membership_package_id')->references('id')->on('membership_packages')->onDelete('cascade');
            $table->boolean('hidden')->default(false);
            $table->boolean('auto_approve_listing')->default(false);
            $table->boolean('user_cancellable')->default(false);
            $table->string('billing_period');
            $table->integer('number_of_periods')->default(0);
            $table->double('price')->default(0);
            $table->integer('user_limit')->default(0);
            $table->integer('per_users_limit')->default(0);
            $table->json('supported_payment_gateways');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_package_plans');
    }
};
