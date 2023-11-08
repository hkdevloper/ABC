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
        Schema::table('requirements', function (Blueprint $table) {
            // Remove
            $table->dropColumn('service_name');
            $table->dropColumn('quantity');

            // Add
            $table->string('subject')->nullable()->after('id');
            $table->string('country')->nullable()->after('id');
            $table->json('images')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requirements', function (Blueprint $table) {
            // Remove
            $table->dropColumn('subject');
            $table->dropColumn('country');
            $table->dropColumn('images');

            // Add
            $table->string('service_name')->nullable()->after('id');
            $table->integer('quantity')->nullable()->after('description');
        });
    }
};
