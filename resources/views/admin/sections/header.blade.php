<header id="page-topbar" class="bg-dark text-light shadow-sm" >
    <div class="navbar-header">
        <div class="d-flex align-items-center justify-content-between w-100">
            <!-- Left Side for Menu and User Dropdown -->
            <div class="d-flex align-items-center">
                <!-- Menu Button for Mobile and Small Screens -->
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect text-white d-block d-lg-none" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>
            </div>

            <!-- Logo and Title Centered -->
            <div class="navbar-brand-box mx-auto ms-2">
                <a href="/dashboard" class="logo d-flex align-items-center justify-content-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/15175/15175827.png" 
                         alt="logo-sm-light" 
                         class="me-3 rounded-circle shadow-sm" 
                         height="40">
                    <span class="fw-bold fs-3 text-white">SRMS</span>
                </a>
            </div>

            <!-- Right Side for Fullscreen and User Dropdown -->
            <div class="d-flex align-items-center ms-auto">
                <!-- Fullscreen Button for Large Screens and Above -->
                <div class="dropdown d-none d-lg-inline-block ms-3">
                    <button type="button" class="btn header-item noti-icon waves-effect text-white" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line"></i>
                    </button>
                </div>
                
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block user-dropdown ms-3">
                    <button type="button" class="btn header-item waves-effect text-white" id="page-header-user-dropdown" data-bs-toggle="dropdown">
                        <img class="rounded-circle header-profile-user" src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">Julia</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end bg-dark text-light">
                        <a class="dropdown-item text-white" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item text-white" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                        <a class="dropdown-item text-white" href="#"><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                        <div class="dropdown-divider bg-white"></div>
                        <!-- "Logout" item will have the red color, even on hover -->
                        <a class="dropdown-item text-danger" href="{{route('admin.logout')}}">
                            <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

