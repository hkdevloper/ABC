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
        Schema::table('forums', function (Blueprint $table) {
            // Add new column is approved
            $table->boolean('is_approved')->default(0)->after('is_active');
            $table->boolean('is_featured')->default(0)->after('is_approved');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forums', function (Blueprint $table) {
            // drop
            $table->dropColumn('is_approved');
            $table->dropColumn('is_featured');
        });
    }
};
