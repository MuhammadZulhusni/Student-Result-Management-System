document.addEventListener("DOMContentLoaded", function () {
    // Date Display
    const dateOptions = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    };
    document.getElementById("date-display").textContent =
        new Date().toLocaleDateString("en-US", dateOptions);

    // Form Validation
    const form = document.getElementById("supportForm");
    const successAlert = document.getElementById("successMessage");

    // Real-time Validation
    form.querySelectorAll(".form-control").forEach((input) => {
        input.addEventListener("input", () => {
            if (input.checkValidity()) {
                input.classList.remove("is-invalid");
            } else {
                input.classList.add("is-invalid");
            }
        });
    });
});

document.getElementById("supportForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const submitBtn = document.querySelector('[type="submit"]');
    const submitText = document.getElementById("submitText");
    const spinner = document.getElementById("loadingSpinner");

    // Show loading state
    submitText.textContent = "Sending...";
    spinner.style.display = "inline-block";
    submitBtn.disabled = true;

    // Simulate API call
    setTimeout(() => {
        // Hide form elements
        document.getElementById("supportForm").style.display = "none";
        document.getElementById("formFooter").style.display = "none";

        // Show success message
        document.getElementById("successMessage").style.display = "block";

        // Reset form and button
        this.reset();
        submitText.textContent = "Send Message";
        spinner.style.display = "none";
        submitBtn.disabled = false;

        // Auto-close after 5 seconds
        setTimeout(() => {
            $("#supportModal").modal("hide");
        }, 5000);
    }, 1500);
});

// Reset form when modal closes
$("#supportModal").on("hidden.bs.modal", function () {
    document.getElementById("supportForm").style.display = "block";
    document.getElementById("formFooter").style.display = "block";
    document.getElementById("successMessage").style.display = "none";
});
