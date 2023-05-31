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
        Schema::create('temp_files', function (Blueprint $table) {
            $table->id();
            $table->string('folder');
            $table->string('filename');
            $table->string('size')->nullable();
            $table->string('mime')->nullable();
            $table->string('upload_type')->default('root');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_files');
    }
};
