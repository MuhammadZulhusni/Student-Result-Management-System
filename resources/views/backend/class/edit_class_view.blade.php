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

    <hr class="my-4"> <!-- Horizontal line after page title -->

    <!-- Form Section -->
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card border-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <div class="card-body p-4">
                    <div class="mb-4 text-center">
                        <h5 class="card-title fw-bold text-uppercase mb-2" style="color: #2A0A45;">
                            <i class="ri-pencil-line me-2"></i>Edit Student Class
                        </h5>
                        <p class="text-muted mb-0">Update the details of the existing student class and section.</p>
                    </div>

                    <!-- Form to submit the updated class details -->
                    <!-- The form action points to the 'update.class' route -->
                    <form action="{{ route('update.class') }}" method="POST">
                        @csrf
                        <!-- Hidden input to store the class ID -->
                        <!-- This ensures the ID of the class being updated is sent with the form -->
                        <input type="hidden" name="id" value="{{ $class->id }}">
                        <div class="row g-3">
                            <!-- Class Name -->
                            <div class="col-md-12">
                                <label for="class_name" class="form-label fw-semibold">
                                    <i class="ri-bookmark-line me-2"></i>Class Name
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                        <i class="ri-book-line"></i>
                                    </span>
                                    <!-- Displays the current class name for editing -->
                                    <input 
                                        type="text" 
                                        id="className" 
                                        name="class_name" 
                                        class="form-control" 
                                        value="{{ $class->class_name }}"  
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Section -->
                            <div class="col-md-12">
                                <label for="section" class="form-label fw-semibold">
                                    <i class="ri-layout-line me-2"></i>Section
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                        <i class="ri-grid-line"></i>
                                    </span>
                                    <!-- Displays the current section for editing -->
                                    <input 
                                        type="text" 
                                        id="sectionName" 
                                        name="section" 
                                        class="form-control" 
                                        value="{{ $class->section }}" 
                                        required
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-50 py-2" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="bi bi-pencil-square me-2"></i>Update Class
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
