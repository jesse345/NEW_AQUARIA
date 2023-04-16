<?php
include '../Model/db.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');

if (isset($_POST['review'])) {
    $fld = array('user_id', 'product_id', 'rate', 'feedback', 'date_created');
    $val = array($_SESSION['id'], $_GET['product_id'], $_POST['rating'], $_POST['feedback'], $date);
    insertProductReviews('feedbacks', $fld, $val);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
