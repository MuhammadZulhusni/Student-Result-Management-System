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

                <!-- Subjects Dropdown -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect text-white">
                        <i class="ri-book-line text-white"></i>&nbsp;<span>Subjects</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- Create Subject -->
                        <li>
                            <a href="{{ route('create.subject') }}" class="text-white">
                                <i class="ri-add-line"></i>Create Subject
                            </a>
                        </li>
                        <!-- Manage Subjects -->
                        <li>
                            <a href="{{ route('manage.subjects') }}" class="text-white">
                                <i class="ri-settings-2-line"></i>Manage Subjects
                            </a>
                        </li>
                        <!-- Add Subject Combination -->
                        <li>
                            <a href="{{ route('add.subject.combination') }}" class="text-white">
                                <i class="ri-share-line"></i> Add Subject <span style="margin-left: 1.7rem;">Combination</span>
                            </a>
                        </li>
                        <!-- Manage Subject Combination -->
                        <li>
                            <a href="{{ route('manage.subject.combination') }}" class="text-white">
                                <i class="bi bi-kanban"></i> Manage Subject <span style="margin-left: 1.7rem;">Combination</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Student Dropdown -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect text-white">
                        <i class="ri-user-3-line text-white"></i> 
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- Add student -->
                        <li>
                            <a href="{{ route('add.student') }}" class="text-white">
                                <i class="ri-user-add-line me-2"></i> 
                                Add Student
                            </a>
                        </li>
                        <!-- Manage student -->
                        <li>
                            <a href="{{ route('manage.students') }}" class="text-white">
                                <i class="bi bi-sliders2-vertical me-2"></i>
                                Manage <span style="margin-left: 2.2rem;">Students</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Result Dropdown -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect text-white">
                        <i class="ri-file-list-3-line text-white"></i> 
                        <span>Result</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- Add student -->
                        <li>
                            <a href="{{ route('add.result') }}" class="text-white">
                                <i class="ri-file-add-line me-2"></i> 
                                Add Result
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->

