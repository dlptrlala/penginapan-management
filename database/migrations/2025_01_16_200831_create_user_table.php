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
            // $table->id('idUser');
            // $table->string('namaUser');
            // $table->string('noWA');
            // $table->integer('jmlhTamu');
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('noWA')->nullable();

            $table->string('password');
            $table->string('role')->default('customer');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
