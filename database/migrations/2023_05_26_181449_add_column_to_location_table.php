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
        Schema::table('location', function (Blueprint $table) {
            // Foreign key relation to seo id
            $table->foreignId('seo_id')->nullable()->constrained('seo');
            $table->foreignId('media_logo_id')->nullable()->constrained('media');
            $table->foreignId('media_header_image_id')->nullable()->constrained('media');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location', function (Blueprint $table) {
            // drop foreign key
            $table->dropForeign(['seo_id']);
            $table->dropForeign(['media_logo_id']);
            $table->dropForeign(['media_header_image_id']);
            // drop columns
            $table->dropColumn('seo_id');
            $table->dropColumn('media_logo_id');
            $table->dropColumn('media_header_image_id');
        });
    }
};
