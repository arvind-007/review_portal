$(function() {
    $("#frm-register").validate({
        rules: {
            fname: {
                required: true,
                minlength: 2,
            },
            lname: {
                required: true,
                minlength: 2,
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                mobileExist: true
            },
            email: {
                required: true,
                email: true,
                emailExist: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20,
            },
            cpassword: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            cpassword: {
                equalTo: "Password does not match",
            }
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            let register = {
                url: BASE_URL + "public/home/register",
                data: $("#frm-register").serialize(),
                method: "post",
                success: function(res) {
                    let result = JSON.parse(res);
                    window.location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            }
            $.ajax(register);
        }
    });

    $("#frm-login input").keyup(function() {
        $("#login-err").hide();
    });

    $("#frm-login").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        submitHandler: function(form, event) {
            let login = {
                url: "http://localhost/review_portal/app/Controllers/Home.php/login ",
                data: $("#frm-login").serialize(),
                method: "post",
                dataType: "json",
                success: function(res) {
                    if (res.status == "success") {
                        $("#login-err").hide();
                        window.location.reload();
                    } else {
                        $("#login-err").html(res.msg);
                        $("#login-err").show();
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            }
            $.ajax(login);
        }
    });
});