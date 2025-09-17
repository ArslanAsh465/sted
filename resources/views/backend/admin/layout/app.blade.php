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

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
</html>
