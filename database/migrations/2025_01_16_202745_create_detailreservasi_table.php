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
        Schema::create('detailreservasi', function (Blueprint $table) {
            $table->unsignedBigInteger('idReservasi');
            $table->unsignedBigInteger('idKamar');
            $table->decimal('hargaKamar', 15, 2);
            $table->integer('jumlahKamar');

            $table->foreign('idReservasi')->references('idReservasi')->on('reservasi')->onDelete('cascade');
            $table->foreign('idKamar')->references('idKamar')->on('kamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailreservasi');
    }
};
