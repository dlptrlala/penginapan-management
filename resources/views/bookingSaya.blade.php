@extends('layouts.app')

@section('title', 'Booking Saya')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Booking Saya
    </h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    @if($reservations->isEmpty())

    <div class="alert alert-info">
        Kamu belum memiliki booking.
    </div>

    @else

    @foreach($reservations as $reservation)

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>

                    <h5 class="mb-1">
                        Booking #{{ $reservation->idReservasi }}
                    </h5>

                    <small class="text-muted">
                        Dipesan pada
                        {{ \Carbon\Carbon::parse($reservation->tglReservasi)->format('d M Y H:i') }}
                    </small>

                </div>


                {{-- STATUS --}}
                @if($reservation->statusReservasi == 'menunggu')

                <span class="badge bg-warning text-dark">
                    Menunggu Konfirmasi
                </span>

                @elseif($reservation->statusReservasi == 'dikonfirmasi')

                <span class="badge bg-success">
                    Dikonfirmasi
                </span>

                @elseif($reservation->statusReservasi == 'selesai')

                <span class="badge bg-primary">
                    Selesai
                </span>

                @elseif($reservation->statusReservasi == 'dibatalkan')

                <span class="badge bg-danger">
                    Dibatalkan
                </span>

                @else

                <span class="badge bg-secondary">
                    {{ ucfirst($reservation->statusReservasi) }}
                </span>

                @endif

            </div>


            <hr>


            {{-- TANGGAL --}}
            <div class="row mb-3">

                <div class="col-md-4">

                    <strong>Check-in</strong>

                    <p class="mb-0">
                        {{ \Carbon\Carbon::parse($reservation->tglCekIn)->format('d M Y') }}
                    </p>

                </div>


                <div class="col-md-4">

                    <strong>Check-out</strong>

                    <p class="mb-0">
                        {{ \Carbon\Carbon::parse($reservation->tglCekOut)->format('d M Y') }}
                    </p>

                </div>


                <div class="col-md-4">

                    <strong>Jumlah Tamu</strong>

                    <p class="mb-0">
                        {{ $reservation->jumlahTamu }} orang
                    </p>

                </div>

            </div>


            {{-- KAMAR --}}
            <h6 class="mt-4">
                Kamar
            </h6>

            @foreach($reservation->detailReservasi as $detail)

            <div class="d-flex justify-content-between">

                <span>
                    {{ $detail->kamar->namaKamar }}
                </span>

                <span>
                    Rp
                    {{ number_format($detail->hargaKamar, 0, ',', '.') }}
                    / malam
                </span>

            </div>

            @endforeach


            <hr>


            {{-- TOTAL --}}
            <div class="d-flex justify-content-between">

                <strong>
                    Total
                </strong>

                <strong>
                    Rp
                    {{ number_format($reservation->hargaTotal, 0, ',', '.') }}
                </strong>

            </div>


            <div class="mt-2">

                <small class="text-muted">
                    Pembayaran:
                    {{ $reservation->metodeByr }}
                </small>

            </div>

        </div>

    </div>

    @endforeach

    @endif

</div>

@endsection