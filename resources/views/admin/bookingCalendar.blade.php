@extends('layouts.sidebar')

@section('title', 'Kalender Booking')

@section('content')

<style>
    /* ==============================
       HEADER
    ============================== */

    .calendar-header {
        margin-bottom: 25px;
    }

    .calendar-header h2 {
        font-size: 36px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .calendar-header p {
        color: #6c757d;
        margin: 0;
    }


    /* ==============================
       CALENDAR CARD
    ============================== */

    .calendar-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }


    /* ==============================
       FULLCALENDAR
    ============================== */

    #bookingCalendar {
        width: 100%;
    }


    /* ==============================
       EVENT
    ============================== */

    .calendar-event {
        width: 100%;
        padding: 3px 5px;
        border-radius: 4px;

        font-size: 12px;
        font-weight: 600;

        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }


    .calendar-event.menunggu {
        background-color: #ffc107;
        color: #171717;
    }


    .calendar-event.dikonfirmasi {
        background-color: #198754;
        color: white;
    }


    .calendar-event.full-house {
        background-color: #6f42c1;
        color: white;
    }


    /* ==============================
       LEGEND
    ============================== */

    .calendar-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;

        margin-top: 20px;
        padding-top: 15px;

        border-top: 1px solid #e5e7eb;
    }


    .legend-item {
        display: flex;
        align-items: center;
        gap: 7px;

        font-size: 14px;
        color: #495057;
    }


    .legend-box {
        width: 15px;
        height: 15px;
        border-radius: 4px;
    }


    .legend-menunggu {
        background-color: #ffc107;
    }


    .legend-dikonfirmasi {
        background-color: #198754;
    }


    .legend-full-house {
        background-color: #6f42c1;
    }


    /* ==============================
       MODAL DETAIL
    ============================== */

    .booking-detail-modal {
        display: none;

        position: fixed;

        inset: 0;

        z-index: 2000;

        background-color: rgba(0, 0, 0, 0.45);

        align-items: center;

        justify-content: center;

        padding: 20px;
    }


    .booking-detail-modal.show {
        display: flex;
    }


    .booking-detail-content {
        background: white;

        width: 100%;

        max-width: 500px;

        border-radius: 15px;

        padding: 25px;

        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);

        max-height: 90vh;

        overflow-y: auto;
    }


    .booking-detail-header {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        margin-bottom: 20px;
    }


    .booking-detail-header h4 {
        margin: 0;

        font-weight: 700;
    }


    .close-modal {
        border: none;

        background: #f1f3f5;

        width: 35px;

        height: 35px;

        border-radius: 50%;

        font-size: 20px;

        cursor: pointer;
    }


    .detail-row {
        padding: 12px 0;

        border-bottom: 1px solid #e9ecef;
    }


    .detail-row:last-child {
        border-bottom: none;
    }


    .detail-label {
        display: block;

        color: #6c757d;

        font-size: 13px;

        margin-bottom: 3px;
    }


    .detail-value {
        font-weight: 600;

        color: #212529;
    }


    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 768px) {

        .calendar-header h2 {
            font-size: 27px;
        }

        .calendar-header p {
            font-size: 14px;
        }

        .calendar-card {
            padding: 10px;
        }

        /*
        FullCalendar toolbar
        */

        .fc .fc-toolbar {
            flex-wrap: wrap;

            gap: 10px;
        }

        .fc .fc-toolbar-title {
            font-size: 20px;
        }

        .fc .fc-button {
            font-size: 12px;
            padding: 5px 8px;
        }

        .fc .fc-daygrid-day-number {
            font-size: 12px;
        }

        .calendar-event {
            font-size: 10px;
        }

    }


    @media (max-width: 480px) {

        .calendar-header h2 {
            font-size: 23px;
        }

        .fc .fc-toolbar {
            justify-content: center;
        }

        .fc .fc-toolbar-title {
            width: 100%;

            text-align: center;

            order: -1;

            font-size: 19px;
        }

        .calendar-legend {
            gap: 10px;
        }

        .legend-item {
            font-size: 12px;
        }

    }
</style>


<div class="container-fluid py-4">

    {{-- HEADER --}}

    <div class="calendar-header">

        <h2>
            Kalender Booking
        </h2>

        <p>
            Lihat jadwal reservasi seluruh kamar.
        </p>

    </div>


    {{-- CALENDAR --}}

    <div class="calendar-card">

        <div id="bookingCalendar"></div>


        {{-- LEGEND --}}

        <div class="calendar-legend">

            <div class="legend-item">

                <span class="legend-box legend-menunggu"></span>

                Menunggu

            </div>


            <div class="legend-item">

                <span class="legend-box legend-dikonfirmasi"></span>

                Dikonfirmasi

            </div>


            <div class="legend-item">

                <span class="legend-box legend-full-house"></span>

                Full House

            </div>

        </div>

    </div>

</div>



{{-- ======================================================
     MODAL DETAIL BOOKING
====================================================== --}}

<div
    id="bookingDetailModal"
    class="booking-detail-modal">

    <div class="booking-detail-content">

        <div class="booking-detail-header">

            <h4>
                Detail Booking
            </h4>

            <button
                type="button"
                class="close-modal"
                onclick="closeBookingModal()">
                ×
            </button>

        </div>


        <div id="bookingDetailBody">

        </div>

    </div>

</div>



{{-- ======================================================
     FULLCALENDAR
====================================================== --}}

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


<script>
    document.addEventListener(
        'DOMContentLoaded',
        function() {

            const calendarElement =
                document.getElementById(
                    'bookingCalendar'
                );


            const calendar =
                new FullCalendar.Calendar(
                    calendarElement, {

                        initialView: 'dayGridMonth',


                        locale: 'id',


                        height: 'auto',


                        firstDay: 1,


                        headerToolbar: {

                            left: 'prev,next today',

                            center: 'title',

                            right: 'dayGridMonth,listMonth'

                        },


                        buttonText: {

                            today: 'Hari ini',

                            month: 'Bulan',

                            list: 'Daftar'

                        },


                        events: "{{ route('admin.booking.calendar.data') }}",


                        /*
                        =====================================
                        TAMPILKAN EVENT
                        =====================================
                        */

                        eventContent: function(arg) {

                            const status =
                                arg.event.extendedProps.status;

                            const namaKamar =
                                arg.event.extendedProps.namaKamar;


                            let className =
                                'calendar-event';


                            if (
                                status ===
                                'dikonfirmasi'
                            ) {

                                className +=
                                    ' dikonfirmasi';

                            } else if (
                                namaKamar ===
                                'Seluruh Rumah'
                            ) {

                                className +=
                                    ' full-house';

                            } else {

                                className +=
                                    ' menunggu';

                            }


                            return {

                                html: `<div class="${className}">
                                        ${namaKamar}
                                    </div>`

                            };

                        },


                        /*
                        =====================================
                        KLIK EVENT
                        =====================================
                        */

                        eventClick: function(info) {

                            const props =
                                info.event.extendedProps;


                            showBookingDetail(
                                props
                            );

                        }

                    }
                );


            calendar.render();

        }
    );



    /*
    =========================================================
    TAMPILKAN DETAIL
    =========================================================
    */

    function showBookingDetail(props) {

        const modal =
            document.getElementById(
                'bookingDetailModal'
            );


        const body =
            document.getElementById(
                'bookingDetailBody'
            );


        let statusText =
            '';


        if (
            props.status ===
            'menunggu'
        ) {

            statusText =
                `<span class="badge bg-warning text-dark">
                Menunggu
            </span>`;

        } else if (
            props.status ===
            'dikonfirmasi'
        ) {

            statusText =
                `<span class="badge bg-success">
                Dikonfirmasi
            </span>`;

        }


        body.innerHTML = `

        <div class="detail-row">

            <span class="detail-label">
                Pelanggan
            </span>

            <div class="detail-value">
                ${props.namaUser}
            </div>

        </div>


        <div class="detail-row">

            <span class="detail-label">
                No. WhatsApp
            </span>

            <div class="detail-value">
                ${props.noWA}
            </div>

        </div>


        <div class="detail-row">

            <span class="detail-label">
                Kamar
            </span>

            <div class="detail-value">
                ${props.namaKamar}
            </div>

        </div>


        <div class="detail-row">

            <span class="detail-label">
                Check In
            </span>

            <div class="detail-value">
                ${formatDate(props.tglCekIn)}
            </div>

        </div>


        <div class="detail-row">

            <span class="detail-label">
                Check Out
            </span>

            <div class="detail-value">
                ${formatDate(props.tglCekOut)}
            </div>

        </div>


        <div class="detail-row">

            <span class="detail-label">
                Status
            </span>

            <div class="detail-value">
                ${statusText}
            </div>

        </div>


        <div class="mt-3">

            <a
                href="/admin/orders/${props.idReservasi}"
                class="btn btn-primary w-100"
            >
                Lihat Detail Pesanan
            </a>

        </div>

    `;


        modal.classList.add('show');

    }



    /*
    =========================================================
    TUTUP MODAL
    =========================================================
    */

    function closeBookingModal() {

        document
            .getElementById(
                'bookingDetailModal'
            )
            .classList.remove('show');

    }



    /*
    =========================================================
    KLIK LUAR MODAL
    =========================================================
    */

    document
        .getElementById(
            'bookingDetailModal'
        )
        .addEventListener(
            'click',
            function(event) {

                if (
                    event.target === this
                ) {

                    closeBookingModal();

                }

            }
        );



    /*
    =========================================================
    FORMAT TANGGAL
    =========================================================
    */

    function formatDate(dateString) {

        const date =
            new Date(dateString);


        return date.toLocaleDateString(
            'id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            }
        );

    }
</script>

@endsection