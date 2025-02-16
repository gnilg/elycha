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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('token')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('type_user')->default(1); // 1:Client || 2:Agent
            $table->unsignedBigInteger('status')->default(1);
            $table->double('balance')->default(0.0)->nullable();
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
