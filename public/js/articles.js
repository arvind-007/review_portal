<<<<<<< HEAD
$(function() {
    ArticlesTable = () => {
=======
$(function () {
    articlesTable = () => {
>>>>>>> e06db4f461fabce4c891e96dcff9aea433ae0fcd
        articles = {
            url: BASE_URL + "/article/showArticles",
            dataType: "json",
            success: function(res) {
                if (res.status == 1) {
                    $("#table-articles tbody").html("");
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
            erre: function(err) {

            }
        }
        $.ajax(articles);
    }
<<<<<<< HEAD
    ArticlesTable();


=======
    articlesTable();

    $(document).on('click', '#btn-dlt', function () {
        let id = $(this).attr('uid');
        $('#mdl-delete').modal('show');
        $('#delete-id').val(id);
    })

    $(document).on('click', '#btn-edit', function () {
        $('#sec-table').hide();
        $('#btn-add-article').hide();
        $('#btn-backtotable').show();
        $('#sec-edit').show();
        let id = $(this).attr('uid');
        let showdata = {
            url: BASE_URL + "/article/showArticleData",
            data: {
                "id": id,
            },
            method: "post",
            dataType: "json",
            success: function (res) {
                let a = res.articles[0].category_id;
                let b = res.articles[0].body;
                $("#title").val(res.articles[0].title);
                $("#tags").val(res.articles[0].tags);
                $("#category option[value=" + res.articles[0].category_id + "]").prop('selected', true);
                $("#art-body").val(res.articles[0].body);
                $("#uid").val(id);
            },
            error: function (err) {
                console.log(err);
            }
        }
        $.ajax(showdata);
    });

    $("#btn-backtotable").click(function () {
        window.location.reload();
    });

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
        }, messages: {
            // message
        }, submitHandler: function (form, event) {
            event.preventDefault();
            let edit = {
                url: BASE_URL + "/article/updatearticle",
                data: $(form).serialize(),
                method: "post",
                dataType: "json",
                success: function (res) {
                    if (res.status == 1) {
                        window.location.reload();
                    }
                },
                error: function (err) {
                    // console.log(err);
                }
            }
            $.ajax(edit);
        }
    });

    $("#frm-delete").submit(function () {
        let dlt = {
            url: BASE_URL + "/article/deleteArticle",
            method: "post",
            dataType: "json",
            data: $("#frm-delete").serialize(),
            success: function (res) {
                $("#mdl-delete").modal('hide');
                $('.modal-backdrop').remove();
                if (res.status == 1) {
                    $("#success-msg").html(res.msg);
                    $("#success-msg").show();
                    articlesTable();
                    setTimeout(function () {
                        $("#success-msg").hide();
                    }, 3000)
                }
            },
            error: function (err) {

            }
        };
        $.ajax(dlt);
    })
>>>>>>> e06db4f461fabce4c891e96dcff9aea433ae0fcd
});