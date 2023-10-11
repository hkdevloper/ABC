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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('approved')->default(false);
            $table->boolean('taxable')->default(false);
            $table->boolean('banned')->default(false);
            $table->string('banned_reason', 500)->nullable();
            $table->string('balance')->default(0);
            $table->string('type')->default('user'); // [user, Admin]
            $table->rememberToken();
            $table->timestamps();
        });

        // Create new admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'type' => 'Admin',
            'approved' => true,
            'taxable' => true,
            'banned' => false,
            'banned_reason' => null,
            'balance' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
