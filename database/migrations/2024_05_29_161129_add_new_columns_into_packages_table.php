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
        // Add Image Column to the package table
        Schema::table('packages', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->string('dm_available')->nullable();
            $table->string('req_available')->nullable();
        });

        Schema::table('package_user', function (Blueprint $table) {
            $table->string('dm_available')->nullable();
            $table->string('req_available')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('dm_available');
            $table->dropColumn('req_available');
        });

        Schema::table('package_user', function (Blueprint $table) {
            $table->dropColumn('dm_available');
            $table->dropColumn('req_available');
        });
    }
};
