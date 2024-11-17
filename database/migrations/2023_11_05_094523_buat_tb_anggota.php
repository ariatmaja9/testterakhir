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
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->id('id_member')->unique();
            $table->string('nama', 50);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('alamat', 50);
            $table->string('no_telepon', 16);
            $table->string('level', 16);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tb_anggota');
    }
};
