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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->boolean('approved')->default(false);
            $table->boolean('taxable')->default(false);
            $table->boolean('banned')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->string('banned_reason', 500)->nullable();
            $table->string('balance')->default(0);
            $table->foreignId('user_group_id')->nullable()->constrained('user_group');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
