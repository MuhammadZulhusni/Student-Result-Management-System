$(document).ready(function () {
    // Store the hidden item template
    let add_subject = $("#show_item_add").html();

    // Add new subject row on button click
    $(".add_subject_btn").click(function (e) {
        e.preventDefault();
        // Append the subject input row to the show_item div
        $(".show_item").append(add_subject);
    });

    // Remove subject row when the remove button is clicked
    $(document).on("click", ".remove_subject_btn", function (e) {
        e.preventDefault();
        // Remove the parent row of the clicked button
        $(this).closest(".row").remove();
    });
});
