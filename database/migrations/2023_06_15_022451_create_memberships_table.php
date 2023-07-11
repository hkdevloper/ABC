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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->boolean('published')->default(false);
            $table->boolean('hidden')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('listing_position');
            $table->string('extra_categories_limit');
            $table->string('title_size_limit');
            $table->string('short_description_size_limit');
            $table->string('description_size_limit');
            $table->string('gallery_limit');
            $table->string('event_dates_limit');
            $table->json('linked_fields')->nullable();
            $table->json('linked_categories')->nullable();
            $table->boolean('featured_listings')->default(false);
            $table->boolean('dedicated_listing_page')->default(false);
            $table->boolean('show_address')->default(false);
            $table->boolean('show_map')->default(false);
            $table->boolean('allow_messaging')->default(false);
            $table->boolean('enable_reviews')->default(false);
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
        Schema::dropIfExists('products');
    }
};
