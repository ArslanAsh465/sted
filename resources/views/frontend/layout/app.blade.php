<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>STED Pakistan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('frontend.layout.navbar')

    <main class="main">
        @yield('content')
    </main>

    @include('frontend.layout.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/validate.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>
