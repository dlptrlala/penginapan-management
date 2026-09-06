<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Dashboard - Homestay')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        #sidebar-wrapper {

            width: 250px;

            min-height: 100vh;

            position: fixed;

            top: 0;
            left: 0;

            z-index: 1100;

            background-color: #212529;

            transition: transform 0.3s ease;

            overflow-y: auto;
        }


        .sidebar-heading {

            height: 100px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 20px;

            font-size: 1.5rem;

            font-weight: bold;

            color: #f8f9fa;

            text-transform: uppercase;

            border-bottom: 1px solid #495057;

            white-space: nowrap;
        }


        /* MENU */

        .sidebar-menu {

            display: flex;

            flex-direction: column;
        }


        .sidebar-menu a {

            display: block;

            padding: 16px 20px;

            color: #fff;

            text-decoration: none;

            font-weight: 500;

            transition:
                background-color 0.2s ease,
                color 0.2s ease;
        }


        .sidebar-menu a:hover {

            background-color: #495057;

            color: #fff;
        }


        .sidebar-menu a.active {

            background-color: #007bff;

            color: #fff;

            font-weight: bold;
        }


        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        #page-content-wrapper {

            min-height: 100vh;

            margin-left: 250px;

            width: calc(100% - 250px);

            transition:
                margin-left 0.3s ease,
                width 0.3s ease;
        }


        /* =====================================================
           TOP NAVBAR
        ===================================================== */

        .admin-navbar {

            height: 68px;

            background-color: #fff;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 20px;

            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.08);

            position: sticky;

            top: 0;

            z-index: 1000;
        }


        /* MENU BUTTON */

        #menu-toggle {

            border: none;

            background-color: #007bff;

            color: white;

            padding: 10px 18px;

            border-radius: 5px;

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            transition:
                background-color 0.2s ease,
                transform 0.2s ease;
        }


        #menu-toggle:hover {

            background-color: #0056b3;

            transform: translateY(-1px);
        }


        /* LOGOUT */

        .logout-button {

            border: none;

            background: none;

            color: #007bff;

            font-size: 16px;

            font-weight: bold;

            text-decoration: none;

            cursor: pointer;

            padding: 8px;
        }


        .logout-button:hover {

            color: #0056b3;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .admin-content {

            width: 100%;

            padding: 25px;
        }


        /* =====================================================
           OVERLAY
        ===================================================== */

        #sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            background-color: rgba(0, 0, 0, 0.45);

            z-index: 1050;
        }


        /* =====================================================
           DESKTOP SIDEBAR TOGGLE
        ===================================================== */

        body.sidebar-closed #sidebar-wrapper {

            transform: translateX(-250px);
        }


        body.sidebar-closed #page-content-wrapper {

            margin-left: 0;

            width: 100%;
        }


        /* =====================================================
           TABLET
        ===================================================== */

        @media (max-width: 992px) {

            #sidebar-wrapper {

                transform: translateX(-250px);
            }


            #page-content-wrapper {

                margin-left: 0;

                width: 100%;
            }


            #sidebar-wrapper.mobile-open {

                transform: translateX(0);
            }


            #sidebar-overlay.mobile-open {

                display: block;
            }

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        @media (max-width: 768px) {

            .admin-navbar {

                height: 60px;

                padding: 0 15px;
            }


            #menu-toggle {

                padding: 8px 14px;

                font-size: 14px;
            }


            .logout-button {

                font-size: 14px;
            }


            .admin-content {

                padding: 18px 15px;
            }


            .sidebar-heading {

                height: 80px;

                font-size: 1.3rem;
            }

        }


        /* =====================================================
           SMALL MOBILE
        ===================================================== */

        @media (max-width: 480px) {

            .admin-navbar {

                padding: 0 12px;
            }


            .logout-button {

                font-size: 13px;
            }


            .admin-content {

                padding: 15px 10px;
            }

        }
    </style>

</head>


<body>


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside id="sidebar-wrapper">

        <div class="sidebar-heading">

            Admin Homestay

        </div>


        <nav class="sidebar-menu">

            {{-- DASHBOARD --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>


            {{-- DAFTAR KAMAR --}}

            <a
                href="{{ route('admin.daftarKamar') }}"
                class="{{ request()->routeIs('admin.daftarKamar') ? 'active' : '' }}">
                Daftar Kamar
            </a>


            {{-- PESANAN --}}

            <a
                href="{{ route('admin.orders') }}"
                class="{{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                Pesanan
            </a>

            {{-- KALENDER --}}

            <a
                href="{{ route('admin.booking.calendar') }}"
                class="{{ request()->routeIs('admin.booking.calendar*') ? 'active' : '' }}">
                Kalender Booking
            </a>


            {{-- ULASAN --}}

            <a
                href="{{ route('admin.reviews') }}"
                class="{{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                Ulasan
            </a>


            {{-- LAPORAN --}}

            <a
                href="{{ route('admin.laporan') }}"
                class="{{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                Laporan
            </a>

        </nav>

    </aside>



    {{-- =====================================================
         OVERLAY
    ====================================================== --}}

    <div id="sidebar-overlay"></div>



    {{-- =====================================================
         PAGE CONTENT
    ====================================================== --}}

    <div id="page-content-wrapper">


        {{-- TOP NAVBAR --}}

        <nav class="admin-navbar">


            {{-- MENU --}}

            <button
                id="menu-toggle"
                type="button">
                ☰ &nbsp; Menu
            </button>


            {{-- LOGOUT --}}

            <form
                action="{{ route('logout') }}"
                method="POST"
                style="margin: 0;">

                @csrf

                <button
                    type="submit"
                    class="logout-button">
                    Logout
                </button>

            </form>


        </nav>



        {{-- CONTENT DARI HALAMAN ADMIN --}}

        <main class="admin-content">

            @yield('content')

        </main>


    </div>



    {{-- =====================================================
         JAVASCRIPT
    ====================================================== --}}

    <script>
        const menuToggle =
            document.getElementById('menu-toggle');

        const sidebar =
            document.getElementById('sidebar-wrapper');

        const overlay =
            document.getElementById('sidebar-overlay');


        /*
        ==========================================
        BUKA / TUTUP SIDEBAR
        ==========================================
        */

        menuToggle.addEventListener('click', function() {

            const isMobile =
                window.innerWidth <= 992;


            if (isMobile) {

                sidebar.classList.toggle('mobile-open');

                overlay.classList.toggle('mobile-open');

            } else {

                document.body.classList.toggle('sidebar-closed');

            }

        });


        /*
        ==========================================
        KLIK OVERLAY
        ==========================================
        */

        overlay.addEventListener('click', function() {

            sidebar.classList.remove('mobile-open');

            overlay.classList.remove('mobile-open');

        });


        /*
        ==========================================
        KLIK MENU DI MOBILE
        ==========================================
        */

        const sidebarLinks =
            sidebar.querySelectorAll('a');


        sidebarLinks.forEach(function(link) {

            link.addEventListener('click', function() {

                if (window.innerWidth <= 992) {

                    sidebar.classList.remove('mobile-open');

                    overlay.classList.remove('mobile-open');

                }

            });

        });


        /*
        ==========================================
        RESET KETIKA RESIZE
        ==========================================
        */

        window.addEventListener('resize', function() {

            if (window.innerWidth > 992) {

                sidebar.classList.remove('mobile-open');

                overlay.classList.remove('mobile-open');

            }

        });
    </script>


</body>

</html>