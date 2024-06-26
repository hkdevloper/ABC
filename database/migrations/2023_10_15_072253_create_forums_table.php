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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->string('title');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->longText('body');
            $table->boolean('is_active')->default(true);
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
