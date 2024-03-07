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
        Schema::create('wallet_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('type');
            $table->string('transaction_id')->nullable();
            $table->string('amount');
            $table->string('status')->default('pending');
            $table->json('json_response')->nullable();
            $table->string('method')->nullable();
            $table->string('currency')->nullable();
            $table->string('user_email')->nullable();
            $table->string('contact')->nullable();
            $table->string('fee')->nullable();
            $table->string('tax')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_history');
    }
};
