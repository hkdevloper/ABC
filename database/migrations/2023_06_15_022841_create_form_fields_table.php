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
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->boolean('show_on_submit')->default(true);
            $table->boolean('show_on_update')->default(true);
            $table->boolean('searchable')->default(true);
            $table->boolean('show_on_template')->default(true);
            $table->boolean('show_on_search_result_template')->default(true);
            $table->boolean('required')->default(false);
            $table->enum('field_type',[
                'Captcha',
                'CheckBox',
                'ColorPicker',
                'DatePicker',
                'DatesRange',
                'DateTimePicker',
                'File',
                'Email',
                'hours',
                'HTMLTextArea',
                'Keywords',
                'MSelect',
                'Number',
                'Phone',
                'Radio',
                'Price',
                'Select',
                'Separator',
                'Social',
                'Text',
                'TextArea',
                'TimePicker',
                'URL',
                'TimeZone',
                'Toggle',
                'Youtube',
                ])->default('text');
            $table->string('icon')->nullable();
            $table->enum('search_type', [
                'exact',
                'partial',
                'range'
            ])->default('exact');
            $table->string('name');
            $table->string('label')->unique();
            $table->string('placeholder')->nullable();
            $table->string('default_value')->nullable();
            $table->string('description')->nullable();
            $table->json('linked_products')->nullable();
            $table->json('linked_categories')->nullable();
            $table->string('schema')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
