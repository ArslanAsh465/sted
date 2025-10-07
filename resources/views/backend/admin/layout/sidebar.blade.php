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
                <i class="bi bi-speedometer2"></i>
                <span class="ms-2">Dashboard</span>
            </a>
        </li>

        {{-- Admins --}}
        <li class="nav-item">
            <a href="{{ route('admin.admins.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                <i class="bi bi-shield-lock"></i>
                <span class="ms-2">Admins</span>
            </a>
        </li>

        {{-- Moderators --}}
        <li class="nav-item">
            <a href="{{ route('admin.moderators.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.moderators.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i>
                <span class="ms-2">Moderators</span>
            </a>
        </li>

        {{-- Institutes --}}
        <li class="nav-item">
            <a href="{{ route('admin.institutes.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.institutes.*') ? 'active' : '' }}">
                <i class="bi bi-buildings"></i>
                <span class="ms-2">Institutes</span>
            </a>
        </li>

        {{-- Teachers --}}
        <li class="nav-item">
            <a href="{{ route('admin.teachers.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
                <i class="bi bi-person-lines-fill"></i>
                <span class="ms-2">Teachers</span>
            </a>
        </li>

        {{-- Parents --}}
        <li class="nav-item">
            <a href="{{ route('admin.parents.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.parents.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span class="ms-2">Parents</span>
            </a>
        </li>

        {{-- Students --}}
        <li class="nav-item">
            <a href="{{ route('admin.students.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                <i class="bi bi-person"></i>
                <span class="ms-2">Students</span>
            </a>
        </li>

        {{-- Classes --}}
        <li class="nav-item">
            <a href="{{ route('admin.classes.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.classes.*') ? 'active' : '' }}">
                <i class="bi bi-journal-bookmark"></i>
                <span class="ms-2">Classes</span>
            </a>
        </li>

        {{-- Centers --}}
        <li class="nav-item">
            <a href="{{ route('admin.centers.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.centers.*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt"></i>
                <span class="ms-2">Centers</span>
            </a>
        </li>

        {{-- Exam Categories --}}
        <li class="nav-item">
            <a href="{{ route('admin.exam.categories.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.exam.categories.*') ? 'active' : '' }}">
                <i class="bi bi-ui-checks"></i>
                <span class="ms-2">Exam Categories</span>
            </a>
        </li>

        {{-- Exams --}}
        <li class="nav-item">
            <a href="{{ route('admin.exams.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.exams.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span class="ms-2">Exams</span>
            </a>
        </li>

        {{-- Payments --}}
        <li class="nav-item">
            <a href="{{ route('admin.payments.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
                <i class="bi bi-credit-card"></i>
                <span class="ms-2">Payments</span>
            </a>
        </li>

        {{-- Registrations --}}
        <li class="nav-item">
            <a href="{{ route('admin.registrations.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-data"></i>
                <span class="ms-2">Registrations</span>
            </a>
        </li>

        {{-- News --}}
        <li class="nav-item">
            <a href="{{ route('admin.news.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                <span class="ms-2">News</span>
            </a>
        </li>

        {{-- Rankings --}}
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.rankings.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart-line"></i>
                <span class="ms-2">Rankings</span>
            </a>
        </li>

        {{-- Downloads --}}
        <li class="nav-item">
            <a href="{{ route('admin.downloads.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}">
                <i class="bi bi-download"></i>
                <span class="ms-2">Downloads</span>
            </a>
        </li>

        {{-- Gallery --}}
        <li class="nav-item">
            <a href="{{ route('admin.gallery.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
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

    /* Desktop and larger screens: fixed width 230px and show */
    @media (min-width: 768px) {
        #sidebar {
            display: flex !important;
            width: 230px !important;
            max-width: 230px !important;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            background-color: #fff;
        }
        body {
            padding-left: 230px !important;
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
