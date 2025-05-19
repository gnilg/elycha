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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->string('place')->nullable();
            $table->double('place_lat')->nullable();
            $table->double('place_long')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->string('photo')->nullable(); // Stocke le chemin de la photo
            $table->string('video')->nullable(); // Stocke le chemin de la vidéo
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('is_immo')->default(1);
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('status')->default(1);
            $table->unsignedBigInteger('type')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
