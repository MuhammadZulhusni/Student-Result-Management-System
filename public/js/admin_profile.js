$(document).ready(function () {
    $("#image").on("change", function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#ShowImage").attr("src", e.target.result);
        };
        reader.readAsDataURL(e.target.files["0"]);
    });
});
