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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('caption')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('main_text')->nullable();
            $table->string('icon_01')->nullable();
            $table->string('icon_01_caption')->nullable();
            $table->string('icon_01_text')->nullable();
            $table->string('icon_02')->nullable();
            $table->string('icon_02_caption')->nullable();
            $table->string('icon_02_text')->nullable();
            $table->string('list_icon')->nullable();
            $table->string('list_01_text')->nullable();
            $table->string('list_02_text')->nullable();
            $table->string('list_03_text')->nullable();
            $table->string('list_04_text')->nullable();
            $table->string('list_05_text')->nullable();
            $table->string('list_06_text')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        }, 'ROW_FORMAT=DYNAMIC');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
