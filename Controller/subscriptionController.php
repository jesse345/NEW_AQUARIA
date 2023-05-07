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


    createSubscription(
        'subscription',
        array('user_id', 'subscription_type', 'typeofpayment', 'amount', 'reference_number', 'receipt_img', 'status'),
        array($_SESSION['id'], $subsciption_type, $type, $amount, $ref, $img, "Pending")
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
    approveSubscription($_GET['subscription_id'], $date, $date_end, $_POST['user_id'], $number, 'Approved');
    sendNotif(
        'notification',
        array('user_id', 'isRead', 'date_send', 'redirect'),
        array($_POST['user_id'], 'No', $date, 'manageSubscription.php')
    );

    $last_id  = mysqli_insert_id($conn);
    sendNotif(
        'notification_details',
        array('notification_id', 'title', 'Description'),
        array($last_id, 'Approved Subscription', 'E-Aquaria Administrator Approved Your Subscription')
    );


    echo "<script>
        alert('Approved Subscription');
        window.location.href = '../admin/pages/subscription.php'
    </script>";
} else if (isset($_POST['extend'])) {
    $subscription_id = $_POST['subscription_id'];

    $quantity = $_POST['number_of_products'];
    $total = $_POST['amount'];

    $ref = $_POST['reference_number'];
    $receipt = $_POST['receipt_img'];

    createSubscription(
        'subscription_extensions',
        array('subscription_id', 'number_of_products', 'amount', 'receipt', 'reference_number', 'status', 'date'),
        array($subscription_id, $quantity, $total, $receipt, $ref, 'Pending', $date)
    );



    header("Location: " . $_SERVER['HTTP_REFERER']);
} else if (isset($_POST['extend_approve'])) {
    $id = $_GET['id'];

    $extension = mysqli_fetch_assoc(getUser('subscription_extensions', 'id', $id));
    $subscription = mysqli_fetch_assoc(getUser('subscription', 'subscription_id', $extension['subscription_id']));

    $total = $extension['number_of_products'] + $subscription['number_of_products'];


    editUser(
        'subscription',
        array('subscription_id', 'number_of_products', 'status'),
        array($subscription['subscription_id'], $total, 'Approved')

    );

    editUser('subscription_extensions', array('id', 'status'), array($id, 'Approved'));
    sendNotif(
        'notification',
        array('user_id', 'isRead', 'date_send', 'redirect'),
        array($subscription['user_id'], 'No', $date, 'manageSubscription.php')
    );

    $last_id  = mysqli_insert_id($conn);
    sendNotif(
        'notification_details',
        array('notification_id', 'title', 'Description'),
        array($last_id, 'Approved Subscription', 'E-Aquaria Administrator Approved Your Subscription Extension')
    );
    echo "<script>
        alert('Approved Subscription');
        window.location.href = '../admin/pages/extensions.php'
    </script>";
    // header("Location: " . $_SERVER['HTTP_REFERER']);
} else if (isset($_POST['subscription_disapprove'])) {


    $subscription = mysqli_fetch_assoc(getUser('subscription', 'subscription_id', $_GET['subscription_id']));

    editUser('subscription', array('subscription_id', 'status'), array($_GET['subscription_id'], 'Disapproved'));
    sendNotif(
        'notification',
        array('user_id', 'isRead', 'date_send', 'redirect'),
        array($subscription['user_id'], 'No', $date, 'manageSubscription.php')
    );

    $last_id  = mysqli_insert_id($conn);
    sendNotif(
        'notification_details',
        array('notification_id', 'title', 'Description'),
        array($last_id, 'Disapproved Subscription', 'E-Aquaria Administrator Disapproved Your Subscription')
    );
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
