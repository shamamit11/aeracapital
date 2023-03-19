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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('caption')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('main_text')->nullable();
            $table->string('cta_01_text')->nullable();
            $table->string('cta_01_link')->nullable();
            $table->string('cta_02_text')->nullable();
            $table->string('cta_02_link')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->nullable()->default(1)->comment('0 = hide, 1 = show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
