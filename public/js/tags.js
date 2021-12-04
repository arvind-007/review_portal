$(function() {

    tagsTable = () => {
        articles = {
            url: BASE_URL + "tag/showtags",
            dataType: "json",
            success: function(res) {
                $("#table-articles tbody").html("");
                if (res.status == 1) {
                    let r = 1;
                    res.tags.map(function(tag) {
                        $("#table-articles tbody").append(`<tr>
                <th>${r}</th>
                <td> ${tag.tag}</td>
                <td><a class='fas fa-edit text-primary me-1' id='btn-edit' title="Edit tag" uid=' ${tag.id} '>
                <a  class='fas fa-trash text-danger me-1' id='btn-dlt' title="Delete tag" uid=' ${tag.id}'>
                </tr > `);
                        r++;
                    });
                }
            },
            erre: function(err) {},
        };
        $.ajax(articles);
    };
    tagsTable();

    $('.modal').on('hidden.bs.modal', function() {
        $('.error').next('label').hide();
        $(this).find('form').trigger('reset');
        $('form input').css('color', 'black');
    })

    $(document).on("click", "#btn-dlt", function() {
        let id = $(this).attr("uid");
        $("#mdl-delete").modal("show");
        $("#delete-id").val(id);
    });

    $(document).on("click", "#btn-edit", function() {
        let id = $(this).attr("uid");
        $("#mdl-edit-tag").modal("show");
        $("#category-id").val(id);
        let category = {
            url: BASE_URL + 'tag/getTag',
            dataType: "json",
            method: 'post',
            data: {
                'id': id,
            },
            success: function(res) {
                $('#tag-name').val(res.name);
            },
            error: function() {}
        }
        $.ajax(category);
    });

    $("#btn-add-tag").click(function() {
        $("#mdl-add-tag").modal("show");
    })

    $("#frm-delete").submit(function() {
        let dlt = {
            url: BASE_URL + "tag/removetag",
            method: "post",
            dataType: "json",
            data: $("#frm-delete").serialize(),
            success: function(res) {
                $("#mdl-delete").modal("hide");
                $(".modal-backdrop").remove();
                if (res.status == 1) {
                    $("#success-msg").html(res.msg);
                    $("#success-msg").show();
                    tagsTable();
                    setTimeout(function() {
                        $("#success-msg").hide();
                    }, 3000);
                }
            },
            error: function(err) {},
        };
        $.ajax(dlt);
    });

    $("#frm-add-tag").validate({
        rules: {
            name: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter a tag name",
            },
        },
        submitHandler: function(form) {
            let add = {
                url: BASE_URL + "tag/Inserttag",
                method: "post",
                dataType: "json",
                data: $("#frm-add-tag").serialize(),
                success: function(res) {
                    $("#mdl-add-tag").modal("hide");
                    $(".modal-backdrop").remove();
                    if (res.status == 1) {
                        $("#success-msg").html(res.msg);
                        $("#success-msg").show();
                        tagsTable();
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

    $("#frm-edit-tag").validate({
        rules: {
            name: {
                required: true,
            },
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            let add = {
                url: BASE_URL + "tag/updatetag",
                method: "post",
                dataType: "json",
                data: $(form).serialize(),
                success: function(res) {
                    $("#mdl-edit-tag").modal("hide");
                    $(".modal-backdrop").remove();
                    if (res.status == 1) {
                        $("#success-msg").html(res.msg);
                        $("#success-msg").show();
                        tagsTable();
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