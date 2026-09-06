<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamar')->insert([
            [
                'namaKamar' => 'Double Room',
                'gambarKamar' => 'dobelbed.jpg',
                'jmlhKasur' => 3,
                'jmlhKamarMandi' => 2,
                'ac' => true,
                'hargaKamar' => 130000.00,
                'statusKamar' => 'available',
                'kapasitasKamar' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaKamar' => 'Single Room',
                'gambarKamar' => 'singlebed.jpeg',
                'jmlhKasur' => 2,
                'jmlhKamarMandi' => 1,
                'ac' => false,
                'hargaKamar' => 90000.00,
                'statusKamar' => 'available',
                'kapasitasKamar' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}