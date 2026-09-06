<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    public $timestamps = true;

    // Primary key
    protected $primaryKey = 'idKywn';

    protected $fillable = ['namaKywn', 'gambarKywn', 'kontakKywn', 'posisiKywn'];
}
