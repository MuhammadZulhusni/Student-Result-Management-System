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
                    <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Username Field -->
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label"><i class="ri-user-line me-2"></i> Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;"><i class="ri-user-line"></i></span>
                                    <input type="text" class="form-control" id="username" name="name" value="{{$adminData->name}}">
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><i class="ri-mail-line me-2"></i> Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;"><i class="ri-mail-line"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$adminData->email}}">
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
                                @php
                                    $photo = $adminData->photo;
                                    $photoPath = public_path('uploads/admin_profiles/' . $photo);
                                    $imageUrl = (!empty($photo) && file_exists($photoPath)) 
                                        ? asset('uploads/admin_profiles/' . $photo) 
                                        : asset('uploads/no_image.png');
                                    $originalImage = $imageUrl;
                                @endphp

                                <div class="mt-3 text-center">
                                    <p class="text-muted mt-2">This is your current profile picture. Upload a new one to update.</p>
                                    <img id="ShowImage" src="{{ $imageUrl }}" alt="avatar-4" class="rounded avatar-md">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-4">
                            <button type="button" id="resetButton" class="btn btn-outline-secondary me-3">
                                <i class="ri-refresh-line me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn text-white waves-effect waves-light" style="background-color: rgba(42, 10, 69);">
                                <i class="ri-save-line me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /* SweetAlert Reset Form*/
    $(document).ready(function(){
        // Store original values
        const originalImage = "{{ $imageUrl }}";
        const originalName = "{{ $adminData->name }}";
        const originalEmail = "{{ $adminData->email }}";
        
        // Image preview functionality
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#ShowImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
        
        // Reset functionality
        $('#resetButton').click(function(){
            // Reset form fields
            $('#profileForm')[0].reset();
            
            // Reset image preview
            $('#ShowImage').attr('src', originalImage);
            
            // Manually reset name and email fields
            $('#username').val(originalName);
            $('#email').val(originalEmail);
            
            // Clear file input
            $('#image').val('');
            
            // Show success message with SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Reset Successful',
                text: 'All changes have been reverted to original values',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: 'white',
                iconColor: '#28a745',
                color: '#495057'
            });
        });

        // Display success messages from server
        @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ Session::get('success') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: 'white',
                iconColor: '#28a745',
                color: '#495057'
            });
        @endif
        
        // Display error messages from server
        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ Session::get('error') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: 'white',
                iconColor: '#dc3545',
                color: '#495057'
            });
        @endif
    });
</script>
@endsection