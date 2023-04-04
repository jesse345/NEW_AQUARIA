<?php
include('../Model/db.php');

date_default_timezone_set('Asia/Manila');
$date = date('d-m-y h:i:s');

$user_id = 24;
$product_id = 15;
$validation = 'Approved';
$title = 'Approved your product';
$description = 'Your product chuhuchu is been approved';
$isRead = 'No';

editProduct('products', array('id', 'isApproved', 'date_Approved'), array($product_id, $validation, $date));
sendNotif('notification', array('user_id', 'isRead', 'date_send'), array($user_id, $isRead, $date), 'notification_details', array('notification_id', 'title', 'description'), array($title, $description));