$(function() {
    categoriesTable = () => {
        categories = {
            url: BASE_URL + "category/showcategories?page=" + PAGE,
            dataType: "json",
            success: function(res) {
                $("#table-articles tbody").html("");
                if (res.status == 1) {
                    let r = 1;
                    res.categories.map(function(category) {
                        if (!category.image) {
                            image = BASE_URL + 'img/avatar1.png';
                        } else {
                            image = BASE_URL + 'uploads/category_images/' + category.image;
                        }
                        $("#table-articles tbody").append(`<tr>
                <th>${r}</th>
                <td><img src="${image}" width="80px" alt="not found"> </td>
                <td> ${category.category} </td >
                <td><a class='fas fa-edit text-primary me-1' id='btn-edit' title="Edit category" uid=' ${category.id} '>
                <a  class='fas fa-trash text-danger me-1' id='btn-dlt' title="Delete category" uid=' ${category.id}'>
                </tr > `);
                        r++;
                    });
                }
            },
            erre: function(err) {},
        };
        $.ajax(categories);
    };
    categoriesTable();

    $(document).on("click", "#btn-dlt", function() {
        let id = $(this).attr("uid");
        $("#mdl-delete").modal("show");
        $("#delete-id").val(id);
    });

    $(document).on("click", "#btn-edit", function() {
        let id = $(this).attr("uid");
        $("#mdl-edit-category").modal("show");
        $("#category-id").val(id);
        let category = {
            url: BASE_URL + 'category/getCategory',
            dataType: "json",
            method: 'post',
            data: {
                'id': id,
            },
            success: function(res) {
                $("#category-img").attr('src', BASE_URL + 'uploads/category_images/' + res.details.image);
                $('#category-name').val(res.details.category);
            },
            error: function() {}
        }
        $.ajax(category);
    });

    $('.modal').on('hidden.bs.modal', function() {
        $('.error').next('label').hide();
        $(this).find('form').trigger('reset');
        $('form input').css('color', 'black');
    })

    $("#edit-icon").click(function() {
        $("#choose-img").click();
    })

    $(".category").hover(function() {
        $("#category-img").css('opacity', 0.1);
        $("#edit-icon").show();

    }, function() {
        $("#category-img").css('opacity', 1);
        $("#edit-icon").hide();
    });

    $("#choose-img").change(function() {
        var file = this.files[0];
        if (file) {
            $("#category-img").attr('src', URL.createObjectURL(file));
        }
    })

    $("#btn-add-category").click(function() {
        $("#mdl-add-category").modal("show");
    })

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
                    categoriesTable();
                    setTimeout(function() {
                        $("#success-msg").hide();
                    }, 3000);
                }
            },
            error: function(err) {},
        };
        $.ajax(dlt);
    });


    $("#frm-add-category").validate({
        rules: {
            name: {
                required: true,
            },
            image: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter a Category name",
            },
            image: {
                required: "Please choose a image for entered category"
            }
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            let form_data = new FormData(form);
            let add = {
                url: BASE_URL + "category/insertCategory",
                method: "post",
                dataType: "json",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res) {
                    $("#mdl-add-category").modal("hide");
                    $(".modal-backdrop").remove();
                    if (res.status == 1) {
                        $("#success-msg").html(res.msg);
                        $("#success-msg").show();
                        categoriesTable();
                        setTimeout(function() {
                            $("#success-msg").hide();
                        }, 3000);
                    }
                },
                error: function(err) {},
            };
            $.ajax(add);

        }
    });

    $("#frm-edit-category").validate({
        rules: {
            name: {
                required: true,
            },
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            let form_data = new FormData(form);
            let add = {
                url: BASE_URL + "category/updateCategory",
                method: "post",
                dataType: "json",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(res) {
                    $("#mdl-edit-category").modal("hide");
                    $(".modal-backdrop").remove();
                    if (res.status == 1) {
                        $("#success-msg").html(res.msg);
                        $("#success-msg").show();
                        categoriesTable();
                        setTimeout(function() {
                            $("#success-msg").hide();
                        }, 3000);
                    }
                },
                error: function(err) {},
            };
            $.ajax(add);

        }
    });

});