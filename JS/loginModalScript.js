const regist = document.querySelector("#register-button");
const load = document.querySelector("#loading");
load.style.display = "none";

$(document).ready(function () {
  $("#loginForm").submit(function (e) {
    e.preventDefault();

    var username = $('input[name="username"]').val();
    var password = $('input[name="password"]').val();
    var login = $('button[name="login"]').val();

    $.ajax({
      type: "POST",
      url: "../Controller/UsersController.php",
      data: {
        username: username,
        password: password,
        login: login,
      },
      success: function (response) {
        if (response === "success") {
          alert("Login Succesfully!");
          location.reload();
        }
        if (response == "notVerified") {
          alert(
            "Your account is not verified. Verify it first to continue use E-Aquaria"
          );
          window.location.href = "../Pages/verifyAccount.php";
        }

        if (response == "incomplete") {
          alert("Wapaka kahuman ug fillup dol");
          window.location.href = "../Pages/accountDetailsForm.php";
        }

        if (response == "error") {
          alert("Invalid username or Password");
        }

        console.log(response);
      },
      error: function () {
        alert("Error logging in");
      },
    });
  });
  $("#registrationForm").submit(function (e) {
    e.preventDefault();
    var reg_username = $('input[name="reg_username"]').val();
    var reg_password = $('input[name="reg_password"]').val();
    var reg_confirm = $('input[name="reg_confirm"]').val();
    var email_address = $('input[name="email_address"]').val();
    var register = $('button[name="register"]').val();

    var unerr = document.getElementById("un-err");
    var emerr = document.getElementById("em-err");
    var pwerr = document.getElementById("pw-err");
    var un = document.getElementById("reg_username");
    var pw = document.getElementById("reg_password");
    var c = document.getElementById("reg_confirm");
    var em = document.getElementById("email_address");

    var reg = document.getElementById("register-button");

    regist.style.display = "none";
    load.style.display = "block";

    reg.addEventListener("click", function () {
      un.style.borderColor = "";
      pw.style.borderColor = "";
      c.style.borderColor = "";
      em.style.borderColor = "";

      emerr.innerHTML = "";
      pwerr.innerHTML = "";
      unerr.innerHTML = "";
    });

    $.ajax({
      type: "POST",
      url: "../Controller/UsersController.php",
      data: {
        reg_username: reg_username,
        reg_password: reg_password,
        reg_confirm: reg_confirm,
        email_address: email_address,
        register: register,
      },
      success: function (response) {
        if (response === "success") {
          window.location.href = "../Pages/verifyAccount.php";
          load.style.display = "none";
        }
        if (response === "duplicateUsername") {
          un.style.borderColor = "red";
          regist.style.display = "block";
          load.style.display = "none";
          unerr.innerHTML = "Username already exist";
        }
        if (response === "duplicateEmail") {
          em.style.borderColor = "red";
          regist.style.display = "block";
          load.style.display = "none";
          emerr.innerHTML = "Email address already exist!";
        }
        if (response === "InvalidPassword") {
          pw.style.borderColor = "red";
          c.style.borderColor = "red";
          regist.style.display = "block";
          load.style.display = "none";
          pwerr.innerHTML = "Password didn't match!";
        }

        console.log(response);
      },
      error: function () {
        alert("Error creating account");
      },
    });
  });
});
