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
            $table->dropColumn('discount_code');
            $table->dropColumn('offer_start_date');
            $table->dropColumn('offer_end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->string('discount_code')->default('X');
            $table->datetime('offer_start_date')->nullable();
            $table->dateTime('offer_end_date')->nullable();
        });
    }
};
