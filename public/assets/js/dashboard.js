$(function () {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on("click", function () {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on(
        "click",
        function () {
            $(".app-search").toggle(200);
            $(".app-search input").focus();
        }
    );

    // ==============================================================
    // Resize all elements
    // ==============================================================
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();

    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //****************************
    var setsidebartype = function () {
        var width =
            window.innerWidth > 0 ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);
});

/** confirm delete will be triggered as confirm box for every delete request **/
const confirmDelete = (callback) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You are about to delete this record",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        confirmButtonColor: "#ff2828",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.value) {
            callback();
        }
    });
};
function toastSuccess(msg) {
    toastr.success(msg);
}

function toastError(msg) {
    toastr.error(msg);
}

function removeRowFromTable(table, id) {
    $("#" + table + " tr#" + id).hide();
}

function showRowFromTable(table, id) {
    $("#" + table + " tr#" + id).show();
}

function alertifySuccess(msg) {
    Swal.fire("Success!", msg, "success");
}

function alertifySuccessAndRedirect(msg, redirect_url) {
    Swal.fire("Success!", msg, "success").then(function () {
        window.location = redirect_url;
    });
}

function alertifyError(msg) {
    Swal.fire("Oops!", msg, "error");
}

function loadPreview(input, id) {
    id = id || "#preview_img";
    if (input.files && input.files[0]) {
        $(id).closest(".image-preview-container").addClass("show");
        const reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
