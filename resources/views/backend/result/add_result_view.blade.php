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
                                <select class="form-select" name="class_id" aria-label="Select Class">
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
                                <select class="form-select" name="student_id" aria-label="Select Student">
                                    <option selected>-- Select a Student --</option>
                                    <!-- Add options dynamically -->
                                </select>
                            </div>
                        </div>

                        <!-- Alert Message -->
                        <div class="mb-3">
                            <div class="alert alert-primary alert-dismissible fade show shadow-sm" role="alert">
                                <i class="ri-information-line me-2"></i>
                                This student's result is already declared!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>

                        <!-- Subjects and Marks -->
                        <div class="mb-3">
                            <label for="marks" class="form-label fw-semibold">
                                <i class="ri-book-line me-2"></i>Subjects and Marks
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-edit-box-line"></i>
                                </span>
                                <input type="text" name="subject" class="form-control" value="English" readonly>
                                <input type="text" name="marks[]" class="form-control" placeholder="Enter marks out of 100" required>
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

@endsection
