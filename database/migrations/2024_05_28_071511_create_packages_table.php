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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('duration')->nullable();
            $table->string('duration_type')->nullable();
            $table->float('price')->default(0);
            $table->float('discount_price')->default(0);
            $table->string('image')->nullable();
            $table->string('dm_available')->nullable();
            $table->string('req_available')->nullable();
            $table->json('featured')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_popular')->default(false);
            $table->timestamps();
        });

        Schema::create('package_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_expired')->default(false);
            $table->integer('duration')->nullable();
            $table->string('duration_type')->nullable();
            $table->float('purchased_price')->default(0);
            $table->json('featured')->nullable();
            $table->string('dm_available')->nullable();
            $table->string('req_available')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_user');
        Schema::dropIfExists('packages');
    }
};
