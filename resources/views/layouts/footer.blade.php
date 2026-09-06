<!-- resources/views/layouts/app.blade.php atau layout utama lainnya -->
<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Meta Tags dan link lainnya -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
        <!-- Footer -->
    <!-- resources/views/layouts/footer.blade.php -->
    <footer class="footer bg-dark text-white text-center py-4">
        <div class="container">
            <p>&copy; 2025 Homestay Kami. Semua hak cipta dilindungi.</p>
            <p>Alamat: Jalan Raya Homestay No. 123, Kota Homestay, Indonesia</p>
            <div class="social-icons">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p><a href="{{ route('contact') }}" class="text-white">Hubungi Kami</a></p>
        </div>
    </footer>


    <!-- Scripts -->
</body>

</html>