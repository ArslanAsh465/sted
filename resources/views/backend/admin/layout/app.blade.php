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
        /* Sidebar styles */
        #sidebar {
            width: 250px;
            transition: width 0.3s;
            overflow: hidden;
            height: 100vh;
        }

        #sidebar.collapsed {
            width: 60px;
        }

        #sidebar.collapsed .sidebar-text {
            display: none;
        }

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
        }

        #sidebar.collapsed .nav-link {
            justify-content: center;
        }

        /* Brand text */
        .sidebar-brand-text {
            transition: opacity 0.3s;
        }

        #sidebar.collapsed .sidebar-brand-text {
            opacity: 0;
        }

        /* Navbar stays fixed and full width */
        #main-navbar {
            margin-left: 0;
            z-index: 1030;
        }

        /* Main content shifts only with padding */
        #main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        #sidebar.collapsed ~ #main-content {
            margin-left: 60px;
        }

        /* Collapse button alignment */
        .sidebar-collapse-btn {
            position: absolute;
            bottom: 10px;
            width: 100%;
        }

        #sidebar.collapsed .sidebar-collapse-btn .sidebar-text {
            display: none;
        }

        /* Hide favicon by default */
        .favicon-icon {
            display: none;
        }

        /* When sidebar is collapsed */
        #sidebar.collapsed .favicon-icon {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
        }

        #sidebar.collapsed .sidebar-brand-text {
            display: none;
        }

        /* Optionally adjust vertical alignment */
        #sidebar.collapsed .d-flex.align-items-center {
            justify-content: center;
        }
    </style>
</head>
<body style="background-color: {{ \App\Helpers\Colors::APP_BG_CLR }};">

    <div class="d-flex">
        <!-- Sidebar -->
        @include('backend.admin.layout.sidebar')

        <div class="flex-grow-1">
            <!-- Navbar (non-moving) -->
            @include('backend.admin.layout.navbar')

            <!-- Main Content -->
            <main id="main-content" class="py-4 px-3">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleIcon = document.getElementById('sidebarToggleIcon');

            sidebar.classList.toggle('collapsed');

            // Change the icon direction based on collapsed state
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
