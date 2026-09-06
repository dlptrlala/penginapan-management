<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class karyawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            [
                'namaKywn' => 'Ayla Cantika',
                'gambarKywn' => 'kywn1.jpeg',
                'kontakKywn' => '081234567890',
                'posisiKywn' => 'Kebersihan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaKywn' => 'Arka Pratama',
                'gambarKywn' => 'kywn2.jpeg',
                'kontakKywn' => '082534636523',
                'posisiKywn' => 'Mekanik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaKywn' => 'Nadia Alisha',
                'gambarKywn' => 'kywn3.jpeg',
                'kontakKywn' => '08938342342',
                'posisiKywn' => 'Koki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaKywn' => 'Keira Salsabila',
                'gambarKywn' => 'kywn4.jpeg',
                'kontakKywn' => '08972848234',
                'posisiKywn' => 'Owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaKywn' => 'Jisung Park',
                'gambarKywn' => 'kywn5.jpeg',
                'kontakKywn' => '087348q41242',
                'posisiKywn' => 'Kebersihan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
