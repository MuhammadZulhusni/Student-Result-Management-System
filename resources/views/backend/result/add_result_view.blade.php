@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Declare A Result</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Declare</a></li>
                        <li class="breadcrumb-item active">Result</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card border-0 shadow-lg rounded">
                <div class="card-body p-5">
                    <div class="mb-4 text-center">
                        <h5 class="card-title fw-bold text-uppercase" style="color: #2A0A45;">
                            Declare Student Result
                        </h5>
                        <p class="text-muted">Fill in the details to declare a result for the student.</p>
                    </div>

                    <form action="{{ route('store.subject') }}" method="POST">
                        @csrf

                        <!-- Class Selection -->
                        <div class="mb-3">
                            <label for="class_id" class="form-label fw-semibold">
                                <i class="ri-community-line me-2"></i>Class
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-community-fill"></i>
                                </span>
                                <select class="form-select dynamic" name="class_id" data-dependant="student">
                                    <option selected>-- Select a Class --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Student Selection -->
                        <div class="mb-3">
                            <label for="student_id" class="form-label fw-semibold">
                                <i class="ri-user-line me-2"></i>Student Name
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-user-fill"></i>
                                </span>
                                <select class="form-select" name="student_id" id="student">
                                    <option selected>-- Select a Student --</option>
                                    <!-- Add options dynamically -->
                                </select>
                            </div>
                        </div>

                        <!-- Alert Message -->
                        <div class="mb-3">
                            <div id="alert">

                            </div>
                        </div>

                        <!-- Subjects and Marks -->
                        <div class="mb-3 showSubjects">
                            <label for="marks" class="form-label font-semibold text-gray-700 text-lg flex items-center gap-2">
                                <i class="ri-book-line text-purple-600"></i> Subjects and Marks
                            </label>

                            <!-- Subject List -->
                            <div class="sub flex items-center gap-4 p-4 border border-gray-200 shadow-sm rounded-md mb-4">
                                <!-- Subject rows will be inserted here dynamically -->
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="ri-check-line me-2"></i>Declare Result
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
// Ensures the code runs only after the DOM is fully loaded
$(document).ready(function(){ 

// Initially hides elements with the 'showSubjects' class
$('.showSubjects').hide(); 

// Adds a 'change' event listener to elements with the 'dynamic' class
$('.dynamic').on('change', function (){
        // Retrieves the selected value of the changed element (class ID)
        let class_id = $(this).val(); 
        // Retrieves the 'dependant' data attribute from the changed element
        let dependant = $(this).data('dependant'); 
        // Retrieves the CSRF token for security purposes
        let _token = "{{ csrf_token() }}"; 
        $.ajax({
            // URL for the server-side route handling the AJAX request
            url: "{{ route('fetch.student') }}", 
            // HTTP method used for the request
            method: "GET", 
            // Expected data type for the response
            datatype: "json", 
            // Data sent to the server: class ID and CSRF token
            data: {class_id: class_id, _token: _token}, 
            success: function(result){
                // Callback function executed when the request is successful
                // Populate student dropdown with the received student data
                $('#student').html(result.students); 
                // Populate subject rows with the received subject data
                $('.showSubjects .sub').html(result.subjects.join('')); 
                // Show the subjects section once data is loaded
                $('.showSubjects').show(); 
            }
        });
    });
});

// Adds a 'change' event listener to the element with ID 'student'
$('#student').change(function(){
    // Gets the selected value (student ID) from the dropdown
    let student_id = $(this).val();

    // Sends an AJAX request to fetch the student's result
    $.ajax({
        // URL for the server-side route handling the request
        url: "{{ route('check.student.result')}}", 
        // HTTP method used for the request
        method: "GET", 
        // Expected data type for the response
        datatype: "json", 
        // Data sent to the server: student ID and CSRF token
        data: {student_id: student_id, _token: "{{csrf_token()}}"}, 
        // Callback function executed when the request is successful
        success: function(result){
            // Updates the element with ID 'alert' with the response result
            $('#alert').html(result); 
        }
    });
});
</script>
@endsection
