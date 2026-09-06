@extends('layouts.app')

@section('title', 'Lihat Jadwal')

@section('content')

<style>
    .calendar-page {
        max-width: 1250px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .calendar-title {
        text-align: center;
        font-size: 38px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .calendar-subtitle {
        text-align: center;
        color: #6b7280;
        margin-bottom: 30px;
        font-size: 16px;
    }

    .calendar-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 28px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
    }

    /* =========================
       FULLCALENDAR
    ========================= */

    #calendar {
        width: 100%;
    }

    .fc {
        font-family: inherit;
    }

    .fc-toolbar-title {
        font-size: 28px !important;
        font-weight: 700;
        color: #1f2937;
    }

    .fc-button {
        background-color: #263b4d !important;
        border: none !important;
        border-radius: 6px !important;
        padding: 8px 14px !important;
        font-weight: 600 !important;
    }

    .fc-button:hover {
        background-color: #1d2e3d !important;
    }

    .fc-button-primary:disabled {
        background-color: #9ca3af !important;
    }

    .fc-daygrid-day-number {
        color: #1677ff;
        font-weight: 600;
        text-decoration: underline;
    }

    .fc-col-header-cell-cushion {
        color: #1677ff;
        font-weight: 700;
        text-decoration: underline;
    }

    .fc-day-today {
        background-color: #fff9dc !important;
    }

    /* =========================
       EVENT BOOKING
    ========================= */

    .fc-event {
        border: none !important;
        border-radius: 7px !important;
        padding: 5px 7px !important;
        margin: 3px 5px !important;

        background-color: #ffe3e6 !important;
        color: #a61b2b !important;

        font-size: 13px !important;
        font-weight: 600 !important;

        cursor: pointer;
    }

    .fc-event:hover {
        background-color: #ffd2d7 !important;
    }

    .event-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 5px;
        width: 100%;
    }

    .event-room {
        display: flex;
        align-items: center;
        gap: 5px;
        overflow: hidden;
    }

    .event-icon {
        font-size: 13px;
        flex-shrink: 0;
    }

    .event-room-name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .event-status {
        font-size: 14px;
        flex-shrink: 0;
    }


    /* =========================
       LEGEND
    ========================= */

    .calendar-legend {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 25px;

        margin: 22px auto 0;

        padding: 12px 20px;

        width: fit-content;

        background: #ffffff;

        border-radius: 12px;

        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;

        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .legend-dot {
        width: 14px;
        height: 14px;

        border-radius: 50%;

        display: inline-block;
    }

    .legend-available {
        background-color: #22c55e;
    }

    .legend-booked {
        background-color: #ff6b78;
    }

    .legend-maintenance {
        background-color: #fbbf24;
    }


    /* =========================
       BOOKING INFO
    ========================= */

    .booking-info {
        margin-top: 25px;

        background: #eef7ff;

        border: 1px solid #cfe8ff;

        border-radius: 14px;

        padding: 22px 25px;
    }

    .booking-info-header {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
    }

    .booking-info-icon {
        width: 45px;
        height: 45px;

        border-radius: 50%;

        background: #dceeff;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }

    .booking-info h3 {
        margin: 0;
        color: #123d67;
        font-size: 21px;
        font-weight: 700;
    }

    .booking-info p {
        margin: 3px 0 0;
        color: #5f7183;
    }

    .booking-list {
        margin-left: 60px;
    }

    .booking-room {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 12px 16px;

        margin-bottom: 8px;

        background: #ffe3e6;

        border: 1px solid #ffc7ce;

        border-radius: 9px;

        color: #8f1727;

        font-weight: 600;
    }

    .booking-room-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .booking-room-right {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .status-icon {
        font-size: 18px;
    }


    /* =========================
       AVAILABLE INFO
    ========================= */

    .available-message {
        margin-left: 60px;

        padding: 13px 16px;

        background: #e5f8eb;

        border: 1px solid #bce8c9;

        border-radius: 9px;

        color: #18743a;

        font-weight: 600;
    }


    /* =========================
       TIPS
    ========================= */

    .calendar-bottom {
        display: grid;

        grid-template-columns: 2fr 1fr;

        gap: 20px;

        margin-top: 20px;
    }

    .tips-box {
        background: #ffffff;

        border: 1px solid #e5e7eb;

        border-radius: 14px;

        padding: 20px;
    }

    .tips-title {
        display: flex;
        align-items: center;
        gap: 10px;

        font-size: 18px;
        font-weight: 700;

        color: #1f2937;

        margin-bottom: 8px;
    }

    .tips-icon {
        font-size: 22px;
    }

    .tips-box p {
        color: #6b7280;
        margin: 0;
        line-height: 1.6;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .calendar-page {
            margin: 20px auto;
            padding: 0 10px;
        }

        .calendar-card {
            padding: 12px;
        }

        .calendar-title {
            font-size: 28px;
        }

        .fc-toolbar {
            flex-direction: column;
            gap: 10px;
        }

        .fc-toolbar-title {
            font-size: 22px !important;
        }

        .calendar-legend {
            flex-direction: column;
            gap: 10px;
        }

        .calendar-bottom {
            grid-template-columns: 1fr;
        }

        .booking-list {
            margin-left: 0;
        }

        .available-message {
            margin-left: 0;
        }
    }
</style>


<div class="calendar-page">

    {{-- =========================
         JUDUL
    ========================= --}}

    <h1 class="calendar-title">
        Jadwal Ketersediaan Kamar
    </h1>

    <p class="calendar-subtitle">
        Lihat tanggal kamar yang sudah dibooking sebelum melakukan reservasi.
    </p>


    <div class="calendar-card">

        {{-- =========================
             CALENDAR
        ========================= --}}

        <div id="calendar"></div>


        {{-- =========================
             LEGEND
        ========================= --}}

        <div class="calendar-legend">

            <div class="legend-item">

                <span class="legend-dot legend-available"></span>

                Tersedia

            </div>


            <div class="legend-item">

                <span class="legend-dot legend-booked"></span>

                Sudah Dibooking

            </div>


            <div class="legend-item">

                <span class="legend-dot legend-maintenance"></span>

                Dalam Perbaikan

            </div>

        </div>


        {{-- =========================
             INFORMASI TANGGAL
        ========================= --}}

        <div
            class="booking-info"
            id="booking-info"
            style="display: none;"
        >

            <div class="booking-info-header">

                <div class="booking-info-icon">
                    📅
                </div>

                <div>

                    <h3 id="selected-date">
                        Jadwal
                    </h3>

                    <p id="booking-description">
                        Berikut kamar yang sudah dibooking pada tanggal ini:
                    </p>

                </div>

            </div>


            <div
                class="booking-list"
                id="booking-list"
            >
            </div>

        </div>

    </div>

</div>



{{-- =========================
     FULLCALENDAR
========================= --}}

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const calendarEl =
        document.getElementById('calendar');

    const bookingInfoEl =
        document.getElementById('booking-info');

    const bookingListEl =
        document.getElementById('booking-list');

    const selectedDateEl =
        document.getElementById('selected-date');

    const bookingDescriptionEl =
        document.getElementById('booking-description');


    /*
    |--------------------------------------------------------------------------
    | FORMAT TANGGAL INDONESIA
    |--------------------------------------------------------------------------
    */

    function formatDate(dateString) {

        const date =
            new Date(dateString + 'T00:00:00');

        return date.toLocaleDateString(
            'id-ID',
            {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FULLCALENDAR
    |--------------------------------------------------------------------------
    */

    const calendar =
        new FullCalendar.Calendar(
            calendarEl,
            {

                initialView: 'dayGridMonth',

                locale: 'id',

                height: 'auto',


                /*
                |--------------------------------------------------------------------------
                | Header
                |--------------------------------------------------------------------------
                */

                headerToolbar: {

                    left: 'prev,next today',

                    center: 'title',

                    right: 'dayGridMonth'

                },


                /*
                |--------------------------------------------------------------------------
                | Nama tombol
                |--------------------------------------------------------------------------
                */

                buttonText: {

                    today: 'Hari ini',

                    month: 'Bulan'

                },


                /*
                |--------------------------------------------------------------------------
                | Ambil booking dari database
                |--------------------------------------------------------------------------
                */

                events: "{{ route('booking.calendar') }}",


                /*
                |--------------------------------------------------------------------------
                | Custom tampilan event
                |--------------------------------------------------------------------------
                */

                eventContent: function(arg) {

                    const roomName =
                        arg.event.extendedProps.namaKamar ||
                        arg.event.title;


                    const wrapper =
                        document.createElement('div');

                    wrapper.className =
                        'event-content';


                    const room =
                        document.createElement('div');

                    room.className =
                        'event-room';


                    const icon =
                        document.createElement('span');

                    icon.className =
                        'event-icon';

                    icon.textContent =
                        '🛏️';


                    const name =
                        document.createElement('span');

                    name.className =
                        'event-room-name';

                    name.textContent =
                        roomName;


                    const status =
                        document.createElement('span');

                    status.className =
                        'event-status';

                    status.textContent =
                        '⊘';


                    room.appendChild(icon);

                    room.appendChild(name);


                    wrapper.appendChild(room);

                    wrapper.appendChild(status);


                    return {
                        domNodes: [wrapper]
                    };

                },


                /*
                |--------------------------------------------------------------------------
                | Klik tanggal
                |--------------------------------------------------------------------------
                */

                dateClick: function(info) {

                    const allEvents =
                        calendar.getEvents();


                    /*
                    |--------------------------------------------------------------------------
                    | Cari booking pada tanggal yang dipilih
                    |--------------------------------------------------------------------------
                    */

                    const selectedBookings =
                        allEvents.filter(function(event) {

                            return event.startStr.substring(0, 10)
                                === info.dateStr;

                        });


                    /*
                    |--------------------------------------------------------------------------
                    | Tampilkan tanggal
                    |--------------------------------------------------------------------------
                    */

                    selectedDateEl.textContent =
                        'Jadwal pada ' +
                        formatDate(info.dateStr);


                    bookingListEl.innerHTML = '';


                    /*
                    |--------------------------------------------------------------------------
                    | Kalau tidak ada booking
                    |--------------------------------------------------------------------------
                    */

                    if (selectedBookings.length === 0) {

                        bookingDescriptionEl.textContent =
                            'Tidak ada kamar yang dibooking pada tanggal ini.';


                        bookingListEl.innerHTML = `
                            <div class="available-message">
                                ✓ Semua kamar tersedia pada tanggal ini.
                            </div>
                        `;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Kalau ada booking
                    |--------------------------------------------------------------------------
                    */

                    else {

                        bookingDescriptionEl.textContent =
                            'Berikut kamar yang sudah dibooking pada tanggal ini:';


                        /*
                        |--------------------------------------------------------------------------
                        | Hindari kamar yang sama muncul dua kali
                        |--------------------------------------------------------------------------
                        */

                        const roomNames = [];


                        selectedBookings.forEach(function(event) {

                            const roomName =
                                event.extendedProps.namaKamar ||
                                event.event?.title ||
                                event.title;


                            if (!roomNames.includes(roomName)) {

                                roomNames.push(roomName);


                                const roomElement =
                                    document.createElement('div');

                                roomElement.className =
                                    'booking-room';


                                roomElement.innerHTML = `

                                    <div class="booking-room-left">

                                        <span class="status-icon">
                                            🛏️
                                        </span>

                                        <span>
                                            ${roomName}
                                        </span>

                                    </div>


                                    <div class="booking-room-right">

                                        <span>
                                            Dibooking
                                        </span>

                                        <span class="status-icon">
                                            ⊘
                                        </span>

                                    </div>

                                `;


                                bookingListEl.appendChild(
                                    roomElement
                                );

                            }

                        });

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Tampilkan panel
                    |--------------------------------------------------------------------------
                    */

                    bookingInfoEl.style.display =
                        'block';


                    /*
                    |--------------------------------------------------------------------------
                    | Scroll ke panel
                    |--------------------------------------------------------------------------
                    */

                    bookingInfoEl.scrollIntoView({

                        behavior: 'smooth',

                        block: 'nearest'

                    });

                }

            }
        );


    calendar.render();

});

</script>

@endsection