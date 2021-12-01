$(function() {


    CategoriesTable = () => {
        articles = {
            url: BASE_URL + "category/showcategories",
            dataType: "json",
            success: function(res) {
                $("#table-articles tbody").html("");
                if (res.status == 1) {
                    let r = 1;
                    res.categories.map(function(cateogry) {
                        $("#table-articles tbody").append(`<tr>
                <th>${r}</th>
                <td> ${cateogry.image} asdfdsdfasdfasdf</td>
                <td> ${cateogry.category} </td >
                <td><a class='fas fa-edit text-primary me-1' id='btn-suspend' title="Edit cateogry" uid=' ${cateogry.id} '>
                <a  class='fas fa-trash text-danger me-1' id='btn-dlt' title="Delete cateogry" uid=' ${cateogry.id}'>
                </tr > `);
                        r++;
                    });
                }
            },
            erre: function(err) {},
        };
        $.ajax(articles);
    };
    CategoriesTable();

    $(document).on("click", "#btn-dlt", function() {
        let id = $(this).attr("uid");
        $("#mdl-delete").modal("show");
        $("#delete-id").val(id);
    });

    $("#frm-delete").submit(function() {
        let dlt = {
            url: BASE_URL + "category/removecategory",
            method: "post",
            dataType: "json",
            data: $("#frm-delete").serialize(),
            success: function(res) {
                $("#mdl-delete").modal("hide");
                $(".modal-backdrop").remove();
                if (res.status == 1) {
                    $("#success-msg").html(res.msg);
                    $("#success-msg").show();
                    usersTable();
                    setTimeout(function() {
                        $("#success-msg").hide();
                    }, 3000);
                }
            },
            error: function(err) {},
        };
        $.ajax(dlt);
    });

});