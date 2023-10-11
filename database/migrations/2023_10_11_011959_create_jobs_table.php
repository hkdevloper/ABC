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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('title');
            $table->string('slug');
            $table->string('summary')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('valid_until')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('salary')->nullable();
            $table->string('organization')->nullable();
            $table->text('overview')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('gallery');
            $table->string('website')->nullable();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
