@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Update Result</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Results</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-lg rounded">
                <div class="card-body p-5">
                    <div class="mb-4 text-center">
                        <h5 class="card-title fw-bold text-uppercase" style="color: #2A0A45;">
                            Update Student Result
                        </h5>
                        <p class="text-muted">Modify the details below to update the result.</p>
                    </div>

                    <form action="{{ route('update.result', $result[0]->id) }}" method="POST">
                        @csrf

                        <!-- Student Name -->
                        <div class="mb-4">
                            <label for="student_name" class="form-label fw-semibold">
                                <i class="ri-user-line me-2"></i>Student Name
                            </label>
                            <input type="text" id="student_name" name="student_name" 
                                class="form-control shadow-sm" 
                                value="{{ $result[0]->student->name }}" disabled> <!-- Sets the value of the input field to the name of the student from the first result and disables editing -->
                        </div>

                        <!-- Class and Section -->
                        <div class="mb-4">
                            <label for="class_section" class="form-label fw-semibold">
                                <i class="ri-community-line me-2"></i>Class & Section
                            </label>
                            <input type="text" id="class_section" name="class_section" 
                                class="form-control shadow-sm" 
                                value="{{ $result[0]->student->class->class_name }} - {{ $result[0]->student->class->section }}" disabled> <!-- Sets the value of the input field to the class name and section of the student from the first result and disables editing -->
                        </div>

                        <!-- Count the number of results in the $result array -->
                        @php
                            $count = count($result);
                        @endphp

                        <!-- Subjects -->
                        <div class="mb-4">
                            <label for="marks" class="form-label fw-semibold">
                                <i class="ri-book-line me-2"></i>Subjects and Marks
                            </label>
                            <div id="subject-list" class="border p-3 rounded">
                            <!-- Loop through each result in the $result array -->
                                @for ($i = 0; $i < $count; $i++)
                                <div class="d-flex align-items-center gap-3 p-3 mb-3 border border-gray-300 rounded shadow-sm">
                                    <div class="flex-grow-1">
                                        <h6 class="text-sm fw-semibold text-purple-700 mb-1">{{ $result[$i]->subject->subject_name }}</h6> <!-- Display the subject name of the current result -->
                                        <p class="text-xs text-muted">Enter marks for this subject</p>
                                    </div>
                                    <input type="hidden" name="result_ids[]" value="{{ $result[$i]->id }}">  <!-- Hidden input to store the result ID for updating -->
                                    <input type="hidden" name="subject_ids[]" value="{{ $result[$i]->subject->id }}">  <!-- Hidden input to store the subject ID of the current result -->
                                    <input type="number" name="marks[]" class="form-control w-25 shadow-sm" 
                                        placeholder="Marks (out of 100)" value="{{ $result[$i]->marks }}" required>  <!-- Input field for entering marks, pre-filled with the current result's marks -->
                                </div>
                                @endfor
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" 
                                style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="bi bi-save me-2"></i>Update Result
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
