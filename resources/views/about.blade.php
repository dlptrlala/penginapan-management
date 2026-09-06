@extends('layouts.app')

<style>
    body {
        background-color: #f4f7fc;
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(to right, rgba(253, 246, 227, 0.9) 28%, rgba(255, 255, 255, 0) 100%),
            url('image/tentang6.jpg') no-repeat center center/cover;
        color: #07617D;
        padding: 120px 20px;
        text-align: center;
        position: relative;
        border-radius: 20px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .hero-section:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        /* Transparansi gelap untuk meningkatkan kontras */
        z-index: -1;
    }


    .hero-section h1 {
        font-size: 3.8rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        margin-bottom: 15px;
        text-transform: uppercase;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
    }

    .hero-section p {
        font-size: 1.3rem;
        font-weight: 300;
        margin-top: 20px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* About Content */
    .about-content {
        margin: 70px auto;
        max-width: 950px;
        text-align: left;
        /* Mengatur teks lebih ke kiri untuk kesan lebih rapi */
        padding: 0 20px;
        position: relative;
    }

    .about-content h2 {
        font-size: 2.8rem;
        font-weight: 600;
        color: #07617D;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .about-content h2::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background-color: #07617D;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .about-content p {
        font-size: 1.2rem;
        /* Ukuran font sedikit lebih besar */
        line-height: 1.8;
        /* Jarak antar baris lebih lebar */
        margin-bottom: 25px;
        /* Memberikan spasi lebih banyak antar paragraf */
        color: #666;
        font-weight: 300;
        transition: opacity 0.3s ease;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }


    .about-content h3 {
        font-size: 1.8rem;
        font-weight: 500;
        color: #07617D;
        margin-top: 30px;
    }

    .about-content ul {
        margin-top: 10px;
        padding-left: 20px;
    }

    .about-content ul li {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    /* Button */
    .button-container {
        margin: 40px auto;
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    .button-container a {
        padding: 18px 35px;
        /* Tombol lebih besar */
        font-size: 1.2rem;
        /* Ukuran font lebih besar */
        color: #fff;
        background-color: #07617D;
        border-radius: 30px;
        text-decoration: none;
        transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
    }

    .button-container a:hover {
        background-color: #054D5F;
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.3);
        /* Menambahkan bayangan saat hover */
    }


    /* Image Section */
    .image-section {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin: 50px auto;
        max-width: 1100px;
        padding: 0 15px;
    }

    .image-section img {
        width: 100%;
        height: auto;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        object-fit: cover;
        /* Menjaga agar gambar tidak terdistorsi */
    }

    .image-section img:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
    }

    /* General Enhancements */
    h1,
    h2,
    p {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    /* Scroll Animations */
    .hero-section,
    .about-content,
    .button-container,
    .image-section {
        opacity: 0;
        transform: translateY(40px);
        animation: fadeInUp 1s ease-out forwards;
        /* Menambahkan ease-out untuk animasi yang lebih halus */
    }

    .hero-section {
        animation-delay: 0.2s;
    }

    .about-content {
        animation-delay: 0.4s;
    }

    .button-container {
        animation-delay: 0.6s;
    }

    .image-section {
        animation-delay: 0.8s;
    }

    /* Style for Icons */
    ul li i {
        margin-right: 10px;
        color: #07617D;
        font-size: 1.5rem;
    }


    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .image-section {
            grid-template-columns: 1fr;
            /* Satu kolom pada layar kecil */
            padding: 0;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            /* Mengurangi ukuran font pada layar kecil */
        }

        .hero-section p {
            font-size: 1.1rem;
            /* Menyesuaikan ukuran font pada layar kecil */
        }

        .about-content h2 {
            font-size: 2.4rem;
            /* Mengurangi ukuran heading pada layar kecil */
        }

        .button-container a {
            padding: 12px 25px;
            /* Menyesuaikan ukuran tombol pada layar kecil */
            font-size: 1rem;
        }
    }
</style>


@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <h1>Tentang Homestay Kami</h1>
</div>

<!-- About Content -->
<div class="container about-content">
    <p class="lead mt-4">
        Selamat datang di Homestay Kami, tempat yang nyaman untuk menginap dengan pelayanan terbaik. Kami menyediakan
        berbagai fasilitas untuk memastikan kenyamanan Anda selama menginap di sini.
    </p>
    <p>
        Homestay Kami terletak di lokasi strategis yang memudahkan akses ke berbagai tempat wisata, serta dikelilingi
        oleh pemandangan alam yang indah dan tenang. Kami berkomitmen untuk memberikan pengalaman menginap yang tidak
        terlupakan bagi setiap tamu.
    </p>

    <h2>Visi Kami</h2>
    <p>
        Menjadi pilihan utama bagi wisatawan yang mencari akomodasi yang nyaman, aman, dan terjangkau di area ini.
    </p>

    <h2>Misi Kami</h2>
    <ul>
        <li><i class="fas fa-thumbs-up"></i> Menyediakan layanan yang ramah dan profesional.</li>
        <li><i class="fas fa-broom"></i> Menjaga kebersihan dan kenyamanan setiap ruangan.</li>
        <li><i class="fas fa-smile"></i> Memberikan pengalaman menginap yang menyenangkan bagi setiap tamu.</li>
    </ul>


</div>

<!-- Call to Action -->
<div class="button-container">
    <a href="#">Jelajahi Fasilitas Kami</a>
</div>

<!-- Image Section -->
<div class="container image-section">
    <img src="https://placehold.co/400x300" alt="Area Luar Homestay">
    <img src="https://placehold.co/400x300" alt="Kamar Nyaman">
    <img src="https://placehold.co/400x300" alt="Ruang Makan">
</div>

@endsection