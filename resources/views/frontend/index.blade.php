<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SRMS | Student Result Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('https://cdn-icons-png.flaticon.com/128/18416/18416361.png')}}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://cdn.jsdelivr.net/npm/lucide@latest"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center">

    <div class="absolute inset-0" style="background-image: url('https://wallpapercrafter.com/desktop1/611645-accomplishment-ceremony-education-graduation-group.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>
    <div class="relative z-10 bg-white shadow-2xl rounded-3xl p-6 sm:p-10 w-full sm:max-w-lg">
        <div class="text-center">
            <i class="fa fa-graduation-cap text-purple-600 mb-4" style="font-size: 3rem;"></i>
        </div>
        <h2 class="text-center text-2xl sm:text-3xl font-extrabold text-gray-800">Student Result Management System</h2>
        <p class="text-center text-gray-500 mt-2">View your academic results by entering your details below</p>

        <form method="POST" action="" class="mt-8 space-y-6">
            <!-- Student Roll ID -->
            <div>
                <label for="roll_id" class="block text-sm font-medium text-gray-700 mb-2">Student Roll ID</label>
                <div class="relative">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa fa-user text-purple-600"></i></span>
                        <input type="text" name="roll_id" id="roll_id" required
                            class="form-control w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 p-3"
                            placeholder="Enter your Roll ID">
                    </div>
                </div>
            </div>
            <!-- Student Class -->
            <div>
                <label for="class_id" class="block text-sm font-medium text-gray-700 mb-2">Student Class</label>
                <div class="relative">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa fa-chalkboard-teacher text-purple-600"></i></span>
                        <select name="class_id" id="class_id" required
                            class="form-control w-full border-gray-300 rounded-lg shadow-sm focus:ring-purple-500 focus:border-purple-500 p-3">
                            <option value="" disabled selected>Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit"
                    class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 flex items-center justify-center">
                    <i class="fa fa-check-circle mr-2"></i> 
                    View Results
                </button>
            </div>
        </form>
    </div>

    <footer class="absolute bottom-4 text-center w-full text-gray-400 text-sm">
        &copy; 2024 SRMS. All rights reserved.
    </footer>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        const type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

        // Initialize Lucide Icons
        lucide.createIcons();
    </script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>

</html>