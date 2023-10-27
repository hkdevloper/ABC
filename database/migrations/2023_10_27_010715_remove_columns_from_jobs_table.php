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
        Schema::table('jobs', function (Blueprint $table) {
            // Drop summary, website
            $table->dropColumn('summary');
            $table->dropColumn('website');
            $table->dropColumn('overview');
            $table->dropColumn('gallery');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Add summary, website
            $table->text('summary')->nullable();
            $table->string('website')->nullable();
            $table->text('overview')->nullable();
            $table->json('gallery')->nullable();
        });
    }
};
