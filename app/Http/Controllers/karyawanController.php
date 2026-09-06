<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
// use Illuminate\Support\Facades\DB;

class karyawanController extends Controller
{
    public function index()
    {
        $employees = Karyawan::all(); // Ambil semua data karyawan
        $homestayContact = [
            'phone' => '081111222333',
            'email' => 'info@homestay.com',
            'hours' => '08:00 - 20:00',
        ];

        return view('contact', compact('employees', 'homestayContact'));
    }

    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'message' => 'required',
    //     ]);

    //     $name = $request->input('name');
    //     $phone = $request->input('phone');
    //     $message = $request->input('message');

    //     $whatsappLink = "https://wa.me/62{$request->input('phone')}?text=" . urlencode("Halo, nama saya $name. $message");

    //     return redirect()->to($whatsappLink);
    // }
}
