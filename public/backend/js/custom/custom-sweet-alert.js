/*
------------------------------------
    : Custom - Sweet Alerts js :
------------------------------------
*/
(function ($) {
    "use strict";
    /* -- Sweet Alert - Parameter -- */
    $("body").on("click", "#delete-alert", function () {
        let id = $(this).data("id");
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger m-l-10",
            buttonsStyling: false,
        }).then(
            function () {
                swal("Deleted!", "Your data has been deleted.", "success");
                document.getElementById("delete-form-" + id).submit();
            },
            function (dismiss) {
                if (dismiss === "cancel") {
                    swal(
                        "Cancelled",
                        "Your imaginary data is safe :)",
                        "error"
                    );
                }
            }
        );
    });
})(jQuery);
