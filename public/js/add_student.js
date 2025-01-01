function previewImage(event) {
    const reader = new FileReader();
    const preview = document.getElementById("imagePreview");
    const previewContainer = document.getElementById("imagePreviewContainer");

    reader.onload = function () {
        preview.src = reader.result;
        previewContainer.style.display = "block"; // Show the preview container
    };

    if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}
