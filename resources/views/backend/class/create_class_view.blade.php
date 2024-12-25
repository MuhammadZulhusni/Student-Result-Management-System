@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Create Student Classes</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Create</a></li>
                        <li class="breadcrumb-item active">Classes</li>
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
                            Create Student Class
                        </h5>
                        <p class="text-muted">Fill in the details to add a new student class and section.</p>
                    </div>

                    <form action="{{ route('store.class') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <!-- Class Name -->
                            <label for="className" class="form-label fw-semibold">
                                <i class="ri-pencil-line me-2"></i>Class Name
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-book-line"></i>
                                </span>
                                <input type="text" id="className" name="class_name" class="form-control" placeholder="Eg: First, Second, Third" required>
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
                                <input type="text" id="sectionName" name="section" class="form-control" placeholder="Eg: A, B, C" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="bi bi-plus-square me-2"></i>Create Class
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
