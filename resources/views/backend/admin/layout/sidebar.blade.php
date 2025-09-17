<nav id="sidebar" class="position-relative border-end d-flex flex-column">
    <!-- Brand -->
    <div class="d-flex justify-content-center align-items-center py-3 border-bottom" style="height: 60px;">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo Icon" width="32" height="32"
                 class="rounded collapsed-logo d-none">
            <span class="ms-2 fw-bold sidebar-brand-text">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Admin Panel" style="height: 28px;">
            </span>
        </a>
    </div>

    <!-- Scrollable Menu -->
    <div class="sidebar-menu flex-grow-1 overflow-auto">
        <ul class="nav flex-column p-2 gap-1">
            
            {{-- Dashboard --}}
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span class="sidebar-text ms-2">Dashboard</span>
                </a>
            </li>

            {{-- Admins Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.admins.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#adminsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.admins.*') ? 'true' : 'false' }}" aria-controls="adminsMenu">
                    <span>
                        <i class="bi bi-person-badge"></i>
                        <span class="sidebar-text ms-2">Admins</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.admins.*') ? 'show' : '' }} py-1" id="adminsMenu">
                    <ul class="nav flex-column ms-4 gap-1">
                        <li class="nav-item">
                            <a href="{{ route('admin.admins.index') }}" class="nav-link {{ request()->routeIs('admin.admins.index') ? 'active' : '' }}">
                                List Admins
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.admins.create') }}" class="nav-link {{ request()->routeIs('admin.admins.create') ? 'active' : '' }}">
                                Create Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Moderators Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.moderators.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#moderatorsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.moderators.*') ? 'true' : 'false' }}" aria-controls="moderatorsMenu">
                    <span>
                        <i class="bi bi-person-vcard"></i>
                        <span class="sidebar-text ms-2">Moderators</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.moderators.*') ? 'show' : '' }}" id="moderatorsMenu">
                    <ul class="nav flex-column ms-4 gap-1">
                        <li class="nav-item">
                            <a href="{{ route('admin.moderators.index') }}" class="nav-link {{ request()->routeIs('admin.moderators.index') ? 'active' : '' }}">
                                List Moderators
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.moderators.create') }}" class="nav-link {{ request()->routeIs('admin.moderators.create') ? 'active' : '' }}">
                                Create Moderator
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Institutes Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.institutes.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#institutesMenu" role="button" aria-expanded="#{{ request()->routeIs('admin.institutes.*') ? 'true' : 'false' }}" aria-controls="institutesMenu">
                    <span>
                        <i class="bi bi-building"></i>
                        <span class="sidebar-text ms-2">Institutes</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.institutes.*') ? 'show' : '' }}" id="institutesMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.institutes.index') }}" class="nav-link {{ request()->routeIs('admin.institutes.index') ? 'active' : '' }}">
                                List Institutes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.institutes.create') }}" class="nav-link {{ request()->routeIs('admin.institutes.create') ? 'active' : '' }}">
                                Create Institute
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Teachers Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.teachers.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#teachersMenu" role="button" aria-expanded="{{ request()->routeIs('admin.teachers.*') ? 'true' : 'false' }}" aria-controls="teachersMenu">
                    <span>
                        <i class="bi bi-person-workspace"></i>
                        <span class="sidebar-text ms-2">Teachers</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.teachers.*') ? 'show' : '' }}" id="teachersMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers.index') }}" class="nav-link {{ request()->routeIs('admin.teachers.index') ? 'active' : '' }}">
                                List Teachers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers.create') }}" class="nav-link {{ request()->routeIs('admin.teachers.create') ? 'active' : '' }}">
                                Create Teacher
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Parents Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.parents.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#parentsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.parents.*') ? 'true' : 'false' }}" aria-controls="parentsMenu">
                    <span>
                        <i class="bi bi-person-hearts"></i>
                        <span class="sidebar-text ms-2">Parents</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.parents.*') ? 'show' : '' }}" id="parentsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.parents.index') }}" class="nav-link {{ request()->routeIs('admin.parents.index') ? 'active' : '' }}">
                                List Parents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.parents.create') }}" class="nav-link {{ request()->routeIs('admin.parents.create') ? 'active' : '' }}">
                                Create Parent
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Students Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.students.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#studentsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.students.*') ? 'true' : 'false' }}" aria-controls="studentsMenu">
                    <span>
                        <i class="bi bi-people"></i>
                        <span class="sidebar-text ms-2">Students</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.students.*') ? 'show' : '' }}" id="studentsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.students.index') }}" class="nav-link {{ request()->routeIs('admin.students.index') ? 'active' : '' }}">
                                List Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.students.create') }}" class="nav-link {{ request()->routeIs('admin.students.create') ? 'active' : '' }}">
                                Create Student
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Exams Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.exams.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#examsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.exams.*') ? 'true' : 'false' }}" aria-controls="examsMenu">
                    <span>
                        <i class="bi bi-pencil-square"></i>
                        <span class="sidebar-text ms-2">Exams</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.exams.*') ? 'show' : '' }}" id="examsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.exams.index') ? 'active' : '' }}">
                                List Exams
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.exams.create') ? 'active' : '' }}">
                                Create Exam
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- News Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.news.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#newsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.news.*') ? 'true' : 'false' }}" aria-controls="newsMenu">
                    <span>
                        <i class="bi bi-megaphone"></i>
                        <span class="sidebar-text ms-2">News</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.news.*') ? 'show' : '' }}" id="newsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.index') ? 'active' : '' }}">
                                List News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.news.create') }}" class="nav-link {{ request()->routeIs('admin.news.create') ? 'active' : '' }}">
                                Add News
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Rankings Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.rankings.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#rankingsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.rankings.*') ? 'true' : 'false' }}" aria-controls="rankingsMenu">
                    <span>
                        <i class="bi bi-bar-chart-line"></i>
                        <span class="sidebar-text ms-2">Rankings</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.rankings.*') ? 'show' : '' }}" id="rankingsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.rankings.index') ? 'active' : '' }}">
                                List Rankings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.rankings.create') ? 'active' : '' }}">
                                Create Ranking
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Downloads Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.downloads.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#downloadsMenu" role="button" aria-expanded="{{ request()->routeIs('admin.downloads.*') ? 'true' : 'false' }}" aria-controls="downloadsMenu">
                    <span>
                        <i class="bi bi-download"></i>
                        <span class="sidebar-text ms-2">Downloads</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.downloads.*') ? 'show' : '' }}" id="downloadsMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.downloads.index') }}" class="nav-link {{ request()->routeIs('admin.downloads.index') ? 'active' : '' }}">
                                List Downloads
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.downloads.create') }}" class="nav-link {{ request()->routeIs('admin.downloads.create') ? 'active' : '' }}">
                                Create Download
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Gallery Dropdown --}}
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.gallery.*') ? 'active-parent' : '' }}" data-bs-toggle="collapse" href="#galleryMenu" role="button" aria-expanded="{{ request()->routeIs('admin.gallery.*') ? 'true' : 'false' }}" aria-controls="galleryMenu">
                    <span>
                        <i class="bi bi-images"></i>
                        <span class="sidebar-text ms-2">Gallery</span>
                    </span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse {{ request()->routeIs('admin.gallery.*') ? 'show' : '' }}" id="galleryMenu">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}">
                                List Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.create') }}" class="nav-link {{ request()->routeIs('admin.gallery.create') ? 'active' : '' }}">
                                Upload / Add New
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

    <!-- Collapse Button -->
    <div class="sidebar-collapse-btn text-center border-top p-3">
        <button id="sidebarToggle" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-chevron-double-left" id="sidebarToggleIcon"></i>
            <span class="sidebar-text ms-2">Collapse</span>
        </button>
    </div>
</nav>

<style>
    /* Sidebar dynamic width & collapse */
    #sidebar {
        width: 300px; /* expanded width */
        height: 100vh;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        transition: width 0.3s ease;
        overflow: hidden;
    }
    #sidebar.collapsed {
        width: 100px; /* collapsed width */
    }
    #sidebar .sidebar-menu {
        overflow-y: auto;
        flex-grow: 1;
        -webkit-overflow-scrolling: touch;
    }

    /* Active link styling */
    #sidebar .nav-link.active {
        background-color: #0d6efd;
        color: white !important;
        font-weight: 600;
        border-radius: 0.375rem;
    }
    #sidebar .nav-link.active i {
        color: white !important;
    }

    /* Hover styling */
    #sidebar .nav-link:hover {
        background-color: #e2e6f0;
        color: #0d6efd !important;
        font-weight: 600;
        border-radius: 0.375rem;
        text-decoration: none;
    }
    #sidebar .nav-link:hover i {
        color: #0d6efd !important;
    }

    /* Parent (dropdown trigger) active styling */
    #sidebar .nav-link.active-parent {
        background-color: #e2e6f0;
        color: #0d6efd !important;
        font-weight: 600;
        border-radius: 0.375rem;
    }
    #sidebar .nav-link.active-parent i {
        color: #0d6efd !important;
    }

    /* Submenu item styling */
    #sidebar .nav .nav-link {
        padding-left: 1.5rem;
        font-size: 0.925rem;
    }
</style>

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