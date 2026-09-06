@extends('layouts.sidebar')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4 fw-bold">📊 Laporan Homestay</h1>
    <div class="row">
        <!-- Sidebar Pilihan Laporan -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" onclick="showReport('laporanPemasukan')">
                    <i class="bi bi-cash-stack me-2"></i>Laporan Pemasukan
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showReport('laporanPengeluaran')">
                    <i class="bi bi-wallet2 me-2"></i>Laporan Pengeluaran
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showReport('laporanGaji')">
                    <i class="bi bi-person-badge me-2"></i>Laporan Gaji
                </a>
                <a href="#" class="list-group-item list-group-item-action" onclick="showReport('laporanKeseluruhan')">
                    <i class="bi bi-clipboard-data me-2"></i>Laporan Keseluruhan
                </a>
            </div>
        </div>

        <!-- Konten Laporan -->
        <div class="col-md-9">
            <!-- Laporan Pemasukan -->
            <div id="laporanPemasukan" class="report-section">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title"><i class="bi bi-cash-stack me-2"></i>Laporan Pemasukan</h3>
                    </div>
                    <div class="card-body">
                        <p>Total pemasukan: <strong class="text-success">Rp50,000,000</strong></p>
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2025-01-10</td>
                                    <td>Pendapatan Kamar</td>
                                    <td>Rp30,000,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2025-01-15</td>
                                    <td>Pendapatan Fasilitas</td>
                                    <td>Rp20,000,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Laporan Pengeluaran -->
            <div id="laporanPengeluaran" class="report-section d-none">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-danger text-white">
                        <h3 class="card-title"><i class="bi bi-wallet2 me-2"></i>Laporan Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                        <p>Total pengeluaran: <strong class="text-danger">Rp15,000,000</strong></p>
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2025-01-12</td>
                                    <td>Biaya Operasional</td>
                                    <td>Rp5,000,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2025-01-18</td>
                                    <td>Perawatan Fasilitas</td>
                                    <td>Rp10,000,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Laporan Gaji -->
            <div id="laporanGaji" class="report-section d-none">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><i class="bi bi-person-badge me-2"></i>Laporan Gaji</h3>
                    </div>
                    <div class="card-body">
                        <p>Total gaji yang dibayarkan: <strong class="text-primary">Rp20,000,000</strong></p>
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Bulan</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jumlah Gaji</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Januari 2025</td>
                                    <td>Ani</td>
                                    <td>Rp10,000,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Januari 2025</td>
                                    <td>Budi</td>
                                    <td>Rp10,000,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Laporan Keseluruhan -->
            <div id="laporanKeseluruhan" class="report-section d-none">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h3 class="card-title"><i class="bi bi-clipboard-data me-2"></i>Laporan Keseluruhan</h3>
                    </div>
                    <div class="card-body">
                        <p>Rekap laporan pemasukan, pengeluaran, dan gaji.</p>
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Jenis Laporan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pemasukan</td>
                                    <td>Rp50,000,000</td>
                                </tr>
                                <tr>
                                    <td>Pengeluaran</td>
                                    <td>Rp15,000,000</td>
                                </tr>
                                <tr>
                                    <td>Gaji</td>
                                    <td>Rp20,000,000</td>
                                </tr>
                                <tr>
                                    <td><strong>Saldo Akhir</strong></td>
                                    <td><strong>Rp15,000,000</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to show selected report
    function showReport(reportId) {
        // Hide all report sections
        document.querySelectorAll('.report-section').forEach(section => {
            section.classList.add('d-none');
        });

        // Show the selected report section
        document.getElementById(reportId).classList.remove('d-none');
    }
</script>
@endsection
