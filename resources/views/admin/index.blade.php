@extends('admin.admin_dashboard')
@section('admin')

@php
    $totalStudent = count(App\Models\Student::all());
    $totalSubject = count(App\Models\Subject::all());
    $totalClasses = count(App\Models\classes::all());
    $totalResult = count(App\Models\Result::groupBy('student_id')->get()); // Counts the total number of unique students who have results by grouping the results by 'student_id'
@endphp

<div class="container-fluid">
    <!-- Page Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between py-3">
                <div class="flex-grow-1">
                    <h4 class="mb-sm-0 fw-600 text-primary">Dashboard Overview</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 mt-2">
                            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-muted">Education Portal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Analytics Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-title-right">
                    <div class="current-date bg-soft-primary rounded-3 p-2">
                        <i class="ri-calendar-todo-line me-2"></i>
                        <span id="date-display" class="fw-500"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <!-- Student Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Students</h6>
                            <h2 class="mb-0">{{ $totalStudent }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-primary">
                            <i class="ri-group-2-fill text-primary"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subject Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Subjects</h6>
                            <h2 class="mb-0">{{ $totalSubject }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-info">
                            <i class="ri-book-2-fill text-info"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-info" style="width: 60%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classes Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Classes</h6>
                            <h2 class="mb-0">{{ $totalClasses }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-warning">
                            <i class="ri-building-4-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-warning" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Results</h6>
                            <h2 class="mb-0">{{ $totalResult }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-success">
                            <i class="ri-file-chart-2-fill text-success"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-success" style="width: 90%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome card -->
    <div class="container py-1">
        <div class="card mx-auto shadow-lg rounded-4 position-relative card-decorator custom-card" 
            style="max-width: 900px; background: linear-gradient(to right, #6a1b9a, #9c27b0); padding: 40px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;">
            <div class="card-body text-center text-white" style="font-family: 'Quicksand', sans-serif;">
                <div class="mb-4">
                    <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mx-auto" style="width: 120px; height: 120px;">
                        <i class="bi bi-person-fill-check text-primary zoom-icon" style="font-size: 50px;"></i>
                    </div>
                </div>
                <h2 class="card-title display-4 mb-3" style="font-weight: 600; color: white; font-size: 2.75rem;">Welcome, {{ Auth::user()->name }}!</h2> <!-- Authenticated user: -->
                <p class="card-text fs-5 mb-4" style="font-weight: 400; font-size: 1.5rem;">The system is ready! Start managing student results and make your workflow easier</p>
            </div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fab-container">
        <button class="btn btn-primary btn-lg rounded-circle shadow-lg fab-button" data-bs-toggle="modal" data-bs-target="#supportModal">
            <i class="ri-customer-service-2-line fs-3"></i>
        </button>
    </div>

    <!-- Support Modal -->
    <div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header chill-bg text-white rounded-top-4">
                    <h5 class="modal-title" id="supportModalLabel">
                        <i class="ri-chat-help-fill me-2"></i>Support Center
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successMessage" class="text-center" style="display: none;">
                        <div class="success-check mb-3">
                            <i class="ri-checkbox-circle-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-success mb-3">Message Sent!</h4>
                        <p class="text-muted">Thank you for contacting us! We'll respond within 24 hours.</p>
                        <p class="text-muted mt-2">
                            <i class="ri-mail-line me-1"></i>support@example.com<br>
                            <i class="ri-phone-line me-1 mt-2"></i>+1 (555) 123-4567
                        </p>
                    </div>
                    
                    <form id="supportForm">
                        <div class="mb-3">
                            <label for="supportEmail" class="form-label">Your Email</label>
                            <input type="email" class="form-control form-control-lg" id="supportEmail" 
                                placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="supportSubject" class="form-label">Subject</label>
                            <select class="form-select form-select-lg" id="supportSubject" required>
                                <option value="">Select an issue</option>
                                <option>Technical Problem</option>
                                <option>Account Help</option>
                                <option>Feature Request</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="supportMessage" class="form-label">Message</label>
                            <textarea class="form-control form-control-lg" id="supportMessage" 
                                    rows="4" placeholder="How can we help you?" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="formFooter">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="supportForm" class="btn btn-primary">
                        <span id="submitText">Send Message</span>
                        <span id="loadingSpinner" class="spinner-border spinner-border-sm" style="display: none;"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection



