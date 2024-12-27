@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Subject Editing</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Subject</a></li>
                        <li class="breadcrumb-item active">Editing</li>
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
                            Edit Subject
                        </h5>
                        <p class="text-muted">Modify the details of the subject below.</p>
                    </div>

                    <form action="{{ route('update.subject') }}" method="POST">
                        @csrf
                        <!-- Hidden input to store the subject ID -->
                        <!-- This ensures the ID of the subject being updated is sent with the form -->
                        <input type="hidden" name="id" value="{{ $subject->id }}">
                        <div class="mb-3">
                            <!-- Subject Name -->
                            <label for="subjectName" class="form-label fw-semibold">
                                <i class="ri-book-open-line me-2"></i>Subject Name
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-book-2-line"></i>
                                </span>
                                <input type="text" id="subjectName" name="subject_name" class="form-control" value="{{ $subject->subject_name }}" placeholder="Enter the subject name, e.g., Mathematics" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Subject Code -->
                            <label for="subject_code" class="form-label fw-semibold">
                                <i class="ri-barcode-box-line me-2"></i>Subject Code
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-barcode-line"></i>
                                </span>
                                <input type="text" id="subject_code" name="subject_code" class="form-control" value="{{ $subject->subject_code }}" placeholder="Enter a unique code, e.g., MATH101" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="ri-save-line me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
