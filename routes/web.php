<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('homepage');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/facilities', function () {
    return view('fasilitas');
})->name('facilities');

Route::get('/location', function () {
    return view('location');
})->name('location');

Route::get('/lihatJdwl', function () {
    return view('lihatJdwl');
})->name('lihatJdwl');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route untuk menampilkan form pemesanan
// Route::get('/pesan', function () {
//     return view('pesan');
// })->name('pesan');





use App\Http\Controllers\adminController;

// ------------------------------------------------------------------------ view admin
// Route untuk Admin Dashboard
Route::get('/admin/dashboard', [adminController::class, 'dashboard'])->name('admin.dashboard');

// -------------------SEMENTARA BIAR ADA ROUTE DULU
// // Route untuk Pesanan
Route::get('/admin/orders', [adminController::class, 'orders'])->name('admin.orders');
// Route untuk Ulasan
Route::get('/admin/reviews', [adminController::class, 'reviews'])->name('admin.reviews');
// -----------------------------SAMPE ITU, SAMA


use App\Http\Controllers\kamarController;
// BAGIAN ADMIN
// ----------------------YANG INI UDH BISA 
// Daftar kamar
Route::get('/admin/rooms', [kamarController::class, 'index'])->name('admin.daftarKamar');
// Halaman tambah kamar
Route::get('/rooms/create', [kamarController::class, 'create'])->name('kelolaKamar');
Route::post('/admin/rooms', [kamarController::class, 'index'])->name('admin.daftarKamar');
// Simpan kamar baru
Route::post('/admin/orders', [kamarController::class, 'store'])->name('admin.store');
// Hapus kamar
Route::delete('/rooms/{idKamar}', [kamarController::class, 'destroy'])->name('rooms.destroy');

// LAPORAN
Route::get('/admin/laporan', [adminController::class, 'laporan'])->name('admin.laporan');

// tampilan list kamar 
Route::get('/rooms/available', [kamarController::class, 'showAvailableRooms'])->name('rooms.available');



// BAGIAN USER
Route::get('/room', [kamarController::class, 'view'])->name('rooms.view');
Route::get('/room/filter', [kamarController::class, 'showFilter'])->name('rooms.index');
// ------------------------------------------------------- SAMPE SITU UDAH BENER


// -------------------------INI BELUM TAPI JANGAN DIHAPUS DULU YA
// Halaman edit kamar
Route::get('/rooms/{idKamar}/edit', [kamarController::class, 'edit'])->name('rooms.edit');
// Update data kamar
Route::put('/rooms/{idKamar}', [kamarController::class, 'update'])->name('rooms.update');


use App\Http\Controllers\karyawanController;
Route::get('/contact', [karyawanController::class, 'index'])->name('contact');
// Route::post('/contact/send', [karyawanController::class, 'sendMessage'])->name('contact.send');


use App\Http\Controllers\formController;
// Route untuk menampilkan form pemesanan
// Route::get('/reservasi', [formController::class, 'view'])->name('reservasi');
Route::post('/reservasi/{idKamar}', [formController::class, 'store'])->name('reservasi');