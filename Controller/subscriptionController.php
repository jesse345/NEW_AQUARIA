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
        array('user_id', 'subscription_type', 'typeofpayment', 'amount', 'reference_number'),
        array($_SESSION['id'], $subsciption_type, $type, $amount, $ref)
    );
} else if (isset($_POST['subscription_approve'])) {

    $subsciption_type = $_POST['subscription_type'];

    if ($subsciption_type == 1) {
        $date_end = date('y-m-d h:i:s', strtotime($date . ' +3months'));
    } else if ($subsciption_type == 2) {
        $date_end = date('y-m-d h:i:s', strtotime($date . ' +6months'));
    } else if ($subsciption_type == 3) {
        $date_end = date('y-m-d h:i:s', strtotime($date . ' +1year '));
    }

    approveSubscription($_GET['subscription_id'], $date, $date_end, $_POST['user_id']);
}
