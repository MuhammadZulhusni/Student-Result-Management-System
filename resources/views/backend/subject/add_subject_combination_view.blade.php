@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Add Subject Combination</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Subject</a></li>
                        <li class="breadcrumb-item active">Combination</li>
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
                            Add a New Subject Combination
                        </h5>
                        <p class="text-muted">Fill in the details below to add a new subject and assign it to a class.</p>
                    </div>

                    <form action="{{ route('store.subject') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <!-- Class Dropdown -->
                            <label for="class" class="form-label fw-semibold">
                                <i class="ri-book-open-line me-2"></i>Class
                            </label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                    <i class="ri-book-2-line"></i>
                                </span>
                                <select class="form-select" name="class_id" aria-label="Select Class">
                                    <option selected="">-- Choose a Class --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="show_item">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Subject</label>
                                <div class="col-sm-7">
                                    <select name="subject_ids[]" class="form-select" aria-label="Default select example">
                                        <option selected="">-- Select subject --</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-success waves-effect waves-light add_subject_btn">Add More</button>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn fw-bold w-100 py-2 shadow" style="background-color: rgba(42, 10, 69); color: white;">
                                <i class="ri-file-list-3-line me-2"></i> Create Combination
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Template for Adding More Subjects -->
<div id="show_item_add" style="visibility: hidden">
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Subject</label>
        <div class="col-sm-7">
            <select name="subject_ids[]" class="form-select" aria-label="Default select example">
                <option selected="">-- Select subject --</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-danger waves-effect waves-light remove_subject_btn">Remove</button>
        </div>
    </div>
</div>

@endsection
