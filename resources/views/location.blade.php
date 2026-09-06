@extends('layouts.app')

<style>
    /* Styling untuk judul utama halaman */
    .container h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #07617D;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    /* Mengatur margin dan padding pada halaman */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Styling untuk alamat dan peta */
    .location-container {
        padding: 20px;
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .location-title {
        font-size: 2rem;
        font-weight: 600;
        color: #07617D;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .location-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background-color: #07617D;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .location-text {
        font-size: 16px;
        color: #333;
    }

    /* Styling untuk peta */
    .map-container {
        position: relative;
        padding-bottom: 56.25%; /* Aspect ratio 16:9 */
        height: 0;
        overflow: hidden;
        max-width: 100%;
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
    }

    /* Styling untuk tombol kembali */
    .btn {
        padding: 12px 30px;
        font-size: 16px;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background-color 0.3s ease;
        color: #fff; /* Menambahkan warna teks putih */
    }

    .btn-primary {
        background-color: #07617D !important;
        border-color: #07617D !important;
    }

    .btn-primary:hover {
        background-color: #054D5F !important;
        border-color: #054D5F !important;
    }

    /* Responsif untuk perangkat mobile */
    @media (max-width: 768px) {
        .container h1 {
            font-size: 1.8rem;
        }

        .location-title {
            font-size: 1.6rem;
        }

        .location-text {
            font-size: 14px;
        }

        .map-container {
            padding-bottom: 75%; /* Mengubah aspect ratio untuk perangkat kecil */
        }

        .btn {
            font-size: 14px;
        }

        /* Ubah layout menjadi atas-bawah */
        .row {
            display: block;
        }

        .col-lg-6 {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>

@section('content')
<div class="container my-5">
    <!-- Menambahkan kelas text-center pada kontainer judul untuk memastikan judul berada di tengah -->
    <h1 class="text-center mb-5">LOKASI HOMESTAY</h1>

    <!-- Container Flexbox untuk alamat dan peta -->
    <div class="row">
        <!-- Kolom Alamat -->
        <div class="col-lg-6 mb-4">
            <div class="location-container">
                <h3 class="location-title">Alamat</h3>
                <p class="location-text">Beji Homestay, Jl. Raya Pelangi No. 123, Desa Wisata, Kota Indah, Indonesia</p>
            </div>
        </div>

        <!-- Kolom Peta Lokasi -->
        <div class="col-lg-6 mb-4">
            <div class="location-container">
                <h3 class="location-title">Peta Lokasi</h3>
                <!-- Embed Google Maps -->
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8962928976903!2d110.3690471103853!3d-7.800803277402191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5786a722f04b%3A0xd2b4ff823416174e!2sBeji%20Homestay!5e0!3m2!1sid!2sid!4v1736786518046!5m2!1sid!2sid"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>
@endsection
