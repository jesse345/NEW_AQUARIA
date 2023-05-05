$(document).ready(function () {
  $("#cp").submit(function (e) {
    e.preventDefault();

    var current = $('input[name="current"]').val();
    var newPassword = $('input[name="newPassword"]').val();
    var confirmPassword = $('input[name="confirmPassword"]').val();
    var change = $('button[name="change"]').val();

    $.ajax({
      type: "POST",
      url: "../Controller/UsersController.php",
      data: {
        current: current,
        newPassword: newPassword,
        confirmPassword: confirmPassword,
        change: change,
      },
      success: function (response) {
        if (response === "change") {
          alert("Password Change Succesfully!");
          window.location.reload();
        }
        if (response == "Incorrect") {
          alert("Incorrect Password");
        }

        if (response == "Not Match") {
          alert("Password Didn't Match");
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
