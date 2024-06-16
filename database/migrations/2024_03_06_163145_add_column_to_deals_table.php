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
        Schema::table('deals', function (Blueprint $table) {
            // rename column
            $table->renameColumn('price', 'discount_price');
            // add column
            $table->string('original_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            // rename column
            $table->renameColumn('discount_price', 'price');
            // drop column
            $table->dropColumn('original_price');
        });
    }
};
