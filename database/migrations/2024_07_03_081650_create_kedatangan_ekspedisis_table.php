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
        Schema::create('kedatangan_ekspedisi', function (Blueprint $table) {
            $table->string('id_kedatangan_ekspedisi')->primary();
            $table->string('id_ekspedisi')->foreign('id_ekspedisi')->references('id_ekspedisi')->on('ekspedisis')->onDelete('cascade');
            $table->string('id_pegawai')->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')->onDelete('cascade');
            $table->unsignedBigInteger('id_user')->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('Foto');
            $table->dateTime('Tanggal_waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kedatangan_ekspedisis');
    }
};
