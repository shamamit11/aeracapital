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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('image_01')->nullable();
            $table->string('image_02')->nullable();
            $table->string('image_03')->nullable();
            $table->string('image_04')->nullable();
            $table->string('image_05')->nullable();
            $table->longText('description')->nullable();
            $table->text('sub_description')->nullable();
            $table->text('service_schema')->nullable();
            $table->text('faq_schema')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->nullable()->default(1)->comment('0 = hide, 1 = show');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
