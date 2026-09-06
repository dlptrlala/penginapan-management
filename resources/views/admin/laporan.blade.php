@extends('layouts.sidebar')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4 fw-bold">📊 Kelola Laporan Homestay - Admin</h1>

    <!-- Pilih Jenis Laporan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title"><i class="bi bi-clipboard-check me-2"></i>Pilih Jenis Laporan</h3>
        </div>
        <div class="card-body">
            <form id="jenisLaporanForm">
                <div class="row g-3">
                    <!-- Pilih Jenis Laporan -->
                    <div class="col-md-8">
                        <label for="jenisLaporan" class="form-label">Jenis Laporan</label>
                        <select id="jenisLaporan" class="form-select" required>
                            <option value="">Pilih Laporan</option>
                            <option value="pemasukan">Laporan Pemasukan</option>
                            <option value="pengeluaran">Laporan Pengeluaran</option>
                            <option value="gaji">Laporan Gaji</option>
                            <option value="keseluruhan">Laporan Keseluruhan</option>
                        </select>
                    </div>
                    <!-- Tombol Pilih -->
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-success w-100" onclick="showLaporanTable()">
                            <i class="bi bi-arrow-right-square me-2"></i>Pilih
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Laporan -->
    <div id="laporanTableContainer">
        <p class="text-center text-muted">Silakan pilih jenis laporan untuk mengisi data.</p>
    </div>
</div>

<script>
    // Function untuk menampilkan tabel sesuai dengan jenis laporan yang dipilih
    function showLaporanTable() {
        const jenisLaporan = document.getElementById('jenisLaporan').value;

        if (!jenisLaporan) {
            alert('Harap pilih jenis laporan!');
            return;
        }

        let tableContent = '';
        if (jenisLaporan === 'pemasukan') {
            tableContent = `
                <h3 class="text-center mt-4">Laporan Pemasukan</h3>
                <table class="table table-bordered table-hover mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jumlah (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Keterangan"></td>
                            <td><input type="number" class="form-control" placeholder="Jumlah"></td>
                            <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3">Simpan Laporan</button>
            `;
        } else if (jenisLaporan === 'pengeluaran') {
            tableContent = `
                <h3 class="text-center mt-4">Laporan Pengeluaran</h3>
                <table class="table table-bordered table-hover mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jumlah (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Keterangan"></td>
                            <td><input type="number" class="form-control" placeholder="Jumlah"></td>
                            <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3">Simpan Laporan</button>
            `;
        } else if (jenisLaporan === 'gaji') {
            tableContent = `
                <h3 class="text-center mt-4">Laporan Gaji</h3>
                <table class="table table-bordered table-hover mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah Gaji (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="text" class="form-control" placeholder="Nama Karyawan"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="number" class="form-control" placeholder="Jumlah Gaji"></td>
                            <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3">Simpan Laporan</button>
            `;
        } else if (jenisLaporan === 'keseluruhan') {
            tableContent = `
                <h3 class="text-center mt-4">Laporan Keseluruhan</h3>
                <table class="table table-bordered table-hover mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Jenis Laporan</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jumlah (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <select class="form-select">
                                    <option value="pemasukan">Pemasukan</option>
                                    <option value="pengeluaran">Pengeluaran</option>
                                    <option value="gaji">Gaji</option>
                                </select>
                            </td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Keterangan"></td>
                            <td><input type="number" class="form-control" placeholder="Jumlah"></td>
                            <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3">Simpan Laporan</button>
            `;
        }

        document.getElementById('laporanTableContainer').innerHTML = tableContent;
    }
</script>
@endsection
