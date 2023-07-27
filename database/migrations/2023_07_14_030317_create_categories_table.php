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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            // parent category
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->enum('type', ['product', 'deals', 'job', 'event', 'company']);
            $table->string('slug');
            $table->string('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->foreignId('media_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        // Insert Dummy Categories
        $type = ['product', 'deals', 'job', 'event', 'company'];
        $categories = ['Automotive', 'Beauty & Spas', 'Food & Drink', 'Health & Fitness', 'Home Services', 'Local Services', 'Shopping', 'Things To Do', 'Travel', 'Product', 'Deals', 'Job', 'Event', 'Company', 'Real Estate', 'Education', 'Finance', 'Legal', 'Medical', 'Pets', 'Professional Services', 'Public Services & Government', 'Religious Organizations', 'Restaurants', 'Nightlife', 'Arts & Entertainment', 'Active Life', 'Automotive', 'Beauty & Spas', 'Education', 'Event Planning & Services', 'Financial Services', 'Food', 'Health & Medical', 'Home Services', 'Hotels & Travel', 'Local Flavor', 'Local Services', 'Mass Media', 'Nightlife', 'Pets', 'Professional Services', 'Public Services & Government', 'Real Estate', 'Religious Organizations', 'Restaurants', 'Shopping', 'Transportation', 'Automotive', 'Beauty & Spas', 'Food & Drink', 'Health & Fitness', 'Home Services', 'Local Services', 'Shopping', 'Things To Do', 'Travel', 'Product', 'Deals', 'Job', 'Event', 'Company', 'Real Estate', 'Education', 'Finance', 'Legal', 'Medical', 'Pets', 'Professional Services', 'Public Services & Government', 'Religious Organizations', 'Restaurants', 'Nightlife', 'Arts & Entertainment', 'Active Life', 'Automotive', 'Beauty & Spas', 'Education', 'Event Planning & Services', 'Financial Services', 'Food', 'Health & Medical', 'Home Services', 'Hotels & Travel', 'Local Flavor', 'Local Services', 'Mass Media', 'Nightlife', 'Pets', 'Professional Services', 'Public Services & Government', 'Real Estate', 'Religious Organizations', 'Restaurants', 'Shopping', 'Transportation'];

        $records = [];
        foreach ($categories as $category) {
            $records[] = [
                'name' => $category,
                'type' => $type[array_rand($type)],
                'slug' => Str::slug($category),
                'summary' => null,
                'description' => null,
                'icon' => null,
                'media_id' => null,
                'seo_id' => null,
                'is_active' => true,
                'is_featured' => false,
            ];
        }

        DB::table('categories')->insert($records);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
