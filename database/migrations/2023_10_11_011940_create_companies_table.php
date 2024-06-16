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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_approved')->default(true);
            $table->boolean('is_claimed')->default(true);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(true);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('claimed_by')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('business_type')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->json('extra_things');
            $table->string('banner')->nullable();
            $table->string('logo')->nullable();
            $table->json('gallery')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('youtube')->nullable();
            $table->date('established_at')->nullable();
            $table->string('number_of_employees')->nullable();
            $table->string('turnover')->nullable();
            $table->boolean('is_rejected')->default(false);
            $table->string('rejected_reason')->nullable();
            $table->foreignId('address_id')->nullable()->constrained('addresses')->cascadeOnDelete();
            $table->foreignId('seo_id')->nullable()->constrained('seo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
