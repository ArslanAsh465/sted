<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Admin Panel">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('exams') }}" class="{{ request()->routeIs('exams') ? 'active' : '' }}">Exams</a></li>
        <li><a href="{{ route('news') }}" class="{{ request()->routeIs('news') ? 'active' : '' }}">News</a></li>
        <li><a href="{{ route('rankings') }}" class="{{ request()->routeIs('rankings') ? 'active' : '' }}">Rankings</a></li>
        <li><a href="{{ route('downloads') }}" class="{{ request()->routeIs('downloads') ? 'active' : '' }}">Downloads</a></li>
        <li><a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="{{ route('loginForm') }}">Log In</a>

  </div>
</header>
