$(document).ready(function () {
    // Force download of file rather than going to page
    $(".download").on("click", function (event) {
        event.preventDefault();
        saveAs($(this).attr("href"), $(this).data("filename"));
    });
});