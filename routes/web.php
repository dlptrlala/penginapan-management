<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\formController;
use App\Http\Controllers\karyawanController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
| Halaman yang bisa diakses tanpa harus login.
*/


// Halaman awal
Route::get('/', function () {
    return view('welcome');
});


// Home
Route::get('/home', function () {
    return view('homepage');
})->name('home');


// Tentang Penginapan
Route::get('/about', function () {
    return view('about');
})->name('about');


// Fasilitas
Route::get('/facilities', function () {
    return view('fasilitas');
})->name('facilities');


// Lokasi
Route::get('/location', function () {
    return view('location');
})->name('location');


// Jadwal / Ketersediaan
Route::get('/lihatJdwl', function () {
    return view('lihatJdwl');
})->name('lihatJdwl');


// Kontak
Route::get('/contact', [karyawanController::class, 'index'])
    ->name('contact');



/*
|--------------------------------------------------------------------------
| AUTENTIKASI
|--------------------------------------------------------------------------
| Login, register, dan logout user.
*/


// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');


// Memproses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');


// Menampilkan halaman register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');


// Memproses register
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');


// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');



/*
|--------------------------------------------------------------------------
| CUSTOMER - KAMAR
|--------------------------------------------------------------------------
| Fitur yang digunakan customer untuk melihat kamar.
*/


// Menampilkan semua kamar
Route::get('/room', [kamarController::class, 'view'])
    ->name('rooms.view');


// Filter kamar berdasarkan kategori
Route::get('/room/filter', [kamarController::class, 'showFilter'])
    ->name('rooms.index');


// Mengecek kamar yang tersedia berdasarkan tanggal
Route::get('/rooms/available', [kamarController::class, 'showAvailableRooms'])
    ->name('rooms.available');



/*
|--------------------------------------------------------------------------
| ADMIN - KAMAR
|--------------------------------------------------------------------------
| CRUD kamar yang dilakukan oleh admin.
*/


// Menampilkan daftar kamar
Route::get('/admin/rooms', [kamarController::class, 'index'])
    ->name('admin.daftarKamar');


// Menampilkan form tambah kamar
Route::get('/rooms/create', [kamarController::class, 'create'])
    ->name('kelolaKamar');


// Menyimpan kamar baru
Route::post('/admin/rooms', [kamarController::class, 'store'])
    ->name('admin.store');


// Menampilkan form edit kamar
Route::get('/rooms/{idKamar}/edit', [kamarController::class, 'edit'])
    ->name('rooms.edit');


// Mengupdate data kamar
Route::put('/rooms/{idKamar}', [kamarController::class, 'update'])
    ->name('rooms.update');


// Menghapus kamar
Route::delete('/rooms/{idKamar}', [kamarController::class, 'destroy'])
    ->name('rooms.destroy');



/*
|--------------------------------------------------------------------------
| ADMIN - PESANAN
|--------------------------------------------------------------------------
| Halaman admin untuk melihat pesanan/reservasi customer.
|
| Untuk sementara masih menggunakan AdminController.
| Nanti akan kita ubah supaya mengambil data reservasi dari database.
*/


Route::get('/admin/orders', [adminController::class, 'orders'])
    ->name('admin.orders');

Route::get('/admin/orders/{idReservasi}', [adminController::class, 'showOrder'])
    ->name('admin.orders.show');

Route::post('/admin/orders/{idReservasi}/confirm', [adminController::class, 'confirmOrder'])
    ->name('admin.orders.confirm');

Route::post('/admin/orders/{idReservasi}/cancel', [adminController::class, 'cancelOrder'])
    ->name('admin.orders.cancel');

/*
|--------------------------------------------------------------------------
| ADMIN - ULASAN
|--------------------------------------------------------------------------
| Halaman admin untuk melihat ulasan customer.
|
| Untuk sementara masih berupa halaman yang sudah ada.
| Nanti bisa kita hubungkan ke database.
*/


Route::get('/admin/reviews', [adminController::class, 'reviews'])
    ->name('admin.reviews');



/*
|--------------------------------------------------------------------------
| ADMIN - LAPORAN
|--------------------------------------------------------------------------
| Halaman laporan untuk admin.
|
| Untuk sementara datanya masih belum sepenuhnya dari database.
*/


Route::get('/admin/laporan', [adminController::class, 'laporan'])
    ->name('admin.laporan');



/*
|--------------------------------------------------------------------------
| ADMIN - DASHBOARD
|--------------------------------------------------------------------------
| Halaman utama admin.
*/


Route::get('/admin/dashboard', [adminController::class, 'dashboard'])
    ->name('admin.dashboard');



/*
|--------------------------------------------------------------------------
| CUSTOMER - RESERVASI
|--------------------------------------------------------------------------
| Fitur booking hanya bisa dilakukan oleh user yang sudah login.
*/


Route::middleware('auth')->group(function () {
    // Mengecek ketersediaan kamar berdasarkan tanggal
    Route::get('/reservasi/check-availability', [formController::class, 'checkAvailability'])
        ->name('reservasi.checkAvailability');
        
    // Menampilkan form pemesanan kamar
    Route::get('/reservasi/{idKamar}', [formController::class, 'create'])
        ->name('reservasi.create');


    // Menyimpan data reservasi
    Route::post('/reservasi', [formController::class, 'store'])
        ->name('reservasi.store');

    // Melihat booking milik customer
    Route::get('/booking-saya', [formController::class, 'myBookings'])
        ->name('booking.saya');
});

Route::get('/booking-calendar', [kamarController::class, 'bookingCalendar'])
    ->name('booking.calendar');
