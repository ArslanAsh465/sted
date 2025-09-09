<nav id="sidebar" class="bg-sidebar text-white position-relative border-end d-flex flex-column">
    <!-- Brand -->
    <div class="sidebar-brand d-flex align-items-center">
        <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo Icon" width="32" height="32" class="rounded collapsed-logo d-none">
        <span class="ms-2 fw-bold sidebar-brand-text">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Admin Panel" style="height: 28px;">
        </span>
    </div>

    <!-- Scrollable Menu -->
    <div class="sidebar-menu flex-grow-1 overflow-auto">
        <ul class="nav flex-column p-2">
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-badge"></i><span class="sidebar-text ms-2">Admins</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-vcard"></i><span class="sidebar-text ms-2">Moderators</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-building"></i><span class="sidebar-text ms-2">Institutes</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-workspace"></i><span class="sidebar-text ms-2">Teachers</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-hearts"></i><span class="sidebar-text ms-2">Parents</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people"></i><span class="sidebar-text ms-2">Students</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-pencil-square"></i><span class="sidebar-text ms-2">Exams</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-megaphone"></i><span class="sidebar-text ms-2">News</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bar-chart-line"></i><span class="sidebar-text ms-2">Rankings</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-download"></i><span class="sidebar-text ms-2">Downloads</span></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-images"></i><span class="sidebar-text ms-2">Gallery</span></a></li>
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
