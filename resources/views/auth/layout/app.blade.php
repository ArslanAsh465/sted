<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'STED')</title>

    <!-- Bootstrap CSS from local assets -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- SweetAlert2 CDN -->
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
</head>
<body style="background-color: {{ \App\Helpers\Colors::APP_BG_CLR }};">
    @yield('content')
</body>
</html>
