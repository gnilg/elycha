<?php

use App\Models\Admin;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('avatar')->default("/avatars/default.png");
            $table->string('password');
            $table->integer('level');
            $table->string('token')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Admin::create([
            'email' => 'Komarf28@gmail.com',
            'level' => 3,
            'last_name' => "KOUGBADA",
            'first_name' => "Omar Farouk",
            'status' => 1,
            'token' => getRamdomText(20),
            'password' => bcrypt('r@dy@t1999')
        ]);

        Admin::create([
            'email' => 'admin@alkebulan.com',
            'level' => 3,
            'last_name' => "ALKEBULAN",
            'first_name' => "IMMO",
            'status' => 1,
            'token' => getRamdomText(20),
            'password' => bcrypt('alkebulan@2023')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
