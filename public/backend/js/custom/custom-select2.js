$(".multiple-select").select2();
$(".single-select").select2();
$(".modal").on("shown.bs.modal", function () {
    var id = $(this).attr("id");
    $(".single-select").select2({
        dropdownParent: $("#" + id),
    });
});
