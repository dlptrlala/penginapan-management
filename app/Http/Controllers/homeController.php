<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\home; // Pastikan model Homestay sudah dibuat

class homeController extends Controller
{
    /**
     * Menampilkan halaman daftar homestay.
     */
    public function index()
    {
        // Ambil semua data homestay dari database
        // $homestays = home::all();

        // Kirim data ke view
        return view('homepage');
    }

    /**
     * Menampilkan detail homestay berdasarkan ID.
     */
    // public function detail($id)
    // {
    //     // Ambil data homestay berdasarkan ID
    //     $homestay = Homestay::findOrFail($id);

    //     // Kirim data ke view detail
    //     return view('detail', compact('homestay'));
    // }

    // /**
    //  * Formulir pemesanan homestay.
    //  */
    // public function create($id)
    // {
    //     // Ambil data homestay berdasarkan ID
    //     $homestay = Homestay::findOrFail($id);

    //     // Kirim data ke view formulir pemesanan
    //     return view('form_pemesanan', compact('homestay'));
    // }

    // /**
    //  * Proses penyimpanan pemesanan ke database.
    //  */
    // public function store(Request $request)
    // {
    //     // Validasi data input
    //     $request->validate([
    //         'nama_pemesan' => 'required|string|max:255',
    //         'tanggal_mulai' => 'required|date',
    //         'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    //         'homestay_id' => 'required|exists:homestays,id',
    //     ]);

    //     // Simpan data pemesanan ke database
    //     \DB::table('pemesanan')->insert([
    //         'homestay_id' => $request->homestay_id,
    //         'nama_pemesan' => $request->nama_pemesan,
    //         'tanggal_mulai' => $request->tanggal_mulai,
    //         'tanggal_selesai' => $request->tanggal_selesai,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ]);

    //     // Redirect ke halaman sukses
    //     return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dibuat.');
    // }
}
