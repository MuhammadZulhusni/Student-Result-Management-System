@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Student Admission</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Admission</li>
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
                            Student Admission
                        </h5>
                        <p class="text-muted">Fill in the details below to admit a new student.</p>
                    </div>

                    <form action="{{ route('store.student') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-4">
                            <label for="fullName" class="form-label fw-semibold">
                                <i class="ri-user-line me-2"></i>Full Name
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-user-fill"></i>
                                </span>
                                <input type="text" id="fullName" name="full_name" class="form-control" placeholder="Enter the student's full name" required>
                            </div>
                        </div>

                        <!-- Roll ID -->
                        <div class="mb-4">
                            <label for="rollID" class="form-label fw-semibold">
                                <i class="ri-barcode-line me-2"></i>Roll ID
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-barcode-box-line"></i>
                                </span>
                                <input type="text" id="rollID" name="roll_id" class="form-control" placeholder="Enter the student's Roll ID" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="ri-mail-line me-2"></i>Email Address
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-mail-fill"></i>
                                </span>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter the student's email address" required>
                            </div>
                        </div>

                        <!-- Class Selection -->
                        <div class="mb-4">
                            <label for="class" class="form-label fw-semibold">
                                <i class="ri-building-line me-2"></i>Choose a Class
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-building-2-fill"></i>
                                </span>
                                <select id="class" name="class" class="form-select" required>
                                    <option value="" disabled selected>-- Choose a Class --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-4">
                            <label for="dob" class="form-label fw-semibold">
                                <i class="bi-calendar-date me-2"></i>Date of Birth
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="bi-calendar"></i>
                                </span>
                                <input type="date" id="dob" name="dob" class="form-control" required>
                            </div>
                        </div>

                        <!-- Photo Upload with Preview -->
                        <div class="mb-4">
                            <label for="photo" class="form-label fw-semibold">
                                <i class="bi-image me-2"></i>Upload Photo
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="bi-camera"></i>
                                </span>
                                <!-- File input for uploading an image, only accepts image files. Calls previewImage(event) function when a file is selected. -->
                                <input type="file" id="photo" name="photo" class="form-control" accept="image/*" onchange="previewImage(event)" required>
                            </div>
                        </div>

                        <!-- Image Preview Section -->
                        <div class="mb-4 text-center" id="imagePreviewContainer" style="display: none;">
                            <p><strong>Image Preview:</strong></p>
                            <img id="imagePreview" src="" alt="Photo Preview" style="max-width: 100%; height: auto; border-radius: 8px;">
                        </div>

                        <!-- Gender -->
                        <div class="mb-4">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-person-standing me-2"></i>Gender
                        </label>
                            <div class="form-check d-flex align-items-center gap-2" style="margin-left: 20px;">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" checked>
                                <i class="ri-men-line" style="color: #2A0A45;"></i>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check d-flex align-items-center gap-2 mt-2" style="margin-left: 20px;">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                                <i class="ri-women-line" style="color: #2A0A45;"></i>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="bi bi-plus-circle me-2"></i>Admit Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
