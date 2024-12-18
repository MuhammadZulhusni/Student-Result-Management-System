<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SRMS | Student Result Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="auth-body-bg" style="background-image: url('https://static.canadianjourney.blog/images/jch-optimize/ng/images_high-school-graduation.webp'); background-size: cover; background-position: center;">
    <div class="bg-overlay"></div>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card border-0 shadow-lg rounded-3 w-100" style="max-width: 450px;">
            <div class="card-body p-4">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <i class="fa fa-graduation-cap text-primary" style="font-size: 3rem;"></i>
                    <h3 class="fw-bold mt-2">SRMS</h3>
                    <p class="text-muted fs-5">Student Result Management System</p>
                </div>

                <!-- Title -->
                <h5 class="text-center mb-4">Admin Login</h5>

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa fa-user text-primary"></i></span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your username" required>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa fa-lock text-primary"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="customCheck1">
                        <label class="form-check-label" for="customCheck1">Remember me</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-sign-in-alt me-2"></i> Log In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>
