<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Kamar;
use App\Models\DetailReservasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Auth;

class formController extends Controller
{
    // untuk menampilkan form pemesanan
    public function view()
    {
        return view('pesan');
    }

    // Menampilkan form booking
    public function create($idKamar)
    {
        $kamar = Kamar::findOrFail($idKamar);

        return view('pesan', compact('kamar'));
    }
    // Menyimpan booking
    public function store(Request $request)
    {
        $request->validate([
            'idKamar' => 'required|exists:kamar,idKamar',
            'nama' => 'required|string|max:255',
            'noWA' => 'required|string|max:20',
            'tglCekIn' => 'required|date|after_or_equal:today',
            'tglCekOut' => 'required|date|after:tglCekIn',
            'jumlahTamu' => 'required|integer|min:1',
            'metodeByr' => 'required|string|max:50',
        ]);

        $kamar = Kamar::findOrFail($request->idKamar);

        // Cek apakah kamar sedang dibooking
        $bentrok = DetailReservasi::where('idKamar', $kamar->idKamar)
            ->whereHas('reservasi', function ($query) use ($request) {
                $query->whereIn('statusReservasi', [
                    'menunggu',
                    'dikonfirmasi'
                ])
                    ->where('tglCekIn', '<', $request->tglCekOut)
                    ->where('tglCekOut', '>', $request->tglCekIn);
            })
            ->exists();

        if ($bentrok) {
            return back()
                ->withInput()
                ->with('error', 'Kamar sudah dibooking pada tanggal tersebut.');
        }

        // Cek kapasitas kamar
        if ($request->jumlahTamu > $kamar->kapasitasKamar) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jumlah tamu melebihi kapasitas kamar.'
                );
        }

        DB::transaction(function () use ($request, $kamar) {

            $jumlahMalam = \Carbon\Carbon::parse($request->tglCekIn)
                ->diffInDays(
                    \Carbon\Carbon::parse($request->tglCekOut)
                );

            $hargaTotal = $jumlahMalam * $kamar->hargaKamar;

            $reservasi = Reservasi::create([
                'idUser' => Auth::id(),
                'tipeReservasi' => 'kamar',
                'tglCekIn' => $request->tglCekIn,
                'tglCekOut' => $request->tglCekOut,
                'jumlahTamu' => $request->jumlahTamu,
                'hargaTotal' => $hargaTotal,
                'metodeByr' => $request->metodeByr,
                'statusReservasi' => 'menunggu',
                'tglReservasi' => now(),
            ]);

            DetailReservasi::create([
                'idReservasi' => $reservasi->idReservasi,
                'idKamar' => $kamar->idKamar,
                'hargaKamar' => $kamar->hargaKamar,
            ]);
        });

        return redirect()
            ->route('rooms.view')
            ->with('success', 'Reservasi berhasil dibuat!');
    }
    // public function store(Request $request, $idKamar)
    // {
    //     // Mencari kamar berdasarkan ID
    //     $kamar = Kamar::find($idKamar);
    //     // dd($kamar);

    //     // Mengirimkan variabel $kamar ke view
    //     return view('pesan', compact('kamar'));
    // }
}
