@extends('layouts.sidebar')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4 fw-bold">📊 Laporan Homestay - Admin</h1>

    <!-- Filter Bulan dan Tahun -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title"><i class="bi bi-funnel me-2"></i>Filter Laporan</h3>
        </div>
        <div class="card-body">
            <form id="filterForm">
                <div class="row g-3">
                    <!-- Pilih Bulan -->
                    <div class="col-md-4">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select id="bulan" class="form-select" required>
                            <option value="">Pilih Bulan</option>
                            @foreach (range(1, 12) as $bulan)
                                <option value="{{ $bulan }}">{{ DateTime::createFromFormat('!m', $bulan)->format('F') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Pilih Tahun -->
                    <div class="col-md-4">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select id="tahun" class="form-select" required>
                            <option value="">Pilih Tahun</option>
                            @foreach (range(date('Y') - 5, date('Y')) as $tahun)
                                <option value="{{ $tahun }}">{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Tombol Filter -->
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-success w-100" onclick="filterReport()">
                            <i class="bi bi-search me-2"></i>Tampilkan Laporan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tempat Menampilkan Laporan -->
    <div id="laporanContainer">
        <p class="text-center text-muted">Silakan pilih bulan dan tahun untuk melihat laporan.</p>
    </div>
</div>

<script>
    // Function untuk memfilter laporan berdasarkan bulan dan tahun
    function filterReport() {
        const bulan = document.getElementById('bulan').value;
        const tahun = document.getElementById('tahun').value;

        if (!bulan || !tahun) {
            alert('Harap pilih bulan dan tahun!');
            return;
        }

        // Simulasi Data (Hasil yang dipanggil dari backend)
        const laporan = `
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title"><i class="bi bi-clipboard-data me-2"></i>Laporan Bulan ${bulan}/${tahun}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Ringkasan Laporan:</strong></p>
                    <ul>
                        <li>Pemasukan: <strong class="text-success">Rp50,000,000</strong></li>
                        <li>Pengeluaran: <strong class="text-danger">Rp15,000,000</strong></li>
                        <li>Gaji: <strong class="text-primary">Rp20,000,000</strong></li>
                        <li>Saldo Akhir: <strong>Rp15,000,000</strong></li>
                    </ul>
                    <a href="#" class="btn btn-warning mt-3"><i class="bi bi-pencil me-2"></i>Edit Laporan</a>
                </div>
            </div>
        `;

        document.getElementById('laporanContainer').innerHTML = laporan;
    }
</script>
@endsection



