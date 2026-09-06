<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homestay Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;700&family=Roboto:wght@400;500&family=Lora:wght@400;500&family=Merriweather:wght@400;700&family=Poppins:wght@400;500&family=Quicksand:wght@400;500&display=swap"
        rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif !important;
    }

    /* Navbar */
    .navbar {
        background-color: #FDF6E3 !important;
        /* Warna latar belakang navbar */
        padding: 5px 20px !important;
        /* Mengurangi padding navbar */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 0;
    }

    .navbar-brand img {
        max-width: 190px;
        /* Ukuran gambar logo disesuaikan lebih kecil */
        max-height: auto;
        object-fit: contain;
    }

    .navbar-brand {
        color: #07617D !important;
        /* Warna brand */
        font-weight: bold !important;
        font-size: 1.6rem !important;
        /* Mengurangi ukuran font pada brand */
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
        /* Menambah jarak huruf */
        transition: color 0.3s ease;
    }

    .navbar-brand:hover {
        color: #054D5F !important;
        /* Warna saat hover pada brand */
    }

    .navbar-toggler {
        border-color: #07617D !important;
        /* Menyesuaikan border */
    }

    .navbar-toggler-icon {
        background-color: #07617D !important;
        /* Ikon toggle navbar */
        border-radius: 5px !important;
    }

    .navbar-nav .nav-link {
        color: #07617D !important;
        /* Warna link navbar */
        font-weight: 500 !important;
        margin-right: 15px !important;
        /* Mengurangi margin antar link */
        text-transform: capitalize !important;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
        color: #054D5F !important;
        /* Warna saat hover dan link aktif */
        font-weight: bold !important;
        transform: translateY(-3px);
        /* Efek sedikit mengangkat saat hover */
    }

    .navbar-collapse {
        justify-content: flex-end !important;
        /* Menata link navbar ke kanan */
    }

    .nav-item {
        font-family: 'Lora';
    }

    /* Navbar pada mode mobile */
    @media (max-width: 991px) {
        .navbar-collapse {
            text-align: center !important;
        }

        .navbar-nav .nav-item {
            margin-bottom: 10px !important;
            /* Mengurangi jarak antar item */
        }

        .navbar-brand {
            font-size: 1.5rem !important;
            /* Mengurangi ukuran font pada mobile */
        }

        .navbar-brand img {
            width: 100px;
            /* Mengurangi ukuran logo pada mobile */
        }
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('image/logo.png') }}" alt="Logo Homestay Kami">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rooms.view') }}">Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lihatJdwl') }}">Lihat Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('location') }}">Lokasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('facilities') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Menyertakan JavaScript Bootstrap untuk fungsionalitas navbar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>