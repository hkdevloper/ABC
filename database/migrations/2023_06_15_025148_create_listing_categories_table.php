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
        Schema::create('listing_categories', function (Blueprint $table) {
            $table->id();
            $table->boolean('published')->default(false);
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('listing_categories')->onDelete('cascade');
            $table->string('icon_color')->nullable();
            $table->string('marker_color')->nullable();
            $table->string('summary')->nullable();
            $table->string('description')->nullable();
            $table->json('linked_fields')->nullable();
            $table->json('linked_products')->nullable();
            $table->foreignId('media_logo_id')->nullable()->constrained('media')->onDelete('cascade');
            $table->foreignId('media_header_image_id')->nullable()->constrained('media')->onDelete('cascade');
            $table->foreignId('seo_id')->nullable()->constrained('seo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_categories');
    }
};
