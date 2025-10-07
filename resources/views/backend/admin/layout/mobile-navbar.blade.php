{{-- Mobile Navbar (visible only on small screens) --}}
<nav id="mobile-navbar" class="navbar navbar-light bg-white border-bottom d-flex d-md-none px-3 justify-content-between align-items-center" style="height: 60px;">
    <!-- Sidebar Toggle Button -->
    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- Logo -->
    <a href="{{ route('home') }}" class="navbar-brand m-0">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 30px;">
    </a>

    <!-- User Dropdown -->
    <div class="dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-1 fs-5"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item border-bottom mb-1" href="#">Option 1</a></li>
            <li><a class="dropdown-item border-bottom mb-1" href="#">Option 2</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

{{-- Offcanvas Sidebar --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-speedometer2"></i>
                    <span class="ms-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.admins.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-shield-lock"></i>
                    <span class="ms-2">Admins</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.moderators.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.moderators.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-person-badge"></i>
                    <span class="ms-2">Moderators</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.institutes.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.institutes.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-buildings"></i>
                    <span class="ms-2">Institutes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.teachers.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-person-lines-fill"></i>
                    <span class="ms-2">Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.parents.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.parents.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-people"></i>
                    <span class="ms-2">Parents</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.students.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.students.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-person"></i>
                    <span class="ms-2">Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.classes.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.classes.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-journal-bookmark"></i>
                    <span class="ms-2">Classes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.centers.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.centers.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-geo-alt"></i>
                    <span class="ms-2">Centers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.exam.categories.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.exam.categories.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-ui-checks"></i>
                    <span class="ms-2">Exam Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.exams.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.exams.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-file-earmark-text"></i>
                    <span class="ms-2">Exams</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.payments.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-credit-card"></i>
                    <span class="ms-2">Payments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.registrations.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-clipboard-data"></i>
                    <span class="ms-2">Registrations</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.news.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-newspaper"></i>
                    <span class="ms-2">News</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.rankings.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-bar-chart-line"></i>
                    <span class="ms-2">Rankings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.downloads.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-download"></i>
                    <span class="ms-2">Downloads</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.gallery.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" data-bs-dismiss="offcanvas">
                    <i class="bi bi-images"></i>
                    <span class="ms-2">Gallery</span>
                </a>
            </li>
        </ul>
    </div>
</div>
