$(function() {
    ArticlesTable = () => {
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
                        <td><a href='#' class='fas fa-edit me-1' id='btn-edit' uid=' ${art.id} '>
                        <a href='#' class='fas fa-trash text-danger me-1' id='btn-dlt' uid=' ${art.id}'>
                        <a href='#' class='fas fa-eye text-dark' id='btn-view' uid='${art.id}'></td>
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
    ArticlesTable();


});