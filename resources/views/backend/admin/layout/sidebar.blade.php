<nav id="sidebar" class="border-end d-flex flex-column" style="width: 100%; max-width: 100%; transition: width 0.3s ease;">
    <!-- Brand -->
    <div class="d-flex justify-content-center align-items-center py-3 border-bottom" style="height: 60px;">
        <a href="{{ route('home') }}" target="_blank" class="text-decoration-none">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Admin Panel" style="height: 40px;">
        </a>
    </div>

    <!-- Menu Options -->
    <ul class="nav flex-column p-3 gap-2">
        {{-- Dashboard --}}
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Dashboard</span>
            </a>
        </li>

        {{-- Admins --}}
        <li class="nav-item">
            <a href="{{ route('admin.admins.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Admins</span>
            </a>
        </li>

        {{-- Moderators --}}
        <li class="nav-item">
            <a href="{{ route('admin.moderators.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.moderators.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Moderators</span>
            </a>
        </li>

        {{-- Institutes --}}
        <li class="nav-item">
            <a href="{{ route('admin.institutes.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.institutes.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Institutes</span>
            </a>
        </li>

        {{-- Teachers --}}
        <li class="nav-item">
            <a href="{{ route('admin.teachers.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Teachers</span>
            </a>
        </li>

        {{-- Parents --}}
        <li class="nav-item">
            <a href="{{ route('admin.parents.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.parents.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Parents</span>
            </a>
        </li>

        {{-- Students --}}
        <li class="nav-item">
            <a href="{{ route('admin.students.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Students</span>
            </a>
        </li>

        {{-- Exams --}}
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.exams.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Exams</span>
            </a>
        </li>

        {{-- News --}}
        <li class="nav-item">
            <a href="{{ route('admin.news.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">News</span>
            </a>
        </li>

        {{-- Rankings --}}
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.rankings.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Rankings</span>
            </a>
        </li>

        {{-- Downloads --}}
        <li class="nav-item">
            <a href="{{ route('admin.downloads.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Downloads</span>
            </a>
        </li>

        {{-- Gallery --}}
        <li class="nav-item">
            <a href="{{ route('admin.gallery.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span class="ms-2">Gallery</span>
            </a>
        </li>
    </ul>
</nav>

<style>
    /* Hide sidebar on mobile/small screens */
    @media (max-width: 767.98px) {
        #sidebar {
            display: none !important;
        }
        body {
            padding-left: 0 !important;
        }
    }

    /* Desktop and larger screens: fixed width 200px and show */
    @media (min-width: 768px) {
        #sidebar {
            display: flex !important;
            width: 200px !important;
            max-width: 200px !important;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            background-color: #fff;
        }
        body {
            padding-left: 200px !important;
        }
    }

    /* Style for active sidebar link */
    #sidebar .nav-link.active {
        background-color: #0d6efd;
        color: #fff !important;
        font-weight: 500;
        border-radius: 0.375rem;
    }

    #sidebar .nav-link.active i {
        color: #fff !important;
    }

    #sidebar .nav-link:not(.active):hover {
        background-color: #e9ecef;
        color: #000 !important;
        border-radius: 0.375rem;
    }

    #sidebar .nav-link:not(.active):hover i {
        color: #000 !important;
    }
</style>
