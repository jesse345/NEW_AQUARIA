<?php
include '../Model/db.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');



if (isset($_POST['pay'])) {
    $typeofpayment = $_POST['payment-gcash'];
    $amount = $_POST['amount'];
    $reference_no = $_POST['reference-no'];
    $receipt_img = $_FILES['receipt-img']['name'];

    $targetDir = "../img/";
    $target_file = $targetDir . basename($_FILES["receipt-img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["receipt-img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
        insertPayment(
            'payment',
            array('user_id', 'typeofpayment', 'receipt_img', 'amount', 'reference_no', 'date_created', 'order_id'),
            array($_SESSION['id'], $typeofpayment, $target_file, $amount, $reference_no, $date, $_GET['order_id'])
        );
        move_uploaded_file($_FILES['receipt-img']['tmp_name'], $target_file);
        updateOrderPayment($_GET['order_id']);
        echo '<script>alert s("Success!!!")</script>';
        header("Location: ../Pages/receipt.php?order_id=" . $_GET['order_id']);
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        echo '<script>alert("Failed!!!")</script>';
    }


}
?>