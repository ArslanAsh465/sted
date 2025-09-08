<nav id="sidebar" class="bg-light position-relative">
    <div class="p-3">
        <!-- Brand -->
        <div class="d-flex align-items-center mb-4">
            <!-- Logo Icon (shown when collapsed) -->
            <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo Icon" width="32" height="32" class="rounded favicon-icon">

            <!-- Logo Text (shown only when expanded) -->
            <span class="ms-2 fs-5 fw-bold sidebar-brand-text">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Admin Panel" style="height: 28px;" class="full-logo">
            </span>
        </div>

        <!-- Navigation Menu -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-person-workspace"></i>
                    <span class="sidebar-text ms-2">Teachers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-person-hearts"></i>
                    <span class="sidebar-text ms-2">Parents</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-people"></i>
                    <span class="sidebar-text ms-2">Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-journal-text"></i>
                    <span class="sidebar-text ms-2">Tests</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Collapse Toggle Button at Bottom -->
    <div class="sidebar-collapse-btn text-center mt-auto px-3 pb-3">
        <button id="sidebarToggle" class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center">
            <i class="bi bi-chevron-double-left" id="sidebarToggleIcon"></i>
            <span class="sidebar-text ms-2">Collapse</span>
        </button>
    </div>
</nav>
