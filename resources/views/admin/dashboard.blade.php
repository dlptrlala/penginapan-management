@extends('layouts.sidebar')

<style>
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .card .card-body h2 {
        font-size: 2rem;
        color: #007bff;
    }

    .card .card-body p {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .card-header {
        background-color: #007bff !important;
        color: #fff;
        border-bottom: none;
        border-radius: 12px 12px 0 0;
        padding: 1rem 1.25rem;
        font-size: 1.25rem;
        font-weight: 600;
    }

    .btn-info {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .badge {
        padding: 0.5em 0.75em;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 12px;
    }

    .list-group-item {
        border: none;
        padding: 1rem;
        font-size: 1rem;
    }

    .list-group-item strong {
        color: #2c3e50;
        font-weight: bold;
    }
</style>
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Stats Overview -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Pesanan</h5>
                    <h2>150</h2>
                    <p class="text-muted">Pesanan yang diterima bulan ini</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Kamar Tersedia</h5>
                    <h2>10</h2>
                    <p class="text-muted">Kamar yang masih tersedia</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Pengunjung Hari Ini</h5>
                    <h2>40</h2>
                    <p class="text-muted">Jumlah pengunjung yang datang hari ini</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Ulasan Positif</h5>
                    <h2>45</h2>
                    <p class="text-muted">Jumlah ulasan positif dari pengunjung</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    Pesanan Terbaru
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pengunjung</th>
                                <th>Kamar</th>
                                <th>Tanggal Pesan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ali Rahman</td>
                                <td>Deluxe Room</td>
                                <td>2024-12-30</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jessica Tan</td>
                                <td>Standard Room</td>
                                <td>2024-12-29</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ryan Jauhari</td>
                                <td>Suite Room</td>
                                <td>2024-12-28</td>
                                <td><span class="badge bg-danger">Canceled</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('admin.orders') }}" class="btn btn-info mt-3">Lihat Semua Pesanan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Reviews -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    Ulasan Terbaru
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Alex Johnson</strong> - "Tempat yang luar biasa! Sangat nyaman dan staf yang ramah."
                        </li>
                        <li class="list-group-item">
                            <strong>Jessica Tan</strong> - "Kamar bersih dan layanan cepat, saya pasti akan kembali lagi."
                        </li>
                        <li class="list-group-item">
                            <strong>Ryan Jauhari</strong> - "Harga terjangkau dan lokasi sangat strategis."
                        </li>
                    </ul>
                    <a href="{{ route('admin.reviews') }}" class="btn btn-info mt-3">Lihat Semua Ulasan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
