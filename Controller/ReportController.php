<?php 
include '../Model/db.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');


if(isset($_POST['report'])){
    $user_id = $_SESSION['id'];
    $product_id = $_GET['product_id'];
    $report = $_POST['report_type'];
    addreport('reports',array('reporter_id', 'product_id', 'reason', 'date_reported'), array($user_id, $product_id,  $report, $date));
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

?>