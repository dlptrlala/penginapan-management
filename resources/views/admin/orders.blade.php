@extends('layouts.sidebar')

@section('title', 'Pesanan')

@section('content')

<style>
    /* =========================
       GENERAL
    ========================= */

    .orders-page {
        width: 100%;
        max-width: 100%;
    }

    .orders-header {
        margin-bottom: 25px;
    }

    .orders-header h2 {
        font-size: 36px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .orders-header p {
        color: #6c757d;
        margin: 0;
        font-size: 16px;
    }


    /* =========================
       CARD TABLE
    ========================= */

    .orders-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .orders-table {
        width: 100%;
        min-width: 950px;
        border-collapse: collapse;
    }

    .orders-table th {
        padding: 15px 10px;
        text-align: left;
        font-weight: 700;
        color: #171717;
        border-bottom: 1px solid #dee2e6;
        white-space: nowrap;
    }

    .orders-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .orders-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================
       CUSTOMER
       ========================= */

    .customer-name {
        font-weight: 600;
        margin-bottom: 3px;
    }

    .customer-phone {
        color: #6c757d;
        font-size: 14px;
    }


    /* =========================
       ROOM
       ========================= */

    .room-badge {
        display: inline-block;
        background: #f3f4f6;
        color: #1f2937;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 3px;
    }


    /* =========================
       STATUS
       ========================= */

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-menunggu {
        background: #ffc107;
        color: #171717;
    }

    .status-dikonfirmasi {
        background: #198754;
        color: white;
    }

    .status-dibatalkan {
        background: #dc3545;
        color: white;
    }

    .status-default {
        background: #6c757d;
        color: white;
    }


    /* =========================
       ACTION BUTTON
       ========================= */

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .action-button {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 7px;
        border: 1px solid;
        background: white;

        cursor: pointer;
        transition: all 0.2s ease;

        text-decoration: none;
    }

    .action-button svg {
        width: 17px;
        height: 17px;
    }

    /* VIEW */
    .action-view {
        color: #0d6efd;
        border-color: #0d6efd;
    }

    .action-view:hover {
        background: #0d6efd;
        color: white;
    }

    /* CONFIRM */
    .action-confirm {
        color: #198754;
        border-color: #198754;
    }

    .action-confirm:hover {
        background: #198754;
        color: white;
    }

    /* CANCEL */
    .action-cancel {
        color: #dc3545;
        border-color: #dc3545;
    }

    .action-cancel:hover {
        background: #dc3545;
        color: white;
    }


    /* =========================
       EMPTY
       ========================= */

    .empty-orders {
        text-align: center;
        padding: 50px 20px;
        color: #6c757d;
    }


    /* =========================
       MOBILE CARD
       ========================= */

    .mobile-orders {
        display: none;
    }

    .mobile-order-card {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 15px;
        background: white;
    }

    .mobile-order-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 15px;
    }

    .mobile-order-number {
        font-size: 14px;
        color: #6c757d;
    }

    .mobile-order-name {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
    }

    .mobile-order-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 13px;
        margin-bottom: 18px;
    }

    .mobile-info-label {
        display: block;
        font-size: 12px;
        color: #6c757d;
        margin-bottom: 3px;
    }

    .mobile-info-value {
        font-size: 14px;
        font-weight: 600;
        color: #1f2937;
    }

    .mobile-order-total {
        border-top: 1px solid #e5e7eb;
        padding-top: 15px;
        margin-top: 5px;

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mobile-order-total span {
        color: #6c757d;
    }

    .mobile-order-total strong {
        font-size: 17px;
    }

    .mobile-action-buttons {
        display: flex;
        gap: 8px;
        margin-top: 15px;
    }

    .mobile-action-buttons .action-button {
        flex: 1;
    }


    /* =========================
       RESPONSIVE TABLET
       ========================= */

    @media (max-width: 1100px) {

        .orders-header h2 {
            font-size: 30px;
        }

        .orders-card {
            padding: 15px;
        }

    }


    /* =========================
       RESPONSIVE HP
       ========================= */

    @media (max-width: 768px) {

        .orders-header h2 {
            font-size: 27px;
        }

        .orders-header p {
            font-size: 14px;
        }

        /* sembunyikan tabel */
        .desktop-orders {
            display: none;
        }

        /* tampilkan card */
        .mobile-orders {
            display: block;
        }

        .orders-card {
            padding: 12px;
            box-shadow: none;
            background: transparent;
        }

    }


    /* =========================
       HP KECIL
       ========================= */

    @media (max-width: 480px) {

        .orders-header h2 {
            font-size: 24px;
        }

        .mobile-order-info {
            grid-template-columns: 1fr;
        }

        .mobile-order-header {
            flex-direction: column;
        }

    }
</style>


<div class="container-fluid py-4 orders-page">

    {{-- NOTIFIKASI BERHASIL --}}
    @if(session('success'))

    <div
        class="alert alert-success alert-dismissible fade show"
        role="alert">
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>

    </div>

    @endif


    {{-- NOTIFIKASI ERROR --}}
    @if(session('error'))

    <div
        class="alert alert-danger alert-dismissible fade show"
        role="alert">
        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>

    </div>

    @endif
    {{-- HEADER --}}
    <div class="orders-header">

        <h2>
            Pesanan / Reservasi
        </h2>

        <p>
            Kelola semua reservasi pelanggan.
        </p>

    </div>


    {{-- CARD --}}
    <div class="orders-card">


        {{-- =====================================================
             DESKTOP / TABLET
        ====================================================== --}}

        <div class="desktop-orders">

            @if($reservations->count() > 0)

            <div class="table-wrapper">

                <table class="orders-table">

                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Kamar</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Tamu</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>


                    <tbody>

                        @foreach($reservations as $reservation)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- PELANGGAN --}}
                            <td>

                                <div class="customer-name">
                                    {{ $reservation->user->name ?? 'Tidak diketahui' }}
                                </div>

                                <div class="customer-phone">
                                    {{ $reservation->user->noWA ?? '-' }}
                                </div>

                            </td>


                            {{-- KAMAR --}}
                            <td>

                                @forelse($reservation->detailReservasi as $detail)

                                <span class="room-badge">
                                    {{ $detail->kamar->namaKamar ?? 'Kamar tidak ditemukan' }}
                                </span>

                                @empty

                                <span class="text-muted">
                                    -
                                </span>

                                @endforelse

                            </td>


                            {{-- CHECK IN --}}
                            <td>
                                {{ \Carbon\Carbon::parse($reservation->tglCekIn)->format('d M Y') }}
                            </td>


                            {{-- CHECK OUT --}}
                            <td>
                                {{ \Carbon\Carbon::parse($reservation->tglCekOut)->format('d M Y') }}
                            </td>


                            {{-- TAMU --}}
                            <td>
                                {{ $reservation->jumlahTamu }} orang
                            </td>


                            {{-- TOTAL --}}
                            <td>
                                Rp {{ number_format($reservation->hargaTotal, 0, ',', '.') }}
                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($reservation->statusReservasi == 'menunggu')

                                <span class="status-badge status-menunggu">
                                    Menunggu
                                </span>

                                @elseif($reservation->statusReservasi == 'dikonfirmasi')

                                <span class="status-badge status-dikonfirmasi">
                                    Dikonfirmasi
                                </span>

                                @elseif($reservation->statusReservasi == 'dibatalkan')

                                <span class="status-badge status-dibatalkan">
                                    Dibatalkan
                                </span>

                                @else

                                <span class="status-badge status-default">
                                    {{ ucfirst($reservation->statusReservasi) }}
                                </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="action-buttons">

                                    {{-- VIEW --}}
                                    <a
                                        href="{{ route('admin.orders.show', $reservation->idReservasi) }}"
                                        class="action-button action-view"
                                        title="Lihat Detail">

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="3" />

                                        </svg>

                                    </a>


                                    {{-- KONFIRMASI --}}
                                    @if($reservation->statusReservasi == 'menunggu')

                                    <form
                                        action="{{ route('admin.orders.confirm', $reservation->idReservasi) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="action-button action-confirm"
                                            title="Konfirmasi"
                                            onclick="return confirm('Konfirmasi pesanan ini?')">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>

                                        </button>

                                    </form>


                                    {{-- BATALKAN --}}
                                    <form
                                        action="{{ route('admin.orders.cancel', $reservation->idReservasi) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="action-button action-cancel"
                                            title="Batalkan"
                                            onclick="return confirm('Batalkan pesanan ini?')">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                        </button>

                                    </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="empty-orders">
                Belum ada pesanan.
            </div>

            @endif

        </div>



        {{-- =====================================================
             MOBILE
        ====================================================== --}}

        <div class="mobile-orders">

            @forelse($reservations as $reservation)

            <div class="mobile-order-card">


                {{-- HEADER CARD --}}
                <div class="mobile-order-header">

                    <div>

                        <div class="mobile-order-number">
                            Pesanan #{{ $loop->iteration }}
                        </div>

                        <div class="mobile-order-name">
                            {{ $reservation->user->name ?? 'Tidak diketahui' }}
                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div>

                        @if($reservation->statusReservasi == 'menunggu')

                        <span class="status-badge status-menunggu">
                            Menunggu
                        </span>

                        @elseif($reservation->statusReservasi == 'dikonfirmasi')

                        <span class="status-badge status-dikonfirmasi">
                            Dikonfirmasi
                        </span>

                        @elseif($reservation->statusReservasi == 'dibatalkan')

                        <span class="status-badge status-dibatalkan">
                            Dibatalkan
                        </span>

                        @else

                        <span class="status-badge status-default">
                            {{ ucfirst($reservation->statusReservasi) }}
                        </span>

                        @endif

                    </div>

                </div>


                {{-- INFO --}}
                <div class="mobile-order-info">

                    <div>

                        <span class="mobile-info-label">
                            No. WhatsApp
                        </span>

                        <span class="mobile-info-value">
                            {{ $reservation->user->noWA ?? '-' }}
                        </span>

                    </div>


                    <div>

                        <span class="mobile-info-label">
                            Kamar
                        </span>

                        <span class="mobile-info-value">

                            @foreach($reservation->detailReservasi as $detail)

                            {{ $detail->kamar->namaKamar ?? '-' }}

                            @if(!$loop->last)
                            ,
                            @endif

                            @endforeach

                        </span>

                    </div>


                    <div>

                        <span class="mobile-info-label">
                            Check In
                        </span>

                        <span class="mobile-info-value">
                            {{ \Carbon\Carbon::parse($reservation->tglCekIn)->format('d M Y') }}
                        </span>

                    </div>


                    <div>

                        <span class="mobile-info-label">
                            Check Out
                        </span>

                        <span class="mobile-info-value">
                            {{ \Carbon\Carbon::parse($reservation->tglCekOut)->format('d M Y') }}
                        </span>

                    </div>


                    <div>

                        <span class="mobile-info-label">
                            Jumlah Tamu
                        </span>

                        <span class="mobile-info-value">
                            {{ $reservation->jumlahTamu }} orang
                        </span>

                    </div>


                    <div>

                        <span class="mobile-info-label">
                            Pembayaran
                        </span>

                        <span class="mobile-info-value">
                            {{ $reservation->metodeByr }}
                        </span>

                    </div>

                </div>


                {{-- TOTAL --}}
                <div class="mobile-order-total">

                    <span>
                        Total
                    </span>

                    <strong>
                        Rp {{ number_format($reservation->hargaTotal, 0, ',', '.') }}
                    </strong>

                </div>


                {{-- ACTION --}}
                <div class="mobile-action-buttons">

                    {{-- VIEW --}}
                    <a
                        href="{{ route('admin.orders.show', $reservation->idReservasi) }}"
                        class="action-button action-view"
                        title="Lihat Detail">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                            <circle
                                cx="12"
                                cy="12"
                                r="3" />

                        </svg>

                    </a>


                    @if($reservation->statusReservasi == 'menunggu')

                    {{-- CONFIRM --}}
                    <form
                        action="{{ route('admin.orders.confirm', $reservation->idReservasi) }}"
                        method="POST"
                        style="flex: 1;">

                        @csrf

                        <button
                            type="submit"
                            class="action-button action-confirm"
                            style="width: 100%;"
                            title="Konfirmasi"
                            onclick="return confirm('Konfirmasi pesanan ini?')">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 13l4 4L19 7" />

                            </svg>

                        </button>

                    </form>


                    {{-- CANCEL --}}
                    <form
                        action="{{ route('admin.orders.cancel', $reservation->idReservasi) }}"
                        method="POST"
                        style="flex: 1;">

                        @csrf

                        <button
                            type="submit"
                            class="action-button action-cancel"
                            style="width: 100%;"
                            title="Batalkan"
                            onclick="return confirm('Batalkan pesanan ini?')">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />

                            </svg>

                        </button>

                    </form>

                    @endif

                </div>

            </div>

            @empty

            <div class="empty-orders">
                Belum ada pesanan.
            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection