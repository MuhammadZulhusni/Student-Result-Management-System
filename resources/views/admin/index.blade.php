@extends('admin.admin_dashboard')
@section('admin')

@php
    $totalStudent = count(App\Models\Student::all());
    $totalSubject = count(App\Models\Subject::all());
    $totalClasses = count(App\Models\classes::all());
    $totalResult = count(App\Models\Result::groupBy('student_id')->get());
@endphp

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Panel</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="text-muted mb-2">Total Students</p>
                        <h4>{{ $totalStudent }}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-user-3-line font-size-24"></i>
                        </span>
                    </div>
                </div>                                              
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="text-muted mb-2">Total Subjects</p>
                        <h4>{{ $totalSubject }}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-article-line font-size-24"></i>
                        </span>
                    </div>
                </div>                                            
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="text-muted mb-2">Total Classes</p>
                        <h4>{{ $totalClasses }}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-building-fill font-size-24"></i>
                        </span>
                    </div>
                </div>                                            
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow-lg rounded-3">
                <div class="card-body d-flex align-items-center">
                    <div class="flex-grow-1">
                        <p class="text-muted mb-2">Total Results</p>
                        <h4>{{ $totalResult }}</h4>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-file-list-3-line font-size-24"></i>
                        </span>
                    </div>
                </div>                                            
            </div>
        </div>
    </div>

    <!-- Card -->
    <div class="container py-3">
        <div class="card mx-auto shadow-lg rounded-4 position-relative card-decorator custom-card" 
            style="max-width: 900px; background: linear-gradient(to right, #6a1b9a, #9c27b0); padding: 40px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;">
            <!-- Card Body -->
            <div class="card-body text-center text-white" style="font-family: 'Quicksand', sans-serif;">
                
                <!-- Avatar and Icon -->
                <div class="mb-4">
                    <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mx-auto" style="width: 120px; height: 120px;">
                        <i class="bi bi-person-fill-check text-primary zoom-icon" style="font-size: 50px;"></i>
                    </div>
                </div>

                <!-- Text Content -->
                <h2 class="card-title display-4 mb-3" style="font-weight: 600; color: white; font-size: 2.75rem;">Welcome, {{ Auth::user()->name }}!</h2>
                <p class="card-text fs-5 mb-4" style="font-weight: 400; font-size: 1.5rem;">The system is ready! Start managing student results and make your workflow easier</p>
            </div>
        </div>
    </div>
</div>

@endsection
