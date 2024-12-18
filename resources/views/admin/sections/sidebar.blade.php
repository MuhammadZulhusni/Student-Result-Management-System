<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu p-3" id="sidebar" style="background-color: rgba(42, 10, 69);">
    <div data-simplebar class="h-100">
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div>
                <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="User Avatar" class="avatar-md rounded-circle border border-white">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1 text-white">Julia Hudda</h4>
            </div>
        </div>

        <!-- Sidemenu -->
        <div id="sidebar-menu" class="mt-4">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title text-white">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect text-white">
                        <i class="ri-dashboard-line text-white"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title text-white mt-4">Pages</li>

                <!-- Authentication Dropdown -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect text-white">
                        <i class="ri-account-circle-line text-white"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html" class="text-white">Login</a></li>
                        <li><a href="auth-register.html" class="text-white">Register</a></li>
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

