<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Homestay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            position: fixed;
            z-index: 1000;
            background-color: #343a40;
            transition: all 0.3s;
        }

        #sidebar-wrapper.toggled {
            margin-left: -250px;
        }

        .sidebar-heading {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f8f9fa;
            text-transform: uppercase;
            border-bottom: 1px solid #495057;
        }

        .list-group-item {
            border: none;
            transition: background-color 0.3s, color 0.3s;
            font-weight: 500;
        }

        .list-group-item:hover {
            background-color: #495057;
            color: #f8f9fa;
        }

        .list-group-item.active {
            background-color: #007bff !important;
            color: #fff !important;
            font-weight: bold;
        }

        /* Page Content */
        #page-content-wrapper {
            margin-left: 250px;
            width: calc(100% - 250px);
            transition: all 0.3s;
        }

        #page-content-wrapper.toggled {
            margin-left: 0;
            width: 100%;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link {
            font-weight: bold;
            color: #007bff;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #0056b3;
        }

        /* Menu Toggle Button */
        #menu-toggle {
            border: none;
            background-color: #007bff;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.2s;
        }

        #menu-toggle:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4">Admin Homestay</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.dashboard') }}" 
                   class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.daftarKamar') }}" 
                   class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.daftarKamar') ? 'active' : '' }}">
                    Daftar Kamar
                </a>
                <a href="{{ route('admin.orders') }}" 
                   class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
                    Pesanan
                </a>
                <a href="{{ route('admin.reviews') }}" 
                   class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.reviews') ? 'active' : '' }}">
                    Ulasan
                </a>
                <a href="{{ route('admin.laporan') }}" 
                   class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                    Laporan
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="btn" id="menu-toggle">Menu</button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-4">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const menuToggle = document.getElementById("menu-toggle");
        const sidebarWrapper = document.getElementById("sidebar-wrapper");
        const pageContentWrapper = document.getElementById("page-content-wrapper");

        menuToggle.addEventListener("click", () => {
            sidebarWrapper.classList.toggle("toggled");
            pageContentWrapper.classList.toggle("toggled");
        });
    </script>
</body>
</html>
