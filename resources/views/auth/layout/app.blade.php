<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'My App' }}</title>

    <!-- Bootstrap CSS from local assets -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body style="background-color: {{ \App\Helpers\Colors::APP_BG_CLR }};">
    @yield('content')
</body>
</html>
