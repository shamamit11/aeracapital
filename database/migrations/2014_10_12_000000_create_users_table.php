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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verification_code')->unique();
            $table->boolean('email_verified')->default(0)->comment('0 = not verified, 1 = verified');
            $table->boolean('status')->default(1)->comment('0 = inactive, 1 = active');
            $table->enum('user_type', ['N', 'S'])->default('N')->comment('N = Normal, S = Standard');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
