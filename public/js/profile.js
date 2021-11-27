$(function () {
    $("#btn-edit-profile").click(function () {
        $("#card-profile").hide();
        $("#change-photo").show();
        $("#btn-edit-profile").hide();
        $("#change-photo").show();
        $("#btn-back").show();
        $("#card-edit-profile").show();
    });

    $("#btn-change-pass").click(function () {
        $("#mdl-change-pass").modal("show");
    });

    $("#change-photo").click(function () {
        $("#choose-photo").click();
    })

    $("#choose-photo").change(function () {
        var file = this.files[0];
        if (file) {
            $("#profile-photo").attr('src', URL.createObjectURL(file));
        }
    })
    showProfile = () => {
        let profile = {
            url: BASE_URL + "profile/showProfile",
            data: {
                frm_name: "profile",
            },
            dataType: "json",
            method: "post",
            success: function (res) {
                if (res.status = 1) {
                    res.user_details[0]['first_name'] ? $("#fname").html(res.user_details[0]['first_name']) : false;
                    res.user_details[0]['last_name'] ? $("#lname").html(res.user_details[0]['last_name']) : false;
                    res.user_details[0]['email'] ? $("#email").html(res.user_details[0]['email']) : false;
                    res.user_details[0]['dob'] ? $("#dob").html(res.user_details[0]['dob']) : false;
                    res.user_details[0]['gender'] ? $("#gender").html(res.user_details[0]['gender']) : false;
                    res.user_details[0]['mobile'] != 0 ? $("#mobile").html(res.user_details[0]['mobile']) : false;
                    res.user_details[0]['address'] ? $("#address").html(res.user_details[0]['address']) : false;
                    res.user_details[0]['profile_photo'] ? $("#profile-photo").attr('src', BASE_URL + "/uploads/user_images/" + res.user_details[0]['profile_photo']) : false;

                    $("#i-fname").val(res.user_details[0]['first_name']);
                    $("#i-lname").val(res.user_details[0]['last_name']);
                    $("#i-dob").val(res.user_details[0]['dob']);
                    $("#i-email").val(res.user_details[0]['email']);
                    $("#profile-photo").val(res.user_details[0]['email']);
                    if (res.user_details[0]['gender'])
                        $("input[name=gender][value=" + res.user_details[0]['gender'] + "]").prop('checked', true);
                    $("#i-mobile").val(res.user_details[0]['mobile']);
                    $("#i-address").val(res.user_details[0]['address']);
                }
            },
            error: function (err) {
                console.log(err);
            }
        }
        $.ajax(profile);
    }
    showProfile();

    $("#frm-update").validate({
        rules: {
            fname: {
                required: true,
                minlength: 2,
            },
            lname: {
                required: true,
                minlength: 2,
            },
            email: {
                required: true,
                email: true,
                emailExist: true
            },
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                mobileExist: true
            },
        }, messages: {
            // message
        }, submitHandler: function (form, event) {
            event.preventDefault();
            let form_data = new FormData(form);
            let register = {
                url: BASE_URL + "/profile/updateProfile",
                data: form_data,
                method: "post",
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (res) {
                    window.location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            }
            $.ajax(register);
        }
    });


    $("#frm-change-pass").validate({
        rules: {
            password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 20,
            },
            cpassword: {
                required: true,
                equalTo: "#new_pass",
            },
        }, messages: {
            password: {
                required: "Current password must be required"
            },
            cpassword: {
                equalTo: "Password does not match",
            },
        }, submitHandler: function (form) {
            let changepass = {
                url: BASE_URL + "profile/changepass",
                data: $("#frm-change-pass").serialize(),
                method: "post",
                dataType: "json",
                success: function (res) {
                    if (res.status == 1) {
                        window.location.reload();
                    } else {
                        $("#pass-err").html(res.msg);
                        $("#pass-err").show();
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            }
            $.ajax(changepass);
        }
    });

})
