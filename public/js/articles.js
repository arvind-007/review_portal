import Tags from "./select.tags.js";
$(function() {
    var articlesTable = () => {
        var articles = {
            url: BASE_URL + "/article/showArticles?page=" + PAGE,
            dataType: "json",
            success: function(res) {
                $("#table-articles tbody").html("");
                if (res.status == 1) {
                    let r = 1;
                    res.articles.map(function(art) {
                        $("#table-articles tbody").append(`<tr>
                        <th>${r}</th>
                        <td> ${art.title}</td>
                        <td> ${art.category} </td >
                        <td> ${art.created_at} </td>
                        <td><a class='fas fa-edit me-1' id='btn-edit' uid=' ${art.id} '>
                        <a  class='fas fa-trash text-danger me-1' id='btn-dlt' uid=' ${art.id}'>
                        <a  class='fas fa-eye text-dark' id='btn-view' uid='${art.id}'></td>
                        </tr > `);
                        r++;
                    });
                }
            },
            erre: function(err) {},
        };
        $.ajax(articles);
    };
    articlesTable();

    $(document).on("click", "#btn-dlt", function() {
        let id = $(this).attr("uid");
        $("#mdl-delete").modal("show");
        $("#delete-id").val(id);
    });

    $(document).on("click", "#btn-view", function() {
        $("#sec-table").hide();
        $("#btn-add-article").hide();
        $("#btn-backtotable").show();
        $("#sec-view").show();
        let id = $(this).attr("uid");
        let showdata = {
            url: BASE_URL + "article/showArticleData",
            data: {
                id: id,
            },
            method: "post",
            dataType: "json",
            success: function(res) {
                $("#view-title").html(res.articles[0].title);
                $("#view-tags").html(res.articles[0].tags);
                $("#view-category").html(res.articles[0].category);
                $("#view-body").html(res.articles[0].body);
            },
            error: function(err) {
                console.log(err);
            },
        };
        $.ajax(showdata);
    });

    $(document).on("click", "#btn-edit", function() {
        $("#sec-table").hide();
        $("#btn-add-article").hide();
        $("#btn-backtotable").show();
        $("#sec-edit").show();
        let id = $(this).attr("uid");
        let showdata = {
            url: BASE_URL + "article/showArticleData",
            data: {
                id: id,
            },
            method: "post",
            dataType: "json",
            success: function(res) {
                $("#title").val(res.articles[0].title);
                console.log(res.articles[0].tags);
                var optionsToSelect = (res.articles[0].tags).split(",");
                console.log(optionsToSelect);
                optionsToSelect.map((itm) => {
                    $("#tags option[value=" + itm + "]").attr(
                        "selected",
                        true
                    );
                });
                Tags.init();
                $("#category option[value=" + res.articles[0].category_id + "]").prop(
                    "selected",
                    true
                );
                editor1.setHTMLCode(res.articles[0].body);
                $("#uid").val(id);
            },
            error: function(err) {
                console.log(err);
            },
        };
        $.ajax(showdata);
    });

    $("#btn-backtotable").click(function() {
        window.location.reload();
    });

    $("#insert-xml").click(function() {
        $("#mdl-add-xml").modal("show");
    });

    $("#frm-add-article").validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
            },
            category: {
                required: true,
            },
            body: {
                required: true,
                minlength: 100,
            },
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            let article = {
                url: BASE_URL + "article/addArticle",
                data: $(form).serialize(),
                dataType: "json",
                method: "post",
                success: function(res) {
                    window.location = BASE_URL + "article";
                }
            }
            $.ajax(article);
        }
    })

    $("#frm-edit-article").validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
            },
            tags: {
                required: true,
                minlength: 3,
            },
            category: {
                required: true,
            },
            body: {
                required: true,
                minlength: 100,
            },
        },
        messages: {
            // message
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            let edit = {
                url: BASE_URL + "/article/updatearticle",
                data: $(form).serialize(),
                method: "post",
                dataType: "json",
                success: function(res) {
                    if (res.status == 1) {
                        window.location.reload();
                    }
                },
                error: function(err) {
                    // console.log(err);
                },
            };
            $.ajax(edit);
        },
    });

    $("#frm-delete").submit(function() {
        let dlt = {
            url: BASE_URL + "/article/deleteArticle",
            method: "post",
            dataType: "json",
            data: $("#frm-delete").serialize(),
            success: function(res) {
                $("#mdl-delete").modal("hide");
                $(".modal-backdrop").remove();
                if (res.status == 1) {
                    $("#success-msg").html(res.msg);
                    $("#success-msg").show();
                    articlesTable();
                    setTimeout(function() {
                        $("#success-msg").hide();
                    }, 3000);
                }
            },
            error: function(err) {},
        };
        $.ajax(dlt);
    });

    $("#frm-add-xml").submit(function(event) {
        event.preventDefault();
        let form_data = new FormData(this);
        console.log(form_data);
        let add = {
            url: BASE_URL + "article/addxmlfile",
            method: "post",
            dataType: "json",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(res) {
                $("#mdl-add-xml").modal("hide");
                $(".modal-backdrop").remove();
                if (res.status == 1) {
                    // $("#success-msg").html(res.msg);
                    // $("#success-msg").show();
                    // categoriesTable();
                    // setTimeout(function() {
                    //     $("#success-msg").hide();
                    // }, 3000);
                    window.location = BASE_URL + "article";
                }
            },
            error: function(err) {},
        };
        $.ajax(add);
    })



});