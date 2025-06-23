<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SRMS | Student Result Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{asset('https://cdn-icons-png.flaticon.com/128/18416/18416361.png')}}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center" style="background-image: url({{ asset('uploads/admin_login.jpeg') }}); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 bg-white shadow-2xl rounded-3xl p-10 w-full max-w-lg">
        <!-- Logo -->
        <div class="text-center mb-6">
            <i class="fa fa-graduation-cap text-purple-600" style="font-size: 3rem;"></i>
        </div>
        <h2 class="text-center text-3xl font-extrabold text-gray-800 mb-4">Student Result Management System</h2>
        <p class="text-center text-gray-500 mt-2 font-bold flex items-center justify-center">
            <i class="bi bi-person-lines-fill mr-2"></i> Admin Login
        </p>
        <p class="text-center text-gray-500 mb-8 max-w-lg mx-auto">Enter your username and password to log in to the admin dashboard and manage the system.</p>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf
            <!-- Username -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <div class="relative">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa fa-user text-purple-600"></i></span>
                        <input type="text" class="form-control w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 p-3 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your username" required>
                    </div>
                </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa fa-lock text-purple-600"></i></span>
                        <input type="password" class="form-control w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 p-3 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Forgot Password -->
            <div class=" text-right mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-familymart hover:underline text-purple-600">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="d-grid mt-6">
                <button type="submit" class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 flex items-center justify-center">
                    <i class="fa fa-sign-in-alt mr-2 text-white"></i> Log In
                </button>
            </div>
        </form>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>