function base_url(uri) {
  return BASE_URL + uri;
}
$(function () {
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
        mobileExist: true,
      },
      email: {
        required: true,
        email: true,
        emailExist: true,
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
      },
    },
    submitHandler: function (form, event) {
      event.preventDefault();
      let register = {
        url: base_url('auth/register'),
        data: $("#frm-register").serialize(),
        method: "post",
        dataType: "json",
        success: function (res) {
          window.location = BASE_URL;
        },
        error: function (err) {
          console.log(err);
        },
      };
      $.ajax(register);
    },
  });

  $("#frm-login input").keyup(function () {
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
    submitHandler: function (form, event) {
      let login = {
        url: base_url("auth/login"),
        data: $("#frm-login").serialize(),
        method: "post",
        dataType: "json",
        success: function (res) {
          if (res.status == "1") {
            $("#login-err").hide();
            window.location = base_url("profile");
          } else {
            $("#login-err").html(res.message);
            $("#login-err").show();
          }
        },
        error: function (err) {
          console.log(err);
        },
      };
      $.ajax(login);
    },
  });
});
