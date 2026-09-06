<?php

namespace App\Http\Controllers;
use App\Models\Kamar; // Pastikan model Room sudah diimport

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
        return view('admin.orders');
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
