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
        Schema::table('contact_us', function (Blueprint $table) {
            // status
            $table->string('status')->default('pending')->after('message');

            // Drop is_active
            $table->dropColumn('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn('status');

            // is_active
            $table->boolean('is_active')->default(false)->after('message');
        });
    }
};
