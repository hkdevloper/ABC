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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->boolean('approved')->default(true);
            $table->boolean('claimed')->default(true);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->json('extra_things')->nullable();
            $table->json('gallery')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('youtube')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('location')->cascadeOnDelete();
            $table->foreignId('state_id')->nullable()->constrained('location')->cascadeOnDelete();
            $table->foreignId('country_id')->nullable()->constrained('location')->cascadeOnDelete();
            $table->string('zip_code');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('map_zoom_level')->default(2);
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->foreignId('media_logo_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
