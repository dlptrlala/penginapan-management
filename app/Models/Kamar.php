<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kamar';

    public $timestamps = true;

    // Primary key
    protected $primaryKey = 'idKamar';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'namaKamar',
        'gambarKamar',
        'jmlhKasur',
        'jmlhKamarMandi',
        'ac',
        'hargaKamar',
        'lantaiKamar',
        'statusKamar',
        'kapasitasKamar',
    ];

}
