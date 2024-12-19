@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Admin's Profile</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <hr> <!-- Horizontal line after the page title -->

    <!-- Profile Update Section -->
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <h4 class="card-title mb-2"><i class="ri-user-3-line me-2"></i> Update Admin Profile</h4>
                        <p class="text-muted mb-0">Manage your personal information and keep it up-to-date.</p>
                    </div>

                    <hr> <!-- Horizontal line after the card header -->

                    <!-- Submits the form data (including file uploads) to the 'admin.profile.update' route for processing -->
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Username Field -->
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label"><i class="ri-user-line me-2"></i> Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;"><i class="ri-user-line"></i></span>
                                    <input type="text" class="form-control" id="username" name="name" value="{{$adminData->name}}"> <!-- Input field for the admin's name, pre-filled with the current name from $adminData -->
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><i class="ri-mail-line me-2"></i> Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;"><i class="ri-mail-line"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$adminData->email}}"> <!-- Input field for the admin's email address, pre-filled with the current email from $adminData -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Photo Upload -->
                            <div class="col-md-12 mb-3">
                                <label for="photo" class="form-label"><i class="ri-image-line me-2"></i> Profile Photo</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;"><i class="ri-image-line"></i></span>
                                    <input type="file" class="form-control" id="image" name="photo">
                                </div> 

                                <!-- Image Preview -->
                                <!-- Displays the admin's profile picture. If no picture is available, a default 'no_image.png' is shown. -->
                                <div class="mt-3 text-center">
                                    <img id="ShowImage" src="{{ empty($adminData->photo)? asset('uploads/no_image.png') : asset('uploads/admin_profiles/' .$adminData->photo) }}" alt="avatar-4" class="rounded avatar-md">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn text-white w-50 waves-effect waves-light" style="background-color: rgba(42, 10, 69);">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
