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
        Schema::create('t_kompetensi_mahasiswa', function (Blueprint $table) {
            $table->id('kompetensi_mahasiswa_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('kompetensi_id');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('m_mahasiswa'); 
            $table->foreign('kompetensi_id')->references('kompetensi_id')->on('t_kompetensi'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kompetensi_mahasiswa');
    }
};
