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
        Schema::create('kedatangan_tamu', function (Blueprint $table) {
            $table->string('id_kedatangan_tamu')->primary();
            $table->string('id_pegawai')->foreign('id_pegawai')->references('NIP')->on('pegawais')->onDelete('cascade');
            $table->string('id_tamu')->foreign('id_tamu')->references('id_tamu')->on('tamus')->onDelete('cascade');
            $table->unsignedBigInteger('id_user')->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('QR_code');
            $table->text('Tujuan');
            $table->text('Instansi');
            $table->dateTime('Waktu_perjanjian');
            $table->string('Foto');
            $table->dateTime('Waktu_kedatangan');
            $table->enum('Status',['Menunggu konfirmasi','Diterima','Ditolak'])->defaukt('Menunggu konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kedatangan_tamus');
    }
};
