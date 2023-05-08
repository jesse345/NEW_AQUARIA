<?php

session_start();
include_once '../Model/db.php';
//Get the current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');


include("sendEmailController.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (mysqli_num_rows(login($username, $password)) > 0) {
        $auth = mysqli_fetch_assoc(login($username, $password));
        $_SESSION['id'] = $auth['id'];
        if ($auth['isVerified'] == "Yes") {
            $check = getUser('user_details', 'user_id', $_SESSION['id']);
            if (mysqli_num_rows($check) > 0) {
                echo "success";
            } else {
                echo "incomplete";
            }
        } else {
            echo "notVerified";
        }
        // header("location: ../");
    } else {
        echo "error";
        // header("location: ../Pages/login.php?message=Invalid Username or Password");
    }
}


//For Edit Account

if (isset($_POST['editAccount'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mi = $_POST['mi'];

    $targetDir = "../img/";
    $target_file = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        editUser(
            'user_details',
            array('user_id', 'first_name', 'last_name', 'mi','user_img'),
            array($_SESSION['id'], $first_name, $last_name, $mi,$target_file)
        );
        echo "<script>
            alert('Edit Successfully');
            window.location.href='../Pages/myAccount.php';
        </script>";
        // header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        echo '<script>alert("Failed!!!")</script>';
    } 
}

if (isset($_POST['editGcash'])) {
    $gcash_name = $_POST['gcash_name'];
    $gcash_number = $_POST['gcash_number'];

    editUser(
        'user_details',
        array(
            'user_id',
            'gcash_number',
            'gcash_name'
        ),
        array(
            $_GET['user_id'],
            $gcash_number,
            $gcash_name,
        )
    );
    echo "<script>
            alert('Edit Successfully');
            window.location.href='../Pages/gcash_info.php';
        </script>";
}

//For Edit Account Info
if (isset($_POST['editAccountInfo'])) {
    $contact_number = $_POST['contact_number'];
    $current = $_POST['address'];
    $email = $_POST['email'];
    editUser(
        'user_details',
        array(
            'user_id',
            'contact_number',
            'address',
        ),
        array(
            $_GET['id'],
            $contact_number,
            $current,
        )
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


//For Shipping Info
if (isset($_POST['editShippingInfo'])) {
    $contact_number = $_POST['shipping_contact'];
    $current = $_POST['shipping_address'];
    $name = $_POST['shipping_name'];
    editUser(
        'shipping_info',
        array(
            'user_id',
            'shipping_name',
            'shipping_address',
            'shipping_contact'
        ),
        array(
            $_GET['id'],
            $name,
            $current,
            $contact_number,
        )
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
}




//Change Password
if (isset($_POST['changePassword'])) {
    $user = mysqli_fetch_assoc(getUser('users', 'id', $_GET['id']));
    $current = $_POST['current_pass'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_pass'];


    if ($user['password'] != $current) {
        echo "Invalid Password";
    } else {
        if ($password != $confirm) {
            echo "Password doesnt match";
        } else {
            editUser('users', array('id', 'password'), array($_GET['id'], $password));
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}








//For register
if (isset($_POST['register'])) {
    $reg_username = $_POST['reg_username'];
    $reg_password = $_POST['reg_password'];
    $reg_confirm = $_POST['reg_confirm'];
    $reg_email = $_POST['email_address'];
    $checkUsername = getUser('users', 'username', $reg_username);
    $checkEmail = getUser('users', 'email_address', $reg_email);
    if (mysqli_num_rows($checkUsername) > 0) {
        echo "duplicateUsername";
    } else {
        if (mysqli_num_rows($checkEmail) > 0) {
            echo "duplicateEmail";
        } else {
            if ($reg_password == $reg_confirm) {

                $register = registerUser(
                    'users',
                    array('username', 'password', 'email_address', 'isVerified','isSubscribe'),
                    array($reg_username, $reg_password, $reg_email, "No","No")
                );
                $id = mysqli_insert_id($conn);

                $_SESSION['id'] = $id;

                $token = rand(10000, 99999);

                sendemail($reg_username, $reg_email, $token);
                $verification_code = verification_codes(
                    'verification_codes',
                    array('user_id', 'email_address', 'token', 'date_send'),
                    array($id, $reg_email, $token, $date)
                );
                echo "success";
            } else {
                echo "InvalidPassword";
            }
        }
    }
}

if (isset($_POST['verify'])) {

    $otp = $_POST['first'] . $_POST['second'] . $_POST['third'] . $_POST['fourth'] . $_POST['fifth'];
    $checkCode = mysqli_fetch_assoc(checkCode($_SESSION['id']));
    $checkExpire = strtotime($date) - strtotime($checkCode['date_send']);

    if ($otp == $checkCode['token']) {

        if ($checkExpire > 180) {
            echo "expire";
        } else {
            echo "success";

            $verified = editUser(
                'users',
                array('id', 'isVerified', 'date_verified'),
                array($_SESSION['id'], 'Yes', $date)
            );
        }
    } else {
        echo "error";
    }

    // echo $checkExpire;
}

if (isset($_POST['resend'])) {
    //Generate another 5 digit code
    $code = rand(10000, 99999);
    $reg_email = $_POST['reg_email'];
    $verification_code = verification_codes(
        'verification_codes',
        array('user_id', 'email_address', 'token', 'date_send'),
        array($_SESSION['id'], $reg_email, $code, $date)
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


if (isset($_POST['submitAccountForm'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mi = $_POST['mi'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $gcash = $_POST['gcash_number'];
    $gcash_name = $_POST['gcash_name'];




    registerUser(
        'user_details',
        array('user_id', 'first_name', 'last_name', 'mi', 'address_id', 'contact_number', 'gcash_number', 'gcash_name'),
        array($_SESSION['id'], $first_name, $last_name, $mi, $address, $contact_number, $gcash, $gcash_name)
    );

    $addr = mysqli_fetch_assoc(getUserAddress($address));

    insertShipping(
        'shipping_info',
        array('user_id', 'shipping_name', 'shipping_address', 'shipping_contact'),
        array($_SESSION['id'], $first_name . " " . $last_name, $addr['address'], $contact_number)
    );

    header("Location: ../");
}

if (isset($_POST['change'])) {
    $user = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
    $current = $_POST['current'];
    $new = $_POST['newPassword'];
    $confirm = $_POST['confirmPassword'];
    if ($current != $user['password']) {
        echo "Incorrect";
    } else {
        if ($new != $confirm) {
            echo "Not Match";
        } else {
            echo "change";
            editUser('users', array('id', 'password'), array($_SESSION['id'], $new));
        }
    }
}


//For Logout
if (isset($_POST['logout'])) {
    editUser(
        'users',
        array(
            'id',
            'isLoggedIn'
        ),
        array($_SESSION['id'], 'No')
    );
    session_destroy();
    header("Location: ../");
}
