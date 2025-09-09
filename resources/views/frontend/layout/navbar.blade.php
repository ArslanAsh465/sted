<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Admin Panel">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="{{ route('exams') }}">Exams</a></li>
        <li><a href="{{ route('news') }}">News</a></li>
        <li><a href="{{ route('rankings') }}">Rankings</a></li>
        <li><a href="{{ route('downloads') }}">Downloads</a></li>
        <li><a href="{{ route('gallery') }}">Gallery</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="{{ route('loginForm') }}">Log In</a>

  </div>
</header>
