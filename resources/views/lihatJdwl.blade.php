@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="calendar-container">
        <h1 class="calendar-title text-center">Lihat Jadwal Booking</h1>
        <div id="calendar"></div>
        <div class="calendar-info mt-4" id="booking-info" style="display: none;">
            <h3>Jadwal Booking untuk <span id="selected-date"></span>:</h3>
            <ul id="booking-list">
                <!-- Daftar booking akan ditampilkan di sini -->
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const bookingInfoEl = document.getElementById('booking-info');
        const bookingListEl = document.getElementById('booking-list');
        const selectedDateEl = document.getElementById('selected-date');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay',
            },
            events: [
                // Contoh data booking
                { title: 'Booking oleh Andi', start: '2025-01-10' },
                { title: 'Booking oleh Budi', start: '2025-01-11' },
                { title: 'Booking oleh Citra', start: '2025-01-12' },
                { title: 'Booking oleh Dika', start: '2025-01-12' },
            ],
            dateClick: function (info) {
                const bookings = [
                    { date: '2025-01-10', name: 'Andi' },
                    { date: '2025-01-11', name: 'Budi' },
                    { date: '2025-01-12', name: 'Citra' },
                    { date: '2025-01-12', name: 'Dika' },
                ];

                const selectedBookings = bookings.filter(booking => booking.date === info.dateStr);

                if (selectedBookings.length > 0) {
                    bookingListEl.innerHTML = '';
                    selectedBookings.forEach(booking => {
                        const li = document.createElement('li');
                        li.textContent = booking.name;
                        bookingListEl.appendChild(li);
                    });

                    selectedDateEl.textContent = info.dateStr;
                    bookingInfoEl.style.display = 'block';
                } else {
                    bookingListEl.innerHTML = '<li>Tidak ada booking pada tanggal ini.</li>';
                    selectedDateEl.textContent = info.dateStr;
                    bookingInfoEl.style.display = 'block';
                }
            },
        });

        calendar.render();
    });
</script>
@endsection
