@php
    $adminData = App\Models\User::findOrFail(Illuminate\Support\Facades\Auth::user()->id);  // Retrieve the authenticated admin's data from the database   
@endphp

<div class="vertical-menu p-3" id="sidebar" style="background-color: rgba(42, 10, 69);">
    <div data-simplebar class="h-100">
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div>
                <!-- Display admin's profile photo, fallback to 'no_image.png' if not set -->
                <img src="{{ empty($adminData->photo) ? asset('uploads/no_image.png') : asset('uploads/admin_profiles/' . $adminData->photo) }}" alt="User Avatar" class="avatar-md rounded-circle border border-white">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1 text-white">{{ $adminData->name }}</h4>                         <!-- Display admin's name -->
                <!-- Email with icon -->
                <p class="font-size-14 mb-0 text-muted">
                    <i class="bi bi-envelope-fill me-2" style="color: gray;"></i>{{ $adminData->email }}       <!-- Display admin's email -->
                </p>
            </div>
        </div>

        <!-- Sidemenu -->
        <div id="sidebar-menu" class="mt-4">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title text-white">MAIN CATEGORY</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect text-white">
                        <i class="ri-dashboard-line text-white"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title text-white mt-4">APPEARANCE</li>

                <!-- Student Classes Dropdown -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect text-white">
                        <i class="ri-account-circle-line text-white"></i>
                        <span>Student Classes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- Create Class -->
                        <li>
                            <a href="{{ route('create.class') }}" class="text-white">
                                <i class="ri-add-circle-line me-2"></i>Create Class
                            </a>
                        </li>
                        <!-- Manage Class -->
                        <li>
                            <a href="{{ route('manage.classes') }}" class="text-white">
                                <i class="ri-edit-line me-2"></i>Manage Class
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Utility Dropdown -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect text-white">
                        <i class="ri-profile-line text-white"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html" class="text-white">Starter Page</a></li>
                        <li><a href="pages-timeline.html" class="text-white">Timeline</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->

