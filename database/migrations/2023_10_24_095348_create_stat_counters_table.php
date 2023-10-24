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
        Schema::create('stat_counters', function (Blueprint $table) {
            $table->id();
            $table->string('type');     // view, like, share
            $table->string('category'); // company, product, event, job, blog, forum
            $table->unsignedBigInteger('field_id'); // id of the category
            $table->integer('count')->default(0);    // number of views, likes, shares
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stat_counters');
    }
};
