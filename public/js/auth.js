function base_url(uri) {
  return BASE_URL + uri;
}
$(function () {
  var btn_register;
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
        beforeSend: function () {
          $("#btn-register").attr("disabled", true);
          btn_register = $("#btn-register").html();
          $("#btn-register").html(`<span class="fa-lg">
            <i class="fas fa-circle-notch fa-spin"></i>
        </span>`);
        },
        url: base_url("/auth/register"),
        data: $("#frm-register").serialize(),
        method: "post",
        dataType: "json",
        success: function (res) {
          window.location = BASE_URL;
        },
        complete: function () {
          $("#btn-register").attr("disabled", false).html(btn_register);
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
  var btn_login;
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
        url: base_url("/auth/login"),
        beforeSend: function () {
          $("#btn-login").attr("disabled", true);
          btn_login = $("#btn-login").html();
          $("#btn-login").html(`<span class="fa-lg">
              <i class="fas fa-circle-notch fa-spin"></i>
          </span>`);
        },
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
        complete: function () {
          $("#btn-login").attr("disabled", false).html(btn_login);
        },
        error: function (err) {
          console.log(err);
        },
      };
      $.ajax(login);
    },
  });
});
