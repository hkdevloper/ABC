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
        Schema::create('membership_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('type');
            $table->boolean('hidden')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('featured_listings')->default(false);
            $table->integer('listing_position')->default(0);
            $table->boolean('dedicated_listing_page')->default(false);
            $table->integer('extra_category_limit')->default(0);
            $table->integer('title_size_limit')->default(0);
            $table->integer('short_description_limit')->default(0);
            $table->integer('description_size_limit')->default(0);
            $table->integer('gallery_photos_limit')->default(0);
            $table->boolean('show_address')->default(false);
            $table->boolean('show_map')->default(false);
            $table->boolean('allow_messages')->default(false);
            $table->boolean('enable_review')->default(false);
            $table->boolean('enable_seo')->default(false);
            $table->boolean('require_backlink')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_packages');
    }
};
