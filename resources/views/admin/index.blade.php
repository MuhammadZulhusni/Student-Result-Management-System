@extends('admin.admin_dashboard')
@section('admin')

@php
    $totalStudent = count(App\Models\Student::all());
    $totalSubject = count(App\Models\Subject::all());
    $totalClasses = count(App\Models\Classe::all());
    $totalResult = count(App\Models\Result::groupBy('student_id')->get());
@endphp

<div class="container-fluid">
    <!-- Page Header Section with Animation -->
    <div class="row mb-4 animate__animated animate__fadeIn">
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
                    <div class="current-date bg-soft-primary rounded-3 p-2 shadow-sm hover-bounce">
                        <i class="ri-calendar-todo-line me-2"></i>
                        <span id="date-display" class="fw-500">{{ now()->format('F j, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards with Count-Up Animation -->
    <div class="row g-4 mb-4">
        <!-- Student Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm animate__animated animate__fadeInUp">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Students</h6>
                            <h2 class="mb-0 count-up" data-target="{{ $totalStudent }}">{{ $totalStudent }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-primary pulse-animation">
                            <i class="ri-group-2-fill text-primary"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" style="width: 0%" data-target="75"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subject Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm animate__animated animate__fadeInUp animate__delay-1s">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Subjects</h6>
                            <h2 class="mb-0 count-up" data-target="{{ $totalSubject }}">{{ $totalSubject }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-info pulse-animation">
                            <i class="ri-book-2-fill text-info"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: 0%" data-target="60"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Classes Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm animate__animated animate__fadeInUp animate__delay-2s">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Classes</h6>
                            <h2 class="mb-0 count-up" data-target="{{ $totalClasses }}">{{ $totalClasses }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-warning pulse-animation">
                            <i class="ri-building-4-fill text-warning"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width: 0%" data-target="85"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stat-card hover-lift-sm animate__animated animate__fadeInUp animate__delay-3s">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-uppercase text-muted mb-2">Results</h6>
                            <h2 class="mb-0 count-up" data-target="{{ $totalResult }}">{{ $totalResult }}</h2>
                        </div>
                        <div class="stat-icon bg-soft-success pulse-animation">
                            <i class="ri-file-chart-2-fill text-success"></i>
                        </div>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 0%" data-target="90"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome card with Floating Animation -->
    <div class="container py-1">
        <div class="card mx-auto shadow-lg rounded-4 position-relative card-decorator custom-card floating-card" 
            style="max-width: 900px; background: linear-gradient(to right, #6a1b9a, #9c27b0); padding: 40px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;">
            <div class="card-body text-center text-white" style="font-family: 'Quicksand', sans-serif;">
                <div class="mb-4">
                    <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mx-auto hover-grow" style="width: 120px; height: 120px;">
                        <i class="bi bi-person-fill-check text-primary zoom-icon" style="font-size: 50px;"></i>
                    </div>
                </div>
                <h2 class="card-title display-4 mb-3 animate__animated animate__fadeIn" style="font-weight: 600; color: white; font-size: 2.75rem;">Welcome, {{ Auth::user()->name }}!</h2>
                <p class="card-text fs-5 mb-4 animate__animated animate__fadeIn animate__delay-1s" style="font-weight: 400; font-size: 1.5rem;">The system is ready! Start managing student results and make your workflow easier</p>
                <a href="{{ route('create.class') }}">
                    <button class="btn btn-light btn-lg rounded-pill px-4 fw-medium hover-scale animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="bi bi-journal-plus me-2"></i>Let's create a Student Class
                    </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Floating Action Button with Pulse Animation -->
    <div class="fab-container">
        <button class="btn btn-primary btn-lg rounded-circle shadow-lg fab-button pulse" data-bs-toggle="modal" data-bs-target="#supportModal">
            <i class="ri-customer-service-2-line fs-3"></i>
        </button>
    </div>

    <!-- Support Modal with Animation -->
    <div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn">
            <div class="modal-content rounded-4">
                <div class="modal-header chill-bg text-white rounded-top-4">
                    <h5 class="modal-title" id="supportModalLabel">
                        <i class="ri-chat-help-fill me-2"></i>Support Center
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successMessage" class="text-center" style="display: none;">
                        <div class="success-check mb-3 animate__animated animate__bounceIn">
                            <i class="ri-checkbox-circle-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-success mb-3 animate__animated animate__fadeIn">Message Sent!</h4>
                        <p class="text-muted animate__animated animate__fadeIn animate__delay-1s">Thank you for contacting us! We'll respond within 24 hours.</p>
                        <p class="text-muted mt-2 animate__animated animate__fadeIn animate__delay-2s">
                            <i class="ri-mail-line me-1"></i>support@example.com<br>
                            <i class="ri-phone-line me-1 mt-2"></i>+1 (555) 123-4567
                        </p>
                    </div>
                    
                    <form id="supportForm">
                        <div class="mb-3">
                            <label for="supportEmail" class="form-label">Your Email</label>
                            <input type="email" class="form-control form-control-lg hover-grow" id="supportEmail" 
                                placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="supportSubject" class="form-label">Subject</label>
                            <select class="form-select form-select-lg hover-grow" id="supportSubject" required>
                                <option value="">Select an issue</option>
                                <option>Technical Problem</option>
                                <option>Account Help</option>
                                <option>Feature Request</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="supportMessage" class="form-label">Message</label>
                            <textarea class="form-control form-control-lg hover-grow" id="supportMessage" 
                                    rows="4" placeholder="How can we help you?" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" id="formFooter">
                    <button type="button" class="btn btn-secondary hover-scale" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="supportForm" class="btn btn-primary hover-scale">
                        <span id="submitText">Send Message</span>
                        <span id="loadingSpinner" class="spinner-border spinner-border-sm" style="display: none;"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
// Count-up animation for statistics
document.addEventListener('DOMContentLoaded', function() {
    // Animate numbers counting up
    const countUpElements = document.querySelectorAll('.count-up');
    const progressBars = document.querySelectorAll('.progress-bar');
    
    const animateCountUp = (element) => {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 1500;
        const step = target / (duration / 16);
        
        let current = 0;
        const increment = () => {
            current += step;
            if (current < target) {
                element.textContent = Math.floor(current);
                requestAnimationFrame(increment);
            } else {
                element.textContent = target;
            }
        };
        increment();
    };
    
    // Animate progress bars
    const animateProgressBars = (element) => {
        const targetWidth = element.getAttribute('data-target');
        element.style.width = targetWidth + '%';
    };
    
    // Intersection Observer to trigger animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('count-up')) {
                    animateCountUp(entry.target);
                }
                if (entry.target.classList.contains('progress-bar')) {
                    animateProgressBars(entry.target);
                }
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    countUpElements.forEach(element => observer.observe(element));
    progressBars.forEach(element => observer.observe(element));
    
    // Support form submission
    const supportForm = document.getElementById('supportForm');
    if (supportForm) {
        supportForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = document.querySelector('#supportForm button[type="submit"]');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const successMessage = document.getElementById('successMessage');
            
            // Show loading state
            submitText.textContent = 'Sending...';
            loadingSpinner.style.display = 'inline-block';
            
            // Simulate API call
            setTimeout(() => {
                // Hide form and show success message
                supportForm.style.display = 'none';
                document.getElementById('formFooter').style.display = 'none';
                successMessage.style.display = 'block';
                
                // Reset form after 5 seconds
                setTimeout(() => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('supportModal'));
                    modal.hide();
                    supportForm.reset();
                    supportForm.style.display = 'block';
                    document.getElementById('formFooter').style.display = 'block';
                    successMessage.style.display = 'none';
                    submitText.textContent = 'Send Message';
                    loadingSpinner.style.display = 'none';
                }, 5000);
            }, 2000);
        });
    }
});
</script>

<style>

/* Fade-in Animation */
@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hide Cards on Small Screens */
@media (max-width: 767px) {
    .custom-card {
        display: none !important;
    }
}

/* Zoom Animation */
@keyframes zoom {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

.zoom-icon {
    animation: zoom 4s infinite ease-in-out;
}

/* Base Styles */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 16px;
}

/* Hover Effects */
.hover-lift-sm:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.hover-scale:hover {
    transform: scale(1.05);
}

.hover-grow:hover {
    transform: scale(1.02);
}

.hover-bounce:hover {
    animation: bounce 0.5s;
}

/* Animations */
.floating-card {
    animation: floating 6s ease-in-out infinite;
}

.floating-text {
    animation: floating 3s ease-in-out infinite;
}

.pulse-animation {
    animation: pulse 2s infinite;
}

.pulse {
    animation: pulse 1.5s infinite;
}

.zoom-icon {
    transition: transform 0.3s ease;
}
.zoom-icon:hover {
    transform: scale(1.2);
}

@keyframes floating {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

/* Progress Bar Animation */
.progress-bar-animated {
    transition: width 1.5s ease-out;
}

/* Floating Action Button */
.fab-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
}

.fab-button {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.fab-button:hover {
    transform: scale(1.1) rotate(10deg);
}
</style>