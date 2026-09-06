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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id('idReservasi');
            $table->unsignedBigInteger('idUser');
            $table->decimal('hargaTotal', 15, 2);
            $table->date('tglCekIn');
            $table->date('tglCekOut');
            $table->string('metodeByr', 50);
            $table->dateTime('tglReservasi');
            $table->string('statusReservasi', 50);

            $table->foreign('idUser')->references('idUser')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
