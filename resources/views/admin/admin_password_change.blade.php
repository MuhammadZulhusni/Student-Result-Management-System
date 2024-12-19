@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid">
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 fw-bold text-uppercase">Admin's Password Change</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Password</a></li>
                        <li class="breadcrumb-item active">Change</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <hr class="my-4"> <!-- Horizontal line after the page title -->

    <!-- Profile Update Section -->
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card border-0" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-body p-5">
                    <!-- Card Header -->
                    <div class="mb-4 text-center">
                        <h4 class="card-title fw-bold text-uppercase mb-2" style="color: rgba(42, 10, 69);">
                            <i class="ri-lock-password-line me-2"></i> Update Admin's Password
                        </h4>
                        <p class="text-muted">Ensure your account is secure by regularly updating your password.</p>
                    </div>

                    <hr class="my-4"> <!-- Horizontal line after the card header -->

                    <form action="{{ route('admin.password.update') }}" method="POST"> <!-- Form to submit password update to 'admin.password.update' route -->
                        @csrf
                        <div class="row g-4">
                            <!-- Old Password Field -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold"><i class="ri-key-line me-2"></i>Old Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                        <i class="ri-lock-line"></i>
                                    </span>
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="Enter old password">
                                </div>
                                @error('old_password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- New Password Field -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold"><i class="ri-shield-keyhole-line me-2"></i>New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                        <i class="ri-lock-password-line"></i>
                                    </span>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Enter new password">
                                </div>
                                @error('new_password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold"><i class="ri-check-double-line me-2"></i>Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: rgba(42, 10, 69); color: white;">
                                        <i class="ri-lock-line"></i>
                                    </span>
                                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Re-enter new password">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-5">
                            <button type="submit" class="btn text-white fw-bold w-50 py-3" style="background-color: rgba(42, 10, 69);">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
