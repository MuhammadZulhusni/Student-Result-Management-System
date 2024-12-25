@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Edit Student Class</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active">Class</li>
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
                            Edit Student Class
                        </h5>
                        <p class="text-muted">Update the details of the existing student class and section.</p>
                    </div>

                    <form action="{{ route('update.class') }}" method="POST">
                        @csrf
                        <!-- Hidden input to store the class ID -->
                        <!-- This ensures the ID of the class being updated is sent with the form -->
                        <input type="hidden" name="id" value="{{ $class->id }}">
                        <div class="mb-3">
                            <!-- Class Name -->
                            <label for="className" class="form-label fw-semibold">
                                <i class="ri-pencil-line me-2"></i>Class Name
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-book-line"></i>
                                </span>
                                <input type="text" id="className" name="class_name" class="form-control" value="{{ $class->class_name }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Section -->
                            <label for="sectionName" class="form-label fw-semibold">
                                <i class="ri-layout-line me-2"></i>Section
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-grid-line"></i>
                                </span>
                                <input type="text" id="sectionName" name="section" class="form-control" value="{{ $class->section}}" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="bi bi-pencil-square m-2"></i>Update Class
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

