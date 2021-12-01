$(function() {
    usersTable = () => {
        articles = {
            url: BASE_URL + "/users/showusers",
            dataType: "json",
            success: function(res) {
                $("#table-articles tbody").html("");
                if (res.status == 1) {
                    let r = 1;
                    res.users.map(function(user) {
                        let status;
                        if (user.status == 0) {
                            status = '<label class="badge bg-warning">Pending</label>'
                        } else if (user.status == 1) {
                            status = '<label class="badge bg-success">Active</label>'
                        } else if (user.status == 2) {
                            status = '<label class="badge bg-danger">Suspend</label>'
                        }
                        $("#table-articles tbody").append(`<tr>
                    <th>${r}</th>
                    <td> ${user.first_name} ${user.last_name}</td>
                    <td> ${user.email} </td >
                    <td> ${user.mobile} </td>
                    <td> ${status} </td>
                    <td><a class='fas fa-exclamation-circle text-danger me-1' id='btn-suspend' title="Suspend user" uid=' ${user.id} '>
                    <a  class='fas fa-trash text-danger me-1' id='btn-dlt' title="Delete user" uid=' ${user.id}'>
                    </tr > `);
                        r++;
                    });
                }
            },
            erre: function(err) {},
        };
        $.ajax(articles);
    };
    usersTable();

    $(document).on("click", "#btn-dlt", function() {
        let id = $(this).attr("uid");
        $("#mdl-delete").modal("show");
        $("#delete-id").val(id);
    });

    $(document).on("click", "#btn-suspend", function() {
        let dlt = {
            url: BASE_URL + "users/suspenduser",
            method: "post",
            dataType: "json",
            data: {
                'id': $(this).attr('uid'),
            },
            success: function(res) {
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


    $("#frm-delete").submit(function() {
        let dlt = {
            url: BASE_URL + "users/deleteuser",
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
})