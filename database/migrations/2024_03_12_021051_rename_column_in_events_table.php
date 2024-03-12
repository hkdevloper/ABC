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
        Schema::table('events', function (Blueprint $table) {
            // Remove Foreign Key Constraint
            $table->dropForeign(['user_id']);
            // Rename user_id column to company_id
            $table->renameColumn('user_id', 'company_id');
            // Add Foreign Key Constraint
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Remove Foreign Key Constraint
            $table->dropForeign(['company_id']);
            // Rename company_id column to user_id
            $table->renameColumn('company_id', 'user_id');
            // Add Foreign Key Constraint
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }
};
