{{-- sidebar component --}}

<link rel="stylesheet" href="{{ asset('css/global.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div id="sidebar" class="bg-costum text-white border-r border-white/20 flex flex-col h-screen">
    <div class="sidebar-container flex flex-col justify-between h-screen">
        <!-- Sidebar Header -->
        <div class="sidebar-menu flex flex-col">
            <div class="flex justify-evenly items-start px-2 py-2">
                    <img src="{{ asset('img/logo.webp') }}" alt="Logo"/>
                    <div class="sidebar-text">
                        <h6 class="sidebar-title">House Ilmu Indonesia</h6>
                        <span class="sidebar-sub-title font-light">Dashboard Admin</span>
                    </div>
            </div>
            <ul class="flex flex-col space-y-1">
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
        <div class="flex flex-col items-center mb-2 px-2">
            <!-- Profile Button with border -->
            <button class="profile-btn flex justify-center items-center px-3 py-2 w-full border-none cursor-pointer rounded-lg">
                <img class="rounded-full" src="{{ asset('img/p2.jpg') }}" alt="Profile" />
                <div class="profile-text ms-2 text-left">
                    <p class="mb-0">Putra Pongkowulu</p>
                    <small>putrapongkowulu@gmail.com</small>
                </div>
                    {{-- <i class="fas fa-chevron-right ms-auto custom-icon"></i> --}}
            </button>
        </div>
    </div>
</div>
