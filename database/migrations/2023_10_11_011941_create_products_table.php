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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('claimed_by')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_claimed')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->decimal('price')->nullable();
            $table->string('condition')->nullable();
            $table->string('brand')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('material')->nullable();
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
