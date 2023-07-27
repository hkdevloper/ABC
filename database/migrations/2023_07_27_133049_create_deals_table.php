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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('seo_id')->nullable()->constrained('seo')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            // offer start and end date
            $table->datetime('offer_start_date')->nullable();
            $table->dateTime('offer_end_date')->nullable();
            $table->string('price')->nullable();

            // Discount type
            $table->enum('discount_type', ['percentage', 'amount'])->default('percentage');

            // Discount value
            $table->string('discount_value')->nullable();

            // Discount code
            $table->string('discount_code')->nullable();

            $table->text('terms_and_conditions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
