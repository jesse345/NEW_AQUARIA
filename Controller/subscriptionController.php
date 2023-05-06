<?php

date_default_timezone_set("Asia/Manila");
$date = date('y-m-d h:i:s');
session_start();

include("../Model/db.php");

if (isset($_POST['subscribe'])) {

    $subsciption_type = $_POST['subscription_type'];
    $amount = $_POST['amount'];
    $type = $_POST['typeofpayment'];
    $ref = $_POST['ref'];

    $targetDir = "../img/"; // Set target directory
    $fileType = pathinfo($_FILES['receipt_img']['name'], PATHINFO_EXTENSION);
    

    $img = $targetDir . basename($_FILES['receipt_img']['name']);
    move_uploaded_file($_FILES['receipt_img']['tmp_name'], $img);

    // $receipt_img = $_POST["receipt_img"];

    // if ($subsciption_type == 1) {
    //     $date_end = date('y-m-d h:i:s', strtotime($date . ' +3months'));
    // } else if ($subsciption_type == 2) {
    //     $date_end = date('y-m-d h:i:s', strtotime($date . ' +6months'));
    // } else if ($subsciption_type == 3) {
    //     $date_end = date('y-m-d h:i:s', strtotime($date . ' +1year '));
    // }

    createSubscription(
        'subscription',
        array('user_id', 'subscription_type', 'typeofpayment', 'amount', 'reference_number', 'receipt_img','status'),
        array($_SESSION['id'], $subsciption_type, $type, $amount, $ref, $img,"Pending")
    );



    header("Location: ../Pages/manageSubscription.php");
} else if (isset($_POST['subscription_approve'])) {
    $subsciption_type = $_POST['subscription_type'];


    $subsciption_type = $_POST['subscription_type'];

    if ($subsciption_type == 1) {
        $date_end = date('Y-m-d h:i:s', strtotime($date . ' +3months'));
        $number = 28;
    } else if ($subsciption_type == 2) {
        $date_end = date('Y-m-d h:i:s', strtotime($date . ' +6months'));
        $number = 58;
    } else if ($subsciption_type == 3) {
        $date_end = date('Y-m-d h:i:s', strtotime($date . ' +1year '));
        $number = "unlimited";
    }


    editUser('users', array('id', 'isSubscribe'), array($_POST['user_id'], "Yes"));
    approveSubscription($_GET['subscription_id'], $date, $date_end, $_POST['user_id'],$number,'Approved');

    echo "<script>
        alert('Approved Subscription');
        window.location.href = '../admin/pages/subscription.php'
    </script>";
}
