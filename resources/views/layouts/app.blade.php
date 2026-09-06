<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homestay Kami')</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link ke font-awesome untuk ikon sosial media di footer -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Optional: Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif !important;
        }

        /* Custom Styling */
        .navbar {
            background-color: #FDF6E3 !important;
            padding: 10px 20px !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }

        .navbar-brand {
            color: #07617D !important;
            font-weight: bold !important;
            font-size: 1.5rem !important;
            text-transform: uppercase !important;
        }

        .footer {
            background-color: #212121;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content Section -->
    <div class="container-fluid p-0">
        @yield('content') <!-- Konten halaman yang ditentukan oleh @section('content') -->
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
