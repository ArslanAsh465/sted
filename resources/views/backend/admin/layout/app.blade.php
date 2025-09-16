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
</head>
<body style="background-color: {{ \App\Helpers\Colors::APP_BG_CLR }};">

    <div class="d-flex" style="min-height: 100vh;">
        @include('backend.admin.layout.sidebar')

        <div class="flex-grow-1 d-flex flex-column">
            @include('backend.admin.layout.navbar')

            <main id="main-content" class="flex-grow-1 p-3">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');
            const toggleIcon = document.getElementById('sidebarToggleIcon');
            const collapsedLogo = sidebar.querySelector('.collapsed-logo');
            const brandText = sidebar.querySelector('.sidebar-brand-text');
            const sidebarTexts = sidebar.querySelectorAll('.sidebar-text');

            // Apply saved state
            const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
            if (isCollapsed) collapseSidebar();

            // Toggle handler
            toggleBtn.addEventListener('click', function () {
                if (sidebar.classList.contains('collapsed')) {
                    expandSidebar();
                    localStorage.setItem('sidebar-collapsed', 'false');
                } else {
                    collapseSidebar();
                    localStorage.setItem('sidebar-collapsed', 'true');
                }
            });

            function collapseSidebar() {
                sidebar.classList.add('collapsed');
                toggleIcon.classList.remove('bi-chevron-double-left');
                toggleIcon.classList.add('bi-chevron-double-right');

                if (collapsedLogo) collapsedLogo.classList.remove('d-none');
                if (brandText) brandText.classList.add('d-none');
                sidebarTexts.forEach(el => el.classList.add('d-none'));
            }

            function expandSidebar() {
                sidebar.classList.remove('collapsed');
                toggleIcon.classList.remove('bi-chevron-double-right');
                toggleIcon.classList.add('bi-chevron-double-left');

                if (collapsedLogo) collapsedLogo.classList.add('d-none');
                if (brandText) brandText.classList.remove('d-none');
                sidebarTexts.forEach(el => el.classList.remove('d-none'));
            }
        });
    </script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
