<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReservasi extends Model
{
    use HasFactory;

    protected $table = 'detailreservasi';

    protected $primaryKey = 'idDetailReservasi';

    public $timestamps = false;

    protected $fillable = [
        'idReservasi',
        'idKamar',
        'hargaKamar',
    ];

    public function reservasi()
    {
        return $this->belongsTo(
            Reservasi::class,
            'idReservasi',
            'idReservasi'
        );
    }

    public function kamar()
    {
        return $this->belongsTo(
            Kamar::class,
            'idKamar',
            'idKamar'
        );
    }
}