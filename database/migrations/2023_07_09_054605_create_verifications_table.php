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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->string('email')->nullable();
            $table->string('email_otp')->nullable();
            $table->date('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_otp')->nullable();
            $table->date('phone_verified_at')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
