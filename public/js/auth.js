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
                url: BASE_URL + "/auth/register",
                data: $("#frm-register").serialize(),
                method: "post",
                success: function(res) {
                    let result = JSON.parse(res);
                    // window.location.reload();
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
    jQuery.validator.addMethod("valid_name", function(value, element) {
        // allow any non-whitespace characters as the host part
        return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test(value);
    }, 'Please enter a valid email address.');
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
                url: "http://localhost/review_portal/public/auth/login",
                data: $("#frm-login").serialize(),
                method: "post",
                dataType: "json",
                success: function(res) {
                    if (res.status == "1") {
                        $("#login-err").hide();
                        window.location = "http://localhost/review_portal/public/dashboard/index";
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