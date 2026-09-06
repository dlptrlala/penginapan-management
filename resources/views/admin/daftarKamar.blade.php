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

    .btn-success, .btn-warning, .btn-danger {
        border-radius: 20px;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        transition: background-color 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table th {
        background-color: #007bff !important;
        color: white;
        font-size: 1rem;
        padding: 0.75rem;
        text-align: center;
    }

    table td {
        text-align: center;
        vertical-align: middle;
        padding: 0.75rem;
    }

    table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .container h1 {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
        margin-bottom: 1rem;
    }
</style>

<div class="container mt-4">
    <h1>Daftar Kamar</h1>

    <!-- Tombol Tambah Kamar -->
    <a href="{{ route('kelolaKamar') }}" class="btn btn-success mb-3">Tambah Kamar</a>

    <!-- Daftar Kamar -->
    <div class="card">
        <div class="card-header">Daftar Kamar</div>
        <div class="card-body">
            @if($rooms->isEmpty())
                <p>Belum ada kamar yang ditambahkan.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Harga per Malam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $index => $room)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $room->namaKamar }}</td>
                            <td>Rp{{ number_format($room->hargaKamar, 0, ',', '.') }}</td>
                            <td>
                                @if ($room->statusKamar == 'Tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif ($room->statusKamar == 'Terisi')
                                    <span class="badge bg-secondary">Tidak Tersedia</span>
                                @else
                                    <span class="badge bg-secondary">Sedang Perbaikan</span>
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('rooms.edit', $room->idKamar) }}" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tombol Hapus -->
                                <form action="{{ route('rooms.destroy', $room->idKamar) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus kamar ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
