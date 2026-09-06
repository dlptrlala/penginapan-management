@extends('layouts.sidebar')

@section('content')
<style>
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-size: 1.25rem;
        font-weight: bold;
        border-radius: 12px 12px 0 0;
        padding: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 20px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        border-radius: 20px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
    }

    .container h1 {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
        margin-bottom: 1.5rem;
    }
</style>

<div class="container mt-4">
    <h1>Kelola Kamar</h1>

    <!-- Tambah Kamar -->
    <div class="card mb-4">
        <div class="card-header">Tambah Kamar</div>
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="roomName" class="form-label">Nama Kamar</label>
                    <input type="text" class="form-control" id="roomName" name="namaKamar" required>
                </div>
                <div class="mb-3">
                    <label for="roomPrice" class="form-label">Harga per Malam</label>
                    <input type="number" class="form-control" id="roomPrice" name="hargaKamar" required>
                </div>
                <div class="mb-3">
                    <label for="roomBeds" class="form-label">Jumlah Kasur</label>
                    <input type="number" class="form-control" id="roomBeds" name="jmlhKasur" required>
                </div>
                <div class="mb-3">
                    <label for="roomBathrooms" class="form-label">Jumlah Kamar Mandi</label>
                    <input type="number" class="form-control" id="roomBathrooms" name="jmlhKamarMandi" required>
                </div>
                <div class="mb-3">
                    <label for="roomAC" class="form-label">AC</label>
                    <select class="form-select" id="roomAC" name="ac" required>
                        <option value="" selected disabled>Pilih AC</option>
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="roomLantai" class="form-label">Keberadaan kamar</label>
                    <select class="form-select" id="roomLantai" name="lantaiKamar" required>
                        <option value="" selected disabled>Pilih Lantai</option>
                        <option value="1">Lantai 1</option>
                        <option value="2">Lantai 2</option>
                        <option value="3">Lantai 3</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="roomCapacity" class="form-label">Kapasitas Kamar</label>
                    <input type="number" class="form-control" id="roomCapacity" name="kapasitasKamar" required>
                </div>
                <div class="mb-3">
                    <label for="roomStatus" class="form-label">Status Kamar</label>
                    <select class="form-select" id="roomStatus" name="statusKamar" required>
                        <option value="" selected disabled>Pilih Status</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Terisi">Terisi</option>
                        <option value="Perbaikan">Perbaikan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="roomImage" class="form-label">Gambar Kamar</label>
                    <input type="file" class="form-control" id="roomImage" name="gambarKamar">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection