$(function() {
    $("#frm-article").validate({
        rules: {
            title: {
                required: true
            },
            tags: {
                required: true
            },
            category: {
                required: true
            },
            textbox: {
                required: true
            }
        },
        submitHandler: function(form, event) {
            let article = {
                url: BASE_URL + "article/addArticles",
                data: $("#frm-article").serialize(),
                method: "post",
                success: function(res) {
                    let result = JSON.parse(res);
                    window.location.reload();
                }
            }
            $.ajax(article);
        }
    })
})