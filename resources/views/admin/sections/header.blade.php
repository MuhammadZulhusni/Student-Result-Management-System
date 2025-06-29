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
                    <img src="{{ asset('uploads/logo.png') }}" 
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
                
                @php
                    $adminData = App\Models\User::findOrFail(Illuminate\Support\Facades\Auth::user()->id);  // Retrieve the authenticated admin's data from the database  
                @endphp

                <!-- User Dropdown -->
                <div class="dropdown d-inline-block user-dropdown ms-3">
                    <button type="button" class="btn header-item waves-effect text-white" id="page-header-user-dropdown" data-bs-toggle="dropdown">
                        @php
                            $photo = $adminData->photo;
                            $photoPath = public_path('uploads/admin_profiles/' . $photo);
                            $imageUrl = (!empty($photo) && file_exists($photoPath)) 
                                ? asset('uploads/admin_profiles/' . $photo) 
                                : asset('uploads/no_image.png');
                        @endphp

                        <!-- Display admin's profile photo, fallback to 'no_image.png' if not set -->
                        <img class="rounded-circle header-profile-user" src="{{ $imageUrl }}" alt="Profile Photo">
                        <span class="d-none d-xl-inline-block ms-1">{{$adminData->name}}</span>  <!-- Display admin's name -->
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end bg-dark text-light">
                        <!-- Dropdown link to the admin profile page -->
                        <a class="dropdown-item text-white" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-2"></i> Profile</a>
                        <!-- Dropdown link to the admin password change page -->
                        <a class="dropdown-item text-white" href="{{ route('admin.password.change') }}"><i class="ri-settings-2-line align-middle me-2"></i>Change Password</a>
                        <div class="dropdown-divider bg-white"></div>
                        <!-- "Logout" item will have the red color, even on hover -->
                        <a class="dropdown-item text-danger" href="#" id="logoutButton">
                            <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<Script>
// Sweet alert for logout
document.getElementById('logoutButton').addEventListener('click', function(e) {
    e.preventDefault();
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You'll be logged out of the system",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, logout!',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        customClass: {
            confirmButton: 'swal2-confirm',
            cancelButton: 'swal2-cancel'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('admin.logout') }}";
        }
    });
});
</Script>