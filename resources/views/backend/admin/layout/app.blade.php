<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'STED')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="{{ asset('assets/css/bootstrap-icons.min.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

    <style>
        /* Navbar */
        #main-navbar {
            z-index: 1050;
            background-color: #fff;
        }

        /* Main content positioning */
        #main-content {
            margin-top: 56px; /* Height of navbar */
        }

        /* Sidebar base */
        #sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #1f2937; /* Dark blue-gray */
            color: white;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        /* Sidebar brand (top area) */
        #sidebar .sidebar-brand {
            background-color: #111827;
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
        }

        /* Logo visibility control */
        #sidebar .collapsed-logo {
            display: none;
        }

        #sidebar .sidebar-brand-text {
            display: inline-block;
        }

        /* Collapsed sidebar styles */
        #sidebar.collapsed {
            width: 70px;
        }

        #sidebar.collapsed .sidebar-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        #sidebar.collapsed .collapsed-logo {
            display: inline-block !important;
        }

        #sidebar.collapsed .sidebar-brand-text {
            display: none !important;
        }

        /* Scrollable menu area */
        .sidebar-menu {
            flex-grow: 1; /* Take up all available vertical space */
            max-height: calc(100vh - 150px); /* Adjust based on brand + collapse button height */
            overflow-y: auto;
        }

        /* Custom scrollbar for sidebar */
        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        /* Collapse button container */
        .sidebar-collapse-btn {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.5rem 1rem;
            margin: 0;
        }

        /* Collapse button styles */
        .sidebar-collapse-btn button {
            background-color: #374151;
            color: #fff;
            border: none;
            width: 100%;
            padding: 0.5rem 0;
            margin: 0;
            border-radius: 0;
            transition: background-color 0.3s ease;
        }

        .sidebar-collapse-btn button:hover {
            background-color: #4b5563;
        }

        /* Active and hover state for menu items */
        .nav-link.active,
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            color: #fff;
        }

        /* Navbar color */
        .navbar {
            color: white;
            background-color: #1f2937 !important;
        }
    </style>
</head>
<body style="background-color: {{ \App\Helpers\Colors::APP_BG_CLR }};">

    <div class="d-flex" style="min-height: 100vh;">
        @include('backend.admin.layout.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('backend.admin.layout.navbar')

            <main id="main-content" class="flex-grow-1 py-4 px-3">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleIcon = document.getElementById('sidebarToggleIcon');

            sidebar.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('bi-chevron-double-left');
                toggleIcon.classList.add('bi-chevron-double-right');
            } else {
                toggleIcon.classList.remove('bi-chevron-double-right');
                toggleIcon.classList.add('bi-chevron-double-left');
            }
        });
    </script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
