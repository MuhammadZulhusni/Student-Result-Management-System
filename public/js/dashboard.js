document.addEventListener("DOMContentLoaded", function () {
    // Date Display
    const dateOptions = {
        weekday: "long", // Displays the full name of the day (e.g., Monday)
        year: "numeric", // Displays the full year (e.g., 2025)
        month: "long", // Displays the full month name (e.g., March)
        day: "numeric", // Displays the day of the month (e.g., 1)
    };
    document.getElementById("date-display").textContent =
        new Date().toLocaleDateString("en-US", dateOptions); // Formats and displays the current date

    // Form Validation
    const form = document.getElementById("supportForm");
    const successAlert = document.getElementById("successMessage");

    // Real-time Validation
    form.querySelectorAll(".form-control").forEach((input) => {
        input.addEventListener("input", () => {
            if (input.checkValidity()) { // Checks if input is valid based on HTML constraints
                input.classList.remove("is-invalid"); // Removes error styling if valid
            } else {
                input.classList.add("is-invalid"); // Adds error styling if invalid
            }
        });
    });
});

// Form Submission Event Listener
document.getElementById("supportForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevents default form submission behavior

    const submitBtn = document.querySelector('[type="submit"]');
    const submitText = document.getElementById("submitText");
    const spinner = document.getElementById("loadingSpinner");

    // Show loading state
    submitText.textContent = "Sending..."; // Updates button text to indicate processing
    spinner.style.display = "inline-block"; // Shows loading spinner
    submitBtn.disabled = true; // Disables the submit button to prevent multiple submissions

    // Simulate API call with a timeout
    setTimeout(() => {
        // Hide form elements upon success
        document.getElementById("supportForm").style.display = "none";
        document.getElementById("formFooter").style.display = "none";

        // Show success message
        document.getElementById("successMessage").style.display = "block";

        // Reset form and button state
        this.reset(); // Clears all input fields
        submitText.textContent = "Send Message"; // Resets button text
        spinner.style.display = "none"; // Hides loading spinner
        submitBtn.disabled = false; // Re-enables the submit button

        // Automatically close modal after 5 seconds
        setTimeout(() => {
            $("#supportModal").modal("hide"); // Hides the modal using jQuery
        }, 5000);
    }, 1500); // Simulates a delay of 1.5 seconds for API response
});

// Reset form when modal closes
$("#supportModal").on("hidden.bs.modal", function () {
    document.getElementById("supportForm").style.display = "block"; // Show form again
    document.getElementById("formFooter").style.display = "block"; // Show footer again
    document.getElementById("successMessage").style.display = "none"; // Hide success message
});

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