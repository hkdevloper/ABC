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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('listings')->onDelete('cascade');
            $table->foreignId('listing_category_id')->nullable()->constrained('listing_categories')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->boolean('approved')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('claimed')->default(false);
            $table->integer('media_logo_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('summary')->nullable();
            $table->string('description')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('seo_id')->nullable();
            $table->string('timezone')->nullable();
            $table->string('discount_code')->nullable();
            $table->json('media_gallery_ids')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
