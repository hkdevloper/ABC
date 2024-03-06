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
            $table->date('established_at')->nullable()->after('name');
            $table->string('number_of_employees')->nullable()->after('established_at');
            $table->string('turnover')->nullable()->after('number_of_employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('established_at');
            $table->dropColumn('number_of_employees');
            $table->dropColumn('turnover');
        });
    }
};
