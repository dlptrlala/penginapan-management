@extends('layouts.app')
<style>
    body {
        background-color: #f8f9fa;
    }

    h1 {
        font-size: 2rem;
        color: #333;
    }

    .form-pemesanan {
        max-width: 800px;
        margin: 0 auto;
    }

    .card {
        border: none;
        border-radius: 10px;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 1rem;
        color: #007BFF;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        box-shadow: none;
        font-size: 1rem;
        padding: 0.75rem 1rem;
    }

    .form-control:focus {
        border-color: #007BFF;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    label {
        font-size: 0.875rem;
        color: #495057;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .btn-primary {
        background-color: #007BFF;
        border: none;
        border-radius: 5px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .form-pemesanan {
            padding: 0 1rem;
        }

        .card-body {
            padding: 1rem;
        }

        h1 {
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 1rem;
        }

        .btn-primary {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    }
</style>
@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Form Pemesanan Homestay</h1>

    <form action="#" method="POST" class="form-pemesanan">
        @csrf

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Nama Pemesan</h3>
                <input type="text" class="form-control" name="nama_pemesan" placeholder="Nama lengkap" required>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Tanggal Booking</h3>
                <div class="form-group">
                    <label for="check_in">Tanggal Check-in</label>
                    <input type="date" class="form-control" id="check_in" name="check_in" required>
                </div>
                <div class="form-group">
                    <label for="check_out">Tanggal Check-out</label>
                    <input type="date" class="form-control" id="check_out" name="check_out" required>
                </div>
                <div class="form-group mt-3">
                    <label for="jumlah_hari">Jumlah Malam</label>
                    <input type="text" class="form-control" id="jumlah_hari" name="jumlah_hari" readonly>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Jumlah Orang</h3>
                <input type="number" class="form-control" name="jumlah_orang" placeholder="Jumlah orang" required>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Kamar yang dipilih</h3>
                <input type="text" class="form-control" value={{ $kamar->namaKamar }} readonly>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Detail Harga</h3>
                <input type="text" class="form-control" id="total_harga" readonly value="Rp 0">
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Metode Pembayaran</h3>
                <select class="form-control" name="metode_bayar" required>
                    <option value="transfer">Transfer Bank</option>
                    <option value="cash">Cash</option>
                    <option value="ovo">OVO</option>
                    <option value="gopay">GoPay</option>
                </select>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <h3 class="card-title">Nomor Telepon WA</h3>
                <input type="tel" class="form-control" name="no_telp" placeholder="Nomor telepon WhatsApp" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-4">Kirim Pemesanan</button>
    </form>
</div>

<script>
    document.getElementById('check_in').addEventListener('change', hitungDurasi);
    document.getElementById('check_out').addEventListener('change', hitungDurasi);

    function hitungDurasi() {
        var checkIn = new Date(document.getElementById('check_in').value);
        var checkOut = new Date(document.getElementById('check_out').value);

        if (checkIn && checkOut) {
            var timeDiff = checkOut - checkIn;
            var days = timeDiff / (1000 * 3600 * 24); // Menghitung jumlah hari
            if (days > 0) {
                document.getElementById('jumlah_hari').value = days + ' Malam';
                updateHarga(days); // Panggil update harga setelah jumlah hari dihitung
            } else {
                document.getElementById('jumlah_hari').value = 'Tanggal check-out harus setelah check-in';
                document.getElementById('total_harga').value = 'Rp0'; // Reset total harga
            }
        }
    }

    function updateHarga(jumlahHari) {
        // Ambil harga per malam dari elemen input harga kamar
        const hargaPerMalam = parseInt('{{ $kamar->hargaKamar }}') || 0;

        if (jumlahHari > 0 && hargaPerMalam > 0) {
            const totalHarga = hargaPerMalam * jumlahHari;
            document.getElementById('total_harga').value = 'Rp' + new Intl.NumberFormat('id-ID').format(totalHarga);
        } else {
            document.getElementById('total_harga').value = 'Rp0';
        }
    }
</script>
@endsection