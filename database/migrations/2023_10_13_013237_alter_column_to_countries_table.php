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
        Schema::table('countries', function (Blueprint $table) {
            $table->string('code')->nullable()->change();
            $table->string('phone_code')->nullable()->change();
            $table->string('currency')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('code')->nullable(false)->change();
            $table->string('phone_code')->nullable(false)->change();
            $table->string('currency')->nullable(false)->change();
        });
    }
};
