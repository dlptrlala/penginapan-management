<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\DetailReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    // =========================
    // DASHBOARD
    // =========================

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // =========================
    // PESANAN
    // =========================

    public function orders()
    {
        $reservations = Reservasi::with([
            'user',
            'detailReservasi.kamar'
        ])
            ->orderBy('tglReservasi', 'desc')
            ->get();

        return view('admin.orders', compact('reservations'));
    }


    // =========================
    // DETAIL PESANAN
    // =========================

    public function showOrder($idReservasi)
    {
        $reservation = Reservasi::with([
            'user',
            'detailReservasi.kamar'
        ])->findOrFail($idReservasi);

        return view(
            'admin.orderDetail',
            compact('reservation')
        );
    }


    // =========================
    // KONFIRMASI PESANAN
    // =========================

    public function confirmOrder($idReservasi)
    {
        $reservation = Reservasi::with([
            'detailReservasi'
        ])->findOrFail($idReservasi);


        // -----------------------------------------
        // Pastikan hanya pesanan MENUNGGU
        // yang bisa dikonfirmasi
        // -----------------------------------------

        if ($reservation->statusReservasi !== 'menunggu') {

            return redirect()
                ->route('admin.orders')
                ->with(
                    'error',
                    'Pesanan ini tidak dapat dikonfirmasi.'
                );
        }


        // -----------------------------------------
        // CARI PESANAN LAIN YANG AKTIF
        // -----------------------------------------

        $pesananAktif = Reservasi::whereIn(
            'statusReservasi',
            [
                'menunggu',
                'dikonfirmasi'
            ]
        )
            ->where(
                'idReservasi',
                '!=',
                $reservation->idReservasi
            )
            ->where(
                'tglCekIn',
                '<',
                $reservation->tglCekOut
            )
            ->where(
                'tglCekOut',
                '>',
                $reservation->tglCekIn
            );


        // -----------------------------------------
        // JIKA BOOKING FULL HOUSE
        // -----------------------------------------

        if ($reservation->tipeReservasi === 'full_house') {

            $bentrok = $pesananAktif->exists();


            if ($bentrok) {

                return redirect()
                    ->route('admin.orders')
                    ->with(
                        'error',
                        'Pesanan Full House tidak dapat dikonfirmasi karena terdapat pesanan lain pada tanggal tersebut.'
                    );
            }
        }


        // -----------------------------------------
        // JIKA BOOKING KAMAR
        // -----------------------------------------

        else {

            $idKamar = $reservation
                ->detailReservasi
                ->pluck('idKamar')
                ->toArray();


            // Cek apakah ada Full House
            // pada tanggal yang sama

            $bentrokFullHouse = (clone $pesananAktif)
                ->where(
                    'tipeReservasi',
                    'full_house'
                )
                ->exists();


            if ($bentrokFullHouse) {

                return redirect()
                    ->route('admin.orders')
                    ->with(
                        'error',
                        'Pesanan tidak dapat dikonfirmasi karena terdapat booking Full House pada tanggal tersebut.'
                    );
            }


            // -----------------------------------------
            // Cek kamar yang sama
            // -----------------------------------------

            $bentrokKamar = DetailReservasi::whereIn(
                'idKamar',
                $idKamar
            )
                ->whereHas(
                    'reservasi',
                    function ($query) use ($reservation) {

                        $query
                            ->whereIn(
                                'statusReservasi',
                                [
                                    'menunggu',
                                    'dikonfirmasi'
                                ]
                            )
                            ->where(
                                'idReservasi',
                                '!=',
                                $reservation->idReservasi
                            )
                            ->where(
                                'tglCekIn',
                                '<',
                                $reservation->tglCekOut
                            )
                            ->where(
                                'tglCekOut',
                                '>',
                                $reservation->tglCekIn
                            );
                    }
                )
                ->exists();


            if ($bentrokKamar) {

                return redirect()
                    ->route('admin.orders')
                    ->with(
                        'error',
                        'Pesanan tidak dapat dikonfirmasi karena kamar yang dipilih sudah dibooking pada tanggal tersebut.'
                    );
            }
        }


        // -----------------------------------------
        // JIKA AMAN → KONFIRMASI
        // -----------------------------------------

        $reservation->update([
            'statusReservasi' => 'dikonfirmasi'
        ]);


        return redirect()
            ->route('admin.orders')
            ->with(
                'success',
                'Pesanan berhasil dikonfirmasi.'
            );
    }


    // =========================
    // BATALKAN PESANAN
    // =========================

    public function cancelOrder($idReservasi)
    {
        $reservation = Reservasi::findOrFail($idReservasi);


        if (
            !in_array(
                $reservation->statusReservasi,
                [
                    'menunggu',
                    'dikonfirmasi'
                ]
            )
        ) {

            return redirect()
                ->route('admin.orders')
                ->with(
                    'error',
                    'Pesanan ini sudah tidak dapat dibatalkan.'
                );
        }


        $reservation->update([
            'statusReservasi' => 'dibatalkan'
        ]);


        return redirect()
            ->route('admin.orders')
            ->with(
                'success',
                'Pesanan berhasil dibatalkan.'
            );
    }

    // =========================
    // KALENDER BOOKING ADMIN
    // =========================

    public function bookingCalendar()
    {
        return view('admin.bookingCalendar');
    }


    public function bookingCalendarData()
    {
        $reservations = Reservasi::with([
            'user',
            'detailReservasi.kamar'
        ])
            ->whereIn('statusReservasi', [
                'menunggu',
                'dikonfirmasi'
            ])
            ->get();

        $events = [];

        foreach ($reservations as $reservation) {

            $checkIn = \Carbon\Carbon::parse(
                $reservation->tglCekIn
            );

            $checkOut = \Carbon\Carbon::parse(
                $reservation->tglCekOut
            );


            /*
        ==========================================
        SETIAP HARI BOOKING
        ==========================================
        */

            for (
                $date = $checkIn->copy();
                $date->lt($checkOut);
                $date->addDay()
            ) {

                /*
            ======================================
            FULL HOUSE
            ======================================
            */

                if ($reservation->tipeReservasi === 'full_house') {

                    $events[] = [

                        'title' => 'Full House',

                        'start' => $date->format('Y-m-d'),

                        'allDay' => true,

                        'extendedProps' => [

                            'idReservasi' =>
                            $reservation->idReservasi,

                            'namaUser' =>
                            $reservation->user->name ?? '-',

                            'noWA' =>
                            $reservation->user->noWA ?? '-',

                            'namaKamar' =>
                            'Seluruh Rumah',

                            'status' =>
                            $reservation->statusReservasi,

                            'tglCekIn' =>
                            $reservation->tglCekIn,

                            'tglCekOut' =>
                            $reservation->tglCekOut,

                        ]

                    ];
                }


                /*
            ======================================
            BOOKING KAMAR
            ======================================
            */ else {

                    foreach (
                        $reservation->detailReservasi
                        as $detail
                    ) {

                        if (!$detail->kamar) {
                            continue;
                        }


                        $events[] = [

                            'title' =>
                            $detail->kamar->namaKamar,

                            'start' =>
                            $date->format('Y-m-d'),

                            'allDay' => true,

                            'extendedProps' => [

                                'idReservasi' =>
                                $reservation->idReservasi,

                                'namaUser' =>
                                $reservation->user->name ?? '-',

                                'noWA' =>
                                $reservation->user->noWA ?? '-',

                                'namaKamar' =>
                                $detail->kamar->namaKamar,

                                'status' =>
                                $reservation->statusReservasi,

                                'tglCekIn' =>
                                $reservation->tglCekIn,

                                'tglCekOut' =>
                                $reservation->tglCekOut,

                            ]

                        ];
                    }
                }
            }
        }


        return response()->json($events);
    }


    // =========================
    // ULASAN
    // =========================

    public function reviews()
    {
        return view('admin.reviews');
    }


    // =========================
    // LAPORAN
    // =========================

    public function laporan()
    {
        return view('admin.laporan');
    }
}
