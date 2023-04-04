<?php

session_start();
include_once '../Model/db.php';
//Get the current date and time
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

// For login

function sendemail($username, $email, $code)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'eaquariaofficial@gmail.com'; //SMTP username
        $mail->Password = 'fczbhjmbpmfcxdfm'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('eaquariaofficial@gmail.com', 'E-Aquaria Official');
        $mail->addAddress("$email", "$username"); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML

        $rand = rand();
        $mail->Subject = 'Here is the subject';
        $mail->Body = "This is the HTML message body <b>$code</b>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}




if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (mysqli_num_rows(login($username, $password)) > 0) {
        $auth = mysqli_fetch_assoc(login($username, $password));
        $_SESSION['id'] = $auth['id'];
        echo "success";
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
    editUser(
        'user_details',
        array('user_id', 'first_name', 'last_name', 'mi'),
        array($_GET['id'], $first_name, $last_name, $mi)
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
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


if (isset($_POST['verify'])) {
    $checkUserCode = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
    $otp = $_POST['first'] . $_POST['second'] . $_POST['third'] . $_POST['fourth'] . $_POST['fifth'];
    if ($checkUserCode['token'] == md5($otp)) {
        editUser(
            'users',
            array('id', 'isVerified', 'date_verified'),
            array($_SESSION['id'], 'Yes', $date)
        );
        header("Location: ../");
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['resend'])) {
    //Generate another 5 digit code
    $code = rand(10000, 99999);
    $user = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
    $user_det = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
    sendemail($user['username'], $user_det['email'], $code);
    editUser(
        'users',
        array(
            'id',
            'token',
        ),
        array($_SESSION['id'], md5($code))
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


//For register
if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mi = $_POST['mi'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact_number = $_POST['contact_number'];
    $cpassword = $_POST['cpassword'];
    $email = $_POST['email'];

    $name = $_POST['first_name'] . " " . $_POST['last_name'];

    // $contact_number = $_POST['shipping_contact'];
    // $current = $_POST['shipping_address'];
    // $name = $_POST['shipping_name'];
    //Generate 5 digit code
    $code = rand(10000, 99999);


    if ($password != $cpassword) {
        echo "Invalid";
    } else if (mysqli_num_rows(getUser('users', 'username', $username))) {
        echo "Duplicate Username";
    } else {
        $user_flds = array('username', 'password', 'isVerified', 'isLoggedIn', 'token');
        $user_vals = array($username, $password, 'No', 'Yes', md5($code));
        $user_det_flds = array(
            'user_id',
            'first_name',
            'last_name',
            'mi',
            'address_id',
            'contact_number',
            'email'
        );
        $user_det_val = array($first_name, $last_name, $mi, $address, $contact_number, $email);
        $user = insertUser('users', $user_flds, $user_vals, 'user_details', $user_det_flds, $user_det_val);

        $auth = mysqli_fetch_assoc(login($username, $password));
        $_SESSION['id'] = $auth['id'];
        sendemail($username, $email, $code);


        $add = mysqli_fetch_assoc(getUserAddress($_SESSION['id']));

        $shipping = insertShipping(
            'shipping_info',
            array(
                'user_id',
                'shipping_name',
                'shipping_address',
                'shipping_contact'
            ),
            array(
                $_SESSION['id'],
                $name,
                $add['address'],
                $contact_number,
            )
        );
        header("location: ../Pages/verifyAccount.php");
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
