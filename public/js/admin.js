$(function () {

    $("#btn-logout").click(function (event) {
        window.location = BASE_URL + "public/admin/logOut";
    });

    $("#btn-add").click(function (event) {
        $("#mdl-add").modal("show");
    });

});