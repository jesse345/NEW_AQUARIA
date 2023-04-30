<?php

session_start();
include '../Model/db.php';
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');
if (isset($_SESSION['id'])) {
    //For seller side
    if (isset($_POST['acceptOrder'])) {
        $order_id = $_GET['order_id'];
        verifyOrder('orders', array('id', 'status', 'isAccept'), array($order_id, 'Approved', 'Yes'));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['shipProduct'])) {
        $order_id = $_GET['order_id'];
        verifyOrder('orders', array('id', 'status'), array($order_id, 'deliver'));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['productReceived'])) {
        $order_id = $_GET['order_id'];
        verifyOrder('orders', array('id', 'status'), array($order_id, 'received'));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['declineOrder'])) {
        $order_id = $_GET['order_id'];
        verifyOrder('orders', array('id', 'status', 'isAccept'), array($order_id, 'Decline', 'Declined'));

        header("Location: " . $_SERVER['HTTP_REFERER']);

        //For buyer side
    } else if (isset($_POST['cancelOrder'])) {
        $order_id = $_GET['order_id'];
        cancelOrder(
            'orders',
            array('id', 'user_id', 'status', 'isAccept'),
            array($order_id, $_SESSION['id'], 'Cancelled', 'Cancelled')
        );
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['order'])) {
        $user_id = $_SESSION['id'];

        $name = $_POST['shipping_name'];
        $contact = $_POST['shipping_contact'];
        $address = $_POST['shipping_address'];

        $seller = $_POST['seller'];

        $n = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        $ref_order = "";
        // $order_product = viewOrderedProduct('carts', 'user_id', $user_id);

        // $order_product  = getCart('carts', 'user_id', $_SESSION['id'], "No");
        $order_product = uCart($_SESSION['id'], $seller, "No");

        do {

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            $check = getUserOrders('orders', 'ref_order', $randomString);
        } while (mysqli_num_rows($check) > 0);

        $order_flds = array('ref_order', 'user_id', 'product_id', 'date_created', 'status', 'seller', 'isPayed');
        $order_details_flds = array('order_id', 'name', 'contact_number', 'shipping_address');
        $order_details_val = array($name, $contact, $address);
        while ($ord = mysqli_fetch_assoc($order_product)) {
            $seller = mysqli_fetch_assoc(getProduct('products', 'id', $ord['product_id']));
            insertOrders(
                'orders',
                $order_flds,
                array($randomString, $user_id, $ord['product_id'], $date, 'Pending', $seller['user_id'], "No"),
                'order_details',
                $order_details_flds,
                $order_details_val
            );

            updateCart(
                'carts',
                array('user_id', 'product_id', 'isOrdered'),
                array($_SESSION['id'], $ord['product_id'], "Yes")
            );
        }

        // header("Location: ../Pages/choosePayment.php?id=" . $_SESSION['id'] . "");
        $notif = sendNotif('notification', array('user_id', 'date_send', 'isRead', 'redirect'), array($seller, $date, 'No', 'manageOrders.php'));
        $last_id  = mysqli_insert_id($conn);

        sendNotif('notification_details', array('notification_id', 'title', 'Description'), array($last_id, 'Product Approval', 'Someone Ordered your product'));

        header("Location: ../Pages/myPurchase.php");
    } else {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}
