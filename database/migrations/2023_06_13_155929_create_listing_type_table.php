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
        Schema::create('listing_type', function (Blueprint $table) {
            $table->id();
            $table->boolean('published')->default(false);
            $table->enum('type', [
                    'local_business',
                    'event',
                    'job',
                    'place',
                    'classified',
                    'offer',
                    'blog',
                ])->default('local_business');
            $table->string('name_singular');
            $table->string('name_plural');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->boolean('enable_locations')->default(false);
            $table->boolean('enable_reviews')->default(false);
            $table->integer('per_user_limit')->default(1);
            $table->json('parent_types')->nullable();
            $table->json('rating_categories')->nullable();
            $table->text('address_format')->nullable();
            $table->boolean('approve_new_listing')->default(false);
            $table->boolean('approve_edits')->default(false);
            $table->boolean('approve_reviews')->default(false);
            $table->boolean('approve_review_comments')->default(false);
            $table->boolean('approve_messages')->default(false);
            $table->boolean('approve_message_replies')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_type');
    }
};
