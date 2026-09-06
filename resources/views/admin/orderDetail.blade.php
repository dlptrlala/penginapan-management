@extends('layouts.sidebar')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Pesanan
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap reservasi pelanggan.
            </p>
        </div>

        <a href="{{ route('admin.orders') }}"
           class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>

    </div>


    {{-- INFORMASI PELANGGAN --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Informasi Pelanggan
            </h5>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <small class="text-muted">
                        Nama
                    </small>

                    <div class="fw-semibold">
                        {{ $reservation->user->name ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <small class="text-muted">
                        Nomor WhatsApp
                    </small>

                    <div class="fw-semibold">
                        {{ $reservation->user->noWA ?? '-' }}
                    </div>
                </div>

            </div>

        </div>

    </div>


    {{-- INFORMASI RESERVASI --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Informasi Reservasi
            </h5>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <small class="text-muted">
                        Check In
                    </small>

                    <div class="fw-semibold">
                        {{ \Carbon\Carbon::parse($reservation->tglCekIn)->format('d M Y') }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <small class="text-muted">
                        Check Out
                    </small>

                    <div class="fw-semibold">
                        {{ \Carbon\Carbon::parse($reservation->tglCekOut)->format('d M Y') }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <small class="text-muted">
                        Jumlah Tamu
                    </small>

                    <div class="fw-semibold">
                        {{ $reservation->jumlahTamu }} orang
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <small class="text-muted">
                        Metode Pembayaran
                    </small>

                    <div class="fw-semibold">
                        {{ $reservation->metodeByr }}
                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <small class="text-muted">
                        Status
                    </small>

                    <div>

                        @if($reservation->statusReservasi == 'menunggu')

                            <span class="badge bg-warning text-dark">
                                Menunggu
                            </span>

                        @elseif($reservation->statusReservasi == 'dikonfirmasi')

                            <span class="badge bg-success">
                                Dikonfirmasi
                            </span>

                        @elseif($reservation->statusReservasi == 'dibatalkan')

                            <span class="badge bg-danger">
                                Dibatalkan
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- KAMAR --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h5 class="fw-bold mb-3">
                Kamar yang Dipesan
            </h5>

            @forelse($reservation->detailReservasi as $detail)

                <div class="border rounded p-3 mb-2">

                    <div class="fw-semibold">
                        {{ $detail->kamar->namaKamar ?? 'Kamar tidak ditemukan' }}
                    </div>

                    <small class="text-muted">
                        Rp {{ number_format($detail->hargaKamar, 0, ',', '.') }}
                        / malam
                    </small>

                </div>

            @empty

                <p class="text-muted">
                    Tidak ada kamar.
                </p>

            @endforelse

        </div>

    </div>


    {{-- TOTAL --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="fw-bold mb-0">
                    Total Pembayaran
                </h5>

                <h4 class="fw-bold mb-0">
                    Rp {{ number_format($reservation->hargaTotal, 0, ',', '.') }}
                </h4>

            </div>

        </div>

    </div>

</div>

@endsection