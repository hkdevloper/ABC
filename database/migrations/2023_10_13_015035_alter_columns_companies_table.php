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
        Schema::table('companies', function (Blueprint $table) {
            // insert foreign key to seo
            $table->foreignId('seo_id')->nullable()->constrained('seo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // drop foreign key to seo
            $table->dropForeign(['seo_id']);
            $table->dropColumn('seo_id');
        });
    }
};
