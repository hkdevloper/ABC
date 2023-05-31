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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('location')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('summary', 300)->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('map_zoom_level')->default(2);
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->foreignId('media_logo_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->foreignId('media_header_image_id')->nullable()->constrained('media')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
