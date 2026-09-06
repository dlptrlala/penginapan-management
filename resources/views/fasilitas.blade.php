@extends('layouts.app')

@section('content')
<style>
    .facilities-header {
        text-align: center;
        margin-bottom: 2rem;
        color: #07617D;
    }

    .facilities-header h1 {
        font-size: 2.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
    }

    .lead {
        font-size: 1.2rem;
        color: #34495e;
    }

    .facilities-section {
        margin-top: 40px;
    }

    .facilities-section h3 {
        font-size: 2rem;
        font-weight: 600;
        color: #07617D;
        margin-top: 40px;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .facilities-section h3::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background-color: #07617D;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .facility-item {
        display: flex;
        align-items: center;
        justify-content: start;
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .facility-item img {
        width: 50px;
        height: 50px;
        margin-right: 15px;
        object-fit: cover;
    }

    .facility-item .facility-text {
        font-size: 1.1rem;
        color: #34495e;
    }

    .row .col-md-4 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .container {
        max-width: 960px;
        margin: auto;
    }

    .facility-item .col-md-4 {
        display: flex;
        align-items: center;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="facilities-header">
                <h1>Fasilitas Homestay Kami</h1>
                <p class="lead mt-4">
                    Kami menyediakan berbagai fasilitas untuk memastikan kenyamanan Anda selama menginap di Homestay Kami.
                </p>
            </div>

            <div class="facilities-section">
                <h3>Fasilitas Utama</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="AC & TV">
                            <div class="facility-text">
                                <strong>Kamar dengan AC dan TV Kabel</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="Kamar Mandi">
                            <div class="facility-text">
                                <strong>Kamar Mandi Pribadi dengan Air Panas</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="Wi-Fi">
                            <div class="facility-text">
                                <strong>Wi-Fi Gratis di Seluruh Area Homestay</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Layanan Tambahan</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="Antar-Jemput">
                            <div class="facility-text">
                                <strong>Layanan Antar-Jemput ke Bandara</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="Paket Wisata">
                            <div class="facility-text">
                                <strong>Reservasi Paket Wisata Lokal</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="Sepeda dan Mobil">
                            <div class="facility-text">
                                <strong>Penyewaan Sepeda dan Mobil</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="facility-item">
                            <img src="https://via.placeholder.com/50x50" alt="Layanan Makanan">
                            <div class="facility-text">
                                <strong>Layanan Makanan dan Minuman di Kamar</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
