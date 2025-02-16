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
        Schema::create('boost_publications', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('duration')->nullable();
            $table->double('amount')->nullable();
            $table->unsignedBigInteger('type')->default(1); // 1 : Flooz ; 2 : Tmoney
            $table->unsignedBigInteger('state')->default(0);
            $table->string('identifier')->nullable();
            $table->unsignedBigInteger('publication_id')->nullable();
            $table->foreign('publication_id')->references('id')->on('publications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boost_publications');
    }
};
