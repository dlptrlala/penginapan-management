<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DetailReservasi;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    public $timestamps = false;
    // Primary key
    protected $primaryKey = 'idReservasi';

    protected $fillable = [
        // 'idUser',
        // 'idKamar',
        // 'tglCekIn',
        // 'tglCekOut',
        // 'hargaTotal',
        // 'metodeByr',
        // 'statusReservasi',
        // 'tglReservasi',
        'idUser',
        'tipeReservasi',
        'tglCekIn',
        'tglCekOut',
        'jumlahTamu',
        'hargaTotal',
        'metodeByr',
        'statusReservasi',
        'tglReservasi',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'idUser',
            'id'
        );
    }

    public function detailReservasi()
    {
        return $this->hasMany(
            DetailReservasi::class,
            'idReservasi',
            'idReservasi'
        );
    }
}
