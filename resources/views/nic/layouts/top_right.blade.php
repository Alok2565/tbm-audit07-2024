<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="index.html" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo.png')}}" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-dark-sm.png')}}" alt="small logo">
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <!-- Topbar Search Form -->
            <div class="app-search dropdown d-none d-lg-block">

            </div>
        </div>
        <div class="project-heading">
            <h3 class="title-head" style="color: #000;font-weight:600;">Transfer of Human Biological Material (THBM)</h3>
        </div>
        <ul class="topbar-menu d-flex align-items-center gap-3">
            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line font-22"></i>
                </a>
            </li>
            <li class="dropdown d-flex">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <h4 class="text-overflow m-0 text-dark"> Welcome !</h4>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0"><span style="color:green;">{{ Session::get('name') }}</span></h5>
                        <h6 class="my-0 fw-normal text-dark">{{ Session::get('designation') }}</h6>
                    </span>
                    <span class="account-user-avatar">
                        <img src="{{ asset('public/assets/backend/images/user.png') }}" alt="user-image" width="32" class="rounded-circle">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">

                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="mdi mdi-lock-outline me-1"></i>
                        <span>Change your Password</span>
                    </a>
                    <a href="{{ route('nic.logout') }}" class="dropdown-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
            {{-- <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                        <h5 class="my-0 fw-normal"><span style="color:green;">{{ Session::get('name') }}</span></h5>
                        <span style="color:green;">{{ Session::get('designation') }}<span>
                                <span class="account-user-avatar">
                                    <img src="{{ asset('assets/backend/images') }}/user.png" alt="user-image"
                                        width="32" class="rounded-circle">
                                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="mdi mdi-lock-outline me-1"></i>
                        <span>Change your Password</span>
                    </a>
                    <a href="{{ route('nic.logout') }}" class="dropdown-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li> --}}
        </ul>
    </div>
</div>
