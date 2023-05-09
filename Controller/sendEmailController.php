<?php

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
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
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
        $mail->Subject = 'E-Aquaria Verification Code';
        $mail->Body = "This is your verification code <b>$code</b> <br>This will expire in 2 minutes";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
