<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    public $timestamps = false;
    // Primary key
    protected $primaryKey = 'idReservasi';

    protected $fillable = [
        'idUser',
        'idKamar',
        'tglCekIn',
        'tglCekOut',
        'hargaTotal',
        'metodeByr',
        'statusReservasi',
        'tglReservasi',
    ];
}
