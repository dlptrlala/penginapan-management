@extends('layouts.app')

@section('title', 'Pesan Kamar')

@section('content')

<div class="container py-5">

    {{-- Judul halaman --}}
    <div class="text-center mb-5">
        <h2>Pesan Kamar</h2>
        <p class="text-muted">
            Silakan lengkapi data pemesanan Anda.
        </p>
    </div>


    {{-- Pesan error dari controller --}}
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    {{-- Error validasi --}}
    @if($errors->any())
    <div class="alert alert-danger">

        <strong>Terdapat kesalahan:</strong>

        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <form
                        action="{{ route('reservasi.store') }}"
                        method="POST">

                        @csrf


                        {{-- ========================= --}}
                        {{-- DATA CUSTOMER --}}
                        {{-- ========================= --}}

                        <h5 class="mb-3">
                            Data Pemesan
                        </h5>


                        <div class="mb-3">

                            <label class="form-label">
                                Nama
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="{{ auth()->user()->name }}"
                                readonly>

                        </div>


                        <div class="mb-4">

                            <label class="form-label">
                                Nomor WhatsApp
                            </label>

                            <input
                                type="text"
                                name="noWA"
                                class="form-control"
                                value="{{ auth()->user()->noWA }}"
                                required>

                        </div>



                        {{-- ========================= --}}
                        {{-- DATA KAMAR --}}
                        {{-- ========================= --}}

                        <h5 class="mb-3">
                            Kamar
                        </h5>


                        <div class="card mb-4">

                            <div class="card-body">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        <h5>
                                            {{ $kamar->namaKamar }}
                                        </h5>

                                        <p class="text-muted mb-1">
                                            Lantai {{ $kamar->lantaiKamar }}
                                        </p>

                                        <p class="mb-0">
                                            Kapasitas:
                                            {{ $kamar->kapasitasKamar }}
                                            orang
                                        </p>

                                    </div>


                                    <div class="text-end">

                                        <small class="text-muted">
                                            Harga per malam
                                        </small>

                                        <h5>
                                            Rp
                                            {{ number_format($kamar->hargaKamar, 0, ',', '.') }}
                                        </h5>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ID KAMAR DIKIRIM KE CONTROLLER --}}
                        <input
                            type="hidden"
                            name="idKamar"
                            value="{{ $kamar->idKamar }}">



                        {{-- ========================= --}}
                        {{-- TANGGAL MENGINAP --}}
                        {{-- ========================= --}}

                        <h5 class="mb-3">
                            Detail Menginap
                        </h5>


                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Check-in
                                </label>

                                <input
                                    type="date"
                                    name="tglCekIn"
                                    id="tglCekIn"
                                    class="form-control"
                                    min="{{ date('Y-m-d') }}"
                                    value="{{ old('tglCekIn') }}"
                                    required>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Check-out
                                </label>

                                <input
                                    type="date"
                                    name="tglCekOut"
                                    id="tglCekOut"
                                    class="form-control"
                                    value="{{ old('tglCekOut') }}"
                                    required>

                            </div>

                        </div>
                        <div
                            id="availability-message"
                            style="display: none;"
                            class="mt-2"></div>


                        <div class="mb-4">

                            <label class="form-label">
                                Jumlah Tamu
                            </label>

                            <input
                                type="number"
                                name="jumlahTamu"
                                id="jumlahTamu"
                                class="form-control"
                                min="1"
                                max="{{ $kamar->kapasitasKamar }}"
                                value="{{ old('jumlahTamu', 1) }}"
                                required>

                            <small class="text-muted">
                                Maksimal
                                {{ $kamar->kapasitasKamar }}
                                orang.
                            </small>

                        </div>



                        {{-- ========================= --}}
                        {{-- RINGKASAN HARGA --}}
                        {{-- ========================= --}}

                        <div class="card bg-light mb-4">

                            <div class="card-body">

                                <h5>
                                    Ringkasan Harga
                                </h5>

                                <div class="d-flex justify-content-between">

                                    <span>
                                        Harga kamar / malam
                                    </span>

                                    <span>
                                        Rp
                                        {{ number_format($kamar->hargaKamar, 0, ',', '.') }}
                                    </span>

                                </div>


                                <div class="d-flex justify-content-between">

                                    <span>
                                        Jumlah malam
                                    </span>

                                    <span id="jumlahMalam">
                                        0 malam
                                    </span>

                                </div>


                                <hr>


                                <div class="d-flex justify-content-between">

                                    <strong>
                                        Total
                                    </strong>

                                    <strong id="totalHarga">
                                        Rp 0
                                    </strong>

                                </div>

                            </div>

                        </div>



                        {{-- ========================= --}}
                        {{-- METODE PEMBAYARAN --}}
                        {{-- ========================= --}}

                        <h5 class="mb-3">
                            Pembayaran
                        </h5>


                        <div class="mb-4">

                            <label class="form-label">
                                Metode Pembayaran
                            </label>

                            <select
                                name="metodeByr"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih metode pembayaran --
                                </option>

                                <option
                                    value="Transfer Bank"
                                    {{ old('metodeByr') == 'Transfer Bank' ? 'selected' : '' }}>
                                    Transfer Bank
                                </option>

                                <option
                                    value="QRIS"
                                    {{ old('metodeByr') == 'QRIS' ? 'selected' : '' }}>
                                    QRIS
                                </option>

                                <option
                                    value="Cash"
                                    {{ old('metodeByr') == 'Cash' ? 'selected' : '' }}>
                                    Cash
                                </option>

                            </select>

                        </div>



                        {{-- ========================= --}}
                        {{-- TOMBOL --}}
                        {{-- ========================= --}}

                        <div class="d-flex justify-content-between">

                            <a
                                href="{{ route('rooms.view') }}"
                                class="btn btn-secondary">
                                Kembali
                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary">
                                Pesan Sekarang
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- POPUP KAMAR TIDAK TERSEDIA -->

<div
    id="availability-modal"
    class="availability-modal"
    style="display: none;">

    <div class="availability-modal-overlay"></div>

    <div class="availability-modal-content">

        <div class="availability-icon">
            ⚠️
        </div>

        <h3>
            Kamar Tidak Tersedia
        </h3>

        <p>
            {{ $kamar->namaKamar }} sudah dibooking
            pada tanggal yang kamu pilih.
        </p>

        <p>
            Silakan pilih tanggal lain atau kamar lain.
        </p>

        <button
            type="button"
            id="close-availability-modal"
            class="btn btn-primary">
            Pilih Lagi
        </button>

    </div>

</div>

{{-- ========================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | ELEMENT
    |--------------------------------------------------------------------------
    */

    const form =
        document.querySelector('form');

    const checkIn =
        document.getElementById('tglCekIn');

    const checkOut =
        document.getElementById('tglCekOut');

    const jumlahMalam =
        document.getElementById('jumlahMalam');

    const totalHarga =
        document.getElementById('totalHarga');

    const availabilityMessage =
        document.getElementById('availability-message');


    /*
    |--------------------------------------------------------------------------
    | POPUP
    |--------------------------------------------------------------------------
    */

    const availabilityModal =
        document.getElementById('availability-modal');

    const closeAvailabilityModal =
        document.getElementById('close-availability-modal');

    const modalOverlay =
        document.querySelector(
            '.availability-modal-overlay'
        );


    /*
    |--------------------------------------------------------------------------
    | DATA KAMAR DARI LARAVEL
    |--------------------------------------------------------------------------
    */

    const idKamar =
        {{ $kamar->idKamar }};

    const hargaPerMalam =
        {{ $kamar->hargaKamar }};


    /*
    |--------------------------------------------------------------------------
    | STATUS KAMAR
    |--------------------------------------------------------------------------
    |
    | true  = kamar tersedia
    | false = kamar tidak tersedia
    |
    */

    let kamarTersedia = true;


    /*
    |--------------------------------------------------------------------------
    | HITUNG HARGA
    |--------------------------------------------------------------------------
    */

    function hitungHarga() {

        if (
            !checkIn.value ||
            !checkOut.value
        ) {

            jumlahMalam.textContent =
                '0 malam';

            totalHarga.textContent =
                'Rp 0';

            return;

        }


        const tanggalMasuk =
            new Date(checkIn.value);

        const tanggalKeluar =
            new Date(checkOut.value);


        const selisih =
            tanggalKeluar - tanggalMasuk;


        const malam =
            selisih /
            (1000 * 60 * 60 * 24);


        if (malam <= 0) {

            jumlahMalam.textContent =
                '0 malam';

            totalHarga.textContent =
                'Rp 0';

            return;

        }


        const total =
            malam * hargaPerMalam;


        jumlahMalam.textContent =
            malam + ' malam';


        totalHarga.textContent =
            'Rp ' +
            total.toLocaleString('id-ID');

    }


    /*
    |--------------------------------------------------------------------------
    | CEK KETERSEDIAAN KE DATABASE
    |--------------------------------------------------------------------------
    */

    async function checkRoomAvailability() {

        /*
        |--------------------------------------------------------------------------
        | Kalau belum memilih kedua tanggal
        |--------------------------------------------------------------------------
        */

        if (
            !checkIn.value ||
            !checkOut.value
        ) {

            kamarTersedia = true;

            availabilityMessage.style.display =
                'none';

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | Check-out harus setelah check-in
        |--------------------------------------------------------------------------
        */

        if (
            checkOut.value <= checkIn.value
        ) {

            kamarTersedia = false;

            availabilityMessage.style.display =
                'none';

            availabilityModal.style.display =
                'block';

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN LOADING
        |--------------------------------------------------------------------------
        */

        availabilityMessage.style.display =
            'block';

        availabilityMessage.innerHTML = `
            <div class="alert alert-secondary">
                🔍 Mengecek ketersediaan kamar...
            </div>
        `;


        /*
        |--------------------------------------------------------------------------
        | URL REQUEST
        |--------------------------------------------------------------------------
        */

        const url =
            "{{ route('reservasi.checkAvailability') }}" +
            "?idKamar=" +
            encodeURIComponent(idKamar) +
            "&tglCekIn=" +
            encodeURIComponent(checkIn.value) +
            "&tglCekOut=" +
            encodeURIComponent(checkOut.value);


        try {

            const response =
                await fetch(url);


            /*
            |--------------------------------------------------------------------------
            | Kalau server error
            |--------------------------------------------------------------------------
            */

            if (!response.ok) {

                throw new Error(
                    'Gagal menghubungi server.'
                );

            }


            const data =
                await response.json();


            /*
            |--------------------------------------------------------------------------
            | KAMAR TIDAK TERSEDIA
            |--------------------------------------------------------------------------
            */

            if (!data.tersedia) {

                kamarTersedia = false;


                availabilityMessage.style.display =
                    'block';


                availabilityMessage.innerHTML = `
                    <div class="alert alert-danger">
                        ❌ Kamar tidak tersedia pada tanggal yang dipilih.
                    </div>
                `;


                /*
                |--------------------------------------------------------------------------
                | LANGSUNG MUNCUL POPUP
                |--------------------------------------------------------------------------
                */

                availabilityModal.style.display =
                    'block';


                return;

            }


            /*
            |--------------------------------------------------------------------------
            | KAMAR TERSEDIA
            |--------------------------------------------------------------------------
            */

            kamarTersedia = true;


            availabilityMessage.style.display =
                'block';


            availabilityMessage.innerHTML = `
                <div class="alert alert-success">
                    ✓ Kamar tersedia pada tanggal yang dipilih.
                </div>
            `;


        } catch (error) {

            console.error(error);


            kamarTersedia = false;


            availabilityMessage.style.display =
                'block';


            availabilityMessage.innerHTML = `
                <div class="alert alert-warning">
                    ⚠️ Tidak dapat mengecek ketersediaan kamar.
                    Silakan coba lagi.
                </div>
            `;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | KETIKA CHECK-IN DIPILIH
    |--------------------------------------------------------------------------
    */

    checkIn.addEventListener(
        'change',
        function () {

            hitungHarga();

            /*
            | Kalau check-out sudah dipilih,
            | langsung cek juga.
            */

            if (checkOut.value) {

                checkRoomAvailability();

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | KETIKA CHECK-OUT DIPILIH
    |--------------------------------------------------------------------------
    |
    | INI YANG KAMU MAU.
    |
    | Begitu customer selesai memilih check-out,
    | langsung cek database.
    |--------------------------------------------------------------------------
    */

    checkOut.addEventListener(
        'change',
        function () {

            hitungHarga();

            checkRoomAvailability();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | TUTUP POPUP
    |--------------------------------------------------------------------------
    */

    closeAvailabilityModal.addEventListener(
        'click',
        function () {

            availabilityModal.style.display =
                'none';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | KLIK AREA LUAR POPUP
    |--------------------------------------------------------------------------
    */

    modalOverlay.addEventListener(
        'click',
        function () {

            availabilityModal.style.display =
                'none';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | SAAT SUBMIT
    |--------------------------------------------------------------------------
    |
    | Ini tetap kita pertahankan sebagai pengaman.
    | BUKAN popup utama.
    |--------------------------------------------------------------------------
    */

    form.addEventListener(
        'submit',
        async function (event) {

            /*
            | Kalau tanggal belum lengkap,
            | biarkan validasi HTML bekerja.
            */

            if (
                !checkIn.value ||
                !checkOut.value
            ) {

                return;

            }


            /*
            | Kalau sebelumnya sudah diketahui bentrok,
            | jangan submit.
            */

            if (!kamarTersedia) {

                event.preventDefault();

                availabilityModal.style.display =
                    'block';

                return;

            }

        }
    );

});

</script>

@endsection