@extends('layouts.app')

<style>
    /* Wrapper for Form and Room Cards */
    .content-wrapper {
        display: grid;
        grid-template-columns: 1fr 3fr;
        /* Kolom kiri lebih kecil */
        gap: 30px;
        margin-top: 20px;
    }

    .form-cari {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .filter-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .filter-btn {
        padding: 5px 10px;
        /* Mengurangi padding */
        margin: 0 3px;
        /* Mengurangi jarak antar tombol */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 12px;
        /* Memperkecil ukuran font */
        background-color: #f1f1f1;
        color: #333;
        transition: background-color 0.3s;
    }

    .filter-btn.active {
        background-color: #F9A828;
        color: #000;
    }

    .filter-btn:hover {
        background-color: #ffd580;
    }

    /* Room Cards (Kanan) */
    .room-cards {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        /* Dibagi menjadi dua kolom */
        gap: 15px;
        /* Jarak antar kartu */
        padding: 10px;
        justify-content: center;
    }

    .room-card {
        background-color: #fff;
        border-radius: 8px;
        /* Sedikit lebih kecil */
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        /* Lebih ringan */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 355px;

        margin-bottom: 20px;
    }

    .room-card:hover {
        transform: translateY(-3px);
        /* Hover lebih halus */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .room-image {
        width: 100%;
        height: 150px;
        /* Mengurangi tinggi gambar */
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .room-info {
        padding: 15px;
        /* Menambah padding untuk ruang di dalam */
        text-align: left;
        margin-top: 10px;
        /* Memberikan jarak antara gambar dan informasi */
        height: 200px;
    }

    .room-header {
        display: flex;
        justify-content: space-between;
        /* Nama kamar dan status di kanan-kiri */
        align-items: center;
        /* Selaraskan secara vertikal */
        margin-bottom: 10px;
        /* Beri sedikit jarak ke bawah */
    }

    .room-title {
        font-size: 20px;
        font-weight: bold;
        margin: 0;
    }

    .room-status .badge {
        font-size: 12px;
        /* Sesuaikan ukuran teks badge */
        padding: 5px 8px;
        /* Tambahkan padding */
        border-radius: 5px;
    }

    .room-details {
        margin-top: 10px;
        font-size: 12px;
        /* Font lebih kecil */
        color: #555;
        display: grid;
        grid-template-columns: 1fr 1fr;
        /* Tetap dua kolom */
        gap: 3px;
    }

    .room-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .room-book-btn {
        font-size: 16px;
        padding: 10px 60px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .room-book-btn:hover {
        background-color: #0056b3;
    }

    .room-update-container {
        text-align: right;
        /* Memastikan teks rata kanan */
    }

    .room-update {
        font-size: 12px;
        color: #777;
        margin: 0;
        /* Hilangkan margin default */
        line-height: 1.2;
        /* Beri jarak vertikal antar baris */
    }

    /* Flexbox untuk menampilkan kamar secara berdampingan jika lebih dari satu */
    .room-package-container {
        width: 780px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: flex-start;
    }

    .room-package {

        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        text-align: center;
    }

    .room-package:nth-child(1) {
        order: 1;
    }

    .room-package:nth-child(2) {
        order: 2;
    }

    .room-package:nth-child(3) {
        order: 3;
    }

    .room-package-rooms {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 15px !important;
    }

    .room-header-package {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        /* Beri sedikit jarak ke bawah */
    }

    .room-header-package .room-title-package {
        margin-right: 10px;
        /* Beri jarak antara judul dan tombol */
    }

    @media (max-width: 768px) {
        .room-cards {
            grid-template-columns: 1fr;
            /* Satu kolom untuk layar kecil */
        }

        .room-card {
            margin: 0 auto;
            /* Tengah pada layar kecil */
        }
    }
</style>

@section('content')
<div class="room-section">
    <h2 class="title">Our Homestay Rooms</h2>

    <!-- Filter Buttons -->
    <div class="filter-buttons">
        <a href="{{ route('rooms.index', ['filter' => 'reguler']) }}"
            class="filter-btn {{ $filter == 'reguler' ? 'active' : '' }}">Reguler</a>
        <a href="{{ route('rooms.index', ['filter' => 'paket']) }}"
            class="filter-btn {{ $filter == 'paket' ? 'active' : '' }}">Paket</a>
    </div>

    <!-- Layout with Form and Rooms -->
    <div class="content-wrapper">
        <!-- Form Cari (Kiri) -->
        <div class="form-cari">
            <form action="{{ route('rooms.available') }}" method="GET">
                <div class="form-group">
                    <label for="check_in_date">Tanggal Check-In:</label>
                    <input type="date" id="check_in_date" name="check_in_date" required>
                </div>
                <div class="form-group">
                    <label for="check_in_time">Jam Check-In:</label>
                    <input type="time" id="check_in_time" name="check_in_time" required>
                </div>
                <div class="form-group">
                    <label for="check_out_date">Tanggal Check-Out:</label>
                    <input type="date" id="check_out_date" name="check_out_date" required>
                </div>
                <div class="form-group">
                    <label for="check_out_time">Jam Check-Out:</label>
                    <input type="time" id="check_out_time" name="check_out_time" required>
                </div>
                <button type="submit" class="filter-btn">Cari</button>
            </form>
        </div>

        <!-- Kartu Kamar (Kanan) -->
        <div class="room-cards">
            @if(isset($filter) && $filter == 'paket')
                <div class="room-package-container">
                    <!-- Grid untuk Pembagian Paket Lantai -->

                    <!-- Paket Lantai 1 -->
                    <div class="room-package">
                        <div class="room-header-package">
                            <h3 class="room-title-package">Paket Lantai 1</h3>
                            <span style="font-size: 14px; font-weight: bold;">Harga: Rp # / malam</span>
                            <button class="room-book-btn">Pesan</button>
                        </div>
                        <div class="room-package-rooms">
                            @foreach($rooms['lantai1'] as $room)
                                <div class="room-card">
                                    <img src="{{ asset('images/kamar/' . $room->gambarKamar) }}" alt="Room Image"
                                        class="room-image">
                                    <div class="room-info">
                                        <div class="room-header">
                                            <h3 class="room-title">{{ $room->namaKamar }}</h3>
                                            <span class="room-status">
                                                @if ($room->statusKamar == 'Tersedia')
                                                    <span class="badge bg-success">Tersedia</span>
                                                @elseif ($room->statusKamar == 'Terisi')
                                                    <span class="badge bg-secondary">Sedang Terisi</span>
                                                @else
                                                    <span class="badge bg-danger">Sedang Perbaikan</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="room-details">
                                            <div>🛏️ {{ $room->jmlhKasur }} Kasur</div>
                                            <div>❄️ {{ $room->ac_display }} AC</div>
                                            <div>🚿 {{ $room->jmlhKamarMandi }} Kamar Mandi</div>
                                            <div>👥 Maks {{ $room->kapasitasKamar }} Orang</div>
                                            <div>📍 Lantai {{ $room->lantaiKamar }}</div>
                                        </div>
                                        <div class="room-actions">
                                            <p class="room-update">Terakhir diperbarui: {{ $room->updated_at->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Paket Lantai 2 -->
                    <div class="room-package">
                        <div class="room-header-package">
                            <h3 class="room-title-package">Paket Lantai 2</h3>
                            <span style="font-size: 14px; font-weight: bold;">Harga: Rp # / malam</span>
                            <button class="room-book-btn">Pesan</button>
                        </div>
                        <div class="room-package-rooms">
                            @foreach($rooms['lantai2'] as $room)
                                <div class="room-card">
                                    <img src="{{ asset('images/kamar/' . $room->gambarKamar) }}" alt="Room Image"
                                        class="room-image">
                                    <div class="room-info">
                                        <div class="room-header">
                                            <h3 class="room-title">{{ $room->namaKamar }}</h3>
                                            <span class="room-status">
                                                @if ($room->statusKamar == 'Tersedia')
                                                    <span class="badge bg-success">Tersedia</span>
                                                @elseif ($room->statusKamar == 'Terisi')
                                                    <span class="badge bg-secondary">Sedang Terisi</span>
                                                @else
                                                    <span class="badge bg-danger">Sedang Perbaikan</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="room-details">
                                            <div>🛏️ {{ $room->jmlhKasur }} Kasur</div>
                                            <div>❄️ {{ $room->ac_display }} AC</div>
                                            <div>🚿 {{ $room->jmlhKamarMandi }} Kamar Mandi</div>
                                            <div>👥 Maks {{ $room->kapasitasKamar }} Orang</div>
                                            <div>📍 Lantai {{ $room->lantaiKamar }}</div>
                                        </div>
                                        <div class="room-actions">
                                            <p class="room-update">Terakhir diperbarui: {{ $room->updated_at->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Paket Lantai 3 -->
                    <div class="room-package">
                        <div class="room-header-package">
                            <h3 class="room-title-package">Paket Lantai 3</h3>
                            <span style="font-size: 14px; font-weight: bold;">Harga: Rp # / malam</span>
                            <button class="room-book-btn">Pesan</button>
                        </div>
                        <div class="room-package-rooms">
                            @foreach($rooms['lantai3'] as $room)
                                <div class="room-card">
                                    <img src="{{ asset('images/kamar/' . $room->gambarKamar) }}" alt="Room Image"
                                        class="room-image">
                                    <div class="room-info">
                                        <div class="room-header">
                                            <h3 class="room-title">{{ $room->namaKamar }}</h3>
                                            <span class="room-status">
                                                @if ($room->statusKamar == 'Tersedia')
                                                    <span class="badge bg-success">Tersedia</span>
                                                @elseif ($room->statusKamar == 'Terisi')
                                                    <span class="badge bg-secondary">Sedang Terisi</span>
                                                @else
                                                    <span class="badge bg-danger">Sedang Perbaikan</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="room-details">
                                            <div>🛏️ {{ $room->jmlhKasur }} Kasur</div>
                                            <div>❄️ {{ $room->ac_display }} AC</div>
                                            <div>🚿 {{ $room->jmlhKamarMandi }} Kamar Mandi</div>
                                            <div>👥 Maks {{ $room->kapasitasKamar }} Orang</div>
                                            <div>📍 Lantai {{ $room->lantaiKamar }}</div>
                                        </div>
                                        <div class="room-actions">
                                            <p class="room-update">Terakhir diperbarui: {{ $room->updated_at->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @elseif(isset($filter) && $filter == 'reguler')
                <!-- Kamar Reguler -->
                @foreach($rooms as $room)
                    <div class="room-card">
                        <img src="{{ asset('images/kamar/' . $room->gambarKamar) }}" alt="Room Image" class="room-image">
                        <div class="room-info">
                            <div class="room-header">
                                <h3 class="room-title">{{ $room->namaKamar }}</h3>
                                <span class="room-status">
                                    @if ($room->statusKamar == 'Tersedia')
                                        <span class="badge bg-success">Tersedia</span>
                                    @elseif ($room->statusKamar == 'Terisi')
                                        <span class="badge bg-secondary">Sedang Terisi</span>
                                    @else
                                        <span class="badge bg-danger">Sedang Perbaikan</span>
                                    @endif
                                </span>
                            </div>
                            <div class="room-details">
                                <div>🛏️ {{ $room->jmlhKasur }} Kasur</div>
                                <div>❄️ {{ $room->ac_display }} AC</div>
                                <div>🚿 {{ $room->jmlhKamarMandi }} Kamar Mandi</div>
                                <div>👥 Maks {{ $room->kapasitasKamar }} Orang</div>
                                <div>📍 Lantai {{ $room->lantaiKamar }}</div>
                            </div>
                            <div class="room-price" style="font-size: 12px; font-weight: bold; margin-top: 10px;">
                                Harga: Rp{{ number_format($room->hargaKamar, 0, ',', '.') }} / malam
                            </div>
                            <div class="room-actions">
                                <form action="{{ route('reservasi',['idKamar' => $room->idKamar]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="selectedItems" id="selectedItems">
                                    <button type="submit" class="room-book-btn">Pesan</button>
                                </form>
                                <p class="room-update">Terakhir diperbarui: {{ $room->updated_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection