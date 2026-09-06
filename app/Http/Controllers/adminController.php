<?php

namespace App\Http\Controllers;

use App\Models\Kamar; // Pastikan model Room sudah diimport
use App\Models\Reservasi;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    // VIEW ADMIN
    // Menampilkan dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Menampilkan halaman pesanan
    public function orders()
    {
        $reservations = Reservasi::with([
            'user',
            'detailReservasi.kamar'
        ])
            ->orderBy('tglReservasi', 'desc')
            ->get();

        return view('admin.orders', compact('reservations'));
    }

    public function showOrder($idReservasi)
    {
        $reservation = Reservasi::with([
            'user',
            'detailReservasi.kamar'
        ])->findOrFail($idReservasi);

        return view('admin.orderDetail', compact('reservation'));
    }
    public function confirmOrder($idReservasi)
    {
        $reservation = Reservasi::findOrFail($idReservasi);

        $reservation->update([
            'statusReservasi' => 'dikonfirmasi'
        ]);

        return redirect()
            ->route('admin.orders')
            ->with('success', 'Pesanan berhasil dikonfirmasi.');
    }
    public function cancelOrder($idReservasi)
    {
        $reservation = Reservasi::findOrFail($idReservasi);

        $reservation->update([
            'statusReservasi' => 'dibatalkan'
        ]);

        return redirect()
            ->route('admin.orders')
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }

    // Menampilkan halaman ulasan
    public function reviews()
    {
        return view('admin.reviews');
    }

    // Menampilkan halaman laporan
    public function laporan()
    {
        return view('admin.laporan');
    }
}
