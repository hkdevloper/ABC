<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('thumbnail_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->json('gallery')->nullable();
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_claimed')->default(false);
            $table->boolean('is_rsvp')->default(false);
            $table->boolean('is_featured')->default(false);

            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();

            $table->dateTime('start');
            $table->dateTime('end');

            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('location')->cascadeOnDelete();
            $table->foreignId('state_id')->nullable()->constrained('location')->cascadeOnDelete();
            $table->foreignId('country_id')->nullable()->constrained('location')->cascadeOnDelete();
            $table->string('zip_code')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('map_zoom_level')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
