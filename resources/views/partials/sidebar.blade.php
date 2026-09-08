{{-- sidebar component --}}

<link rel="stylesheet" href="{{ asset('css/global.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div id="sidebar" class="bg-costum text-light border-end d-flex flex-column vh-100">
    <div class="sidebar-container d-flex flex-column justify-content-between vh-100">
        <!-- Sidebar Header -->
        <div class="sidebar-menu d-flex flex-column">
            <div class="d-flex justify-content-evenly align-items-start px-2 py-2">
                    <img src="{{ asset('img/logo.webp') }}" alt="Logo"/>
                    <div class="sidebar-text">
                        <h6 class="sidebar-title">House Ilmu Indonesia</h6>
                        <span class="sidebar-sub-title fw-light">Dashboard Admin</span>
                    </div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link " href="#overview">
                        <i class="fas fa-th-large me-2"></i>
                        <span class="sidebar-nav ms-4">Overview</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/">
                        <i class="fas fa-home me-2"></i>
                        <span class="sidebar-nav ms-4">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#programme">
                        <i class="fas fa-book me-2"></i>
                        <span class="sidebar-nav ms-4">Programme</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#career">
                        <i class="fas fa-briefcase me-2"></i>
                        <span class="sidebar-nav ms-4">Career</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fas fa-info-circle me-2"></i>
                        <span class="sidebar-nav ms-4">About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fas fa-users me-2"></i>
                        <span class="sidebar-nav ms-4">Teams</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        <span class="sidebar-nav ms-4">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Profile Section -->
        <div class="d-flex flex-column align-items-center mb-2 px-2">
            <!-- Profile Button with border -->
            <button class="btn profile-btn d-flex justify-content-center align-items-center px-3 py-2 w-100">
                <img class="rounded-circle" src="{{ asset('img/p2.jpg') }}" alt="Profile" />
                <div class="profile-text ms-2 text-start">
                    <p class="mb-0">Putra Pongkowulu</p>
                    <small>putrapongkowulu@gmail.com</small>
                </div>
                    {{-- <i class="fas fa-chevron-right ms-auto custom-icon"></i> --}}
            </button>
        </div>
    </div>
</div>
