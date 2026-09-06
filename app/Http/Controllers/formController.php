<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Kamar;
use Auth;

class formController extends Controller
{
    // untuk menampilkan form pemesanan
    public function view()
    {
        return view('pesan');
    }
    public function store(Request $request, $idKamar)
{
    // Mencari kamar berdasarkan ID
    $kamar = Kamar::find($idKamar);
    // dd($kamar);

    // Mengirimkan variabel $kamar ke view
    return view('pesan', compact('kamar'));
}
}
