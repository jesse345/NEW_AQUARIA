<?php

session_start();
include '../Model/db.php';
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
if (isset($_SESSION['id'])) {
    //For seller side
    if (isset($_POST['acceptOrder'])) {
        $order_id = $_GET['order_id'];

        $ord = mysqli_fetch_assoc(viewOrderedProduct('orders', 'id', $order_id));
        verifyOrder('orders', array('id', 'status', 'isAccept'), array($order_id, 'Approved', 'Yes'));
        $seller = mysqli_fetch_assoc(getUser('user_details', 'user_id', $ord['seller']));
        $product = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $ord['product_id']));

        $desc = $seller['first_name'] . " " . $seller['last_name'] . " accepted your order for " . $product['product_name'];

        $notif = sendNotif(
            'notification',
            array('user_id', 'date_send', 'isRead', 'redirect'),
            array($ord['user_id'], $date, 'No', 'myPurchase.php')
        );

        $last_id  = mysqli_insert_id($conn);
        sendNotif(
            'notification_details',
            array('notification_id', 'title', 'Description'),
            array($last_id, 'Product Accepted', $desc)
        );
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['shipProduct'])) {
        $order_id = $_GET['order_id'];
        verifyOrder('orders', array('id', 'status'), array($order_id, 'deliver'));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['productReceived'])) {
        $order_id = $_GET['order_id'];
        $order = mysqli_fetch_assoc(getUserOrders('orders', 'id', $order_id));
        $cart = mysqli_fetch_assoc(getUser('carts', 'id', $order['cart_id']));
        $product = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $cart['product_id']));

        $quantity = $product['quantity'] - $cart['quantity'];

        editProduct('product_details', array('product_id', 'quantity'), array($cart['product_id'], $quantity));
        verifyOrder('orders', array('id', 'status', 'date_end'), array($order_id, 'received', $date));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['declineOrder'])) {
        $order_id = $_GET['order_id'];
        verifyOrder('orders', array('id', 'status', 'isAccept'), array($order_id, 'Decline', 'Declined'));

        $ord = mysqli_fetch_assoc(viewOrderedProduct('orders', 'id', $order_id));
        $seller = mysqli_fetch_assoc(getUser('user_details', 'user_id', $ord['seller']));
        $product = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $ord['product_id']));

        $desc = $seller['first_name'] . " " . $seller['last_name'] . " decline your order for " . $product['product_name'];

        $notif = sendNotif(
            'notification',
            array('user_id', 'date_send', 'isRead', 'redirect'),
            array($ord['user_id'], $date, 'No', 'myPurchase.php')
        );

        $last_id  = mysqli_insert_id($conn);
        sendNotif(
            'notification_details',
            array('notification_id', 'title', 'Description'),
            array($last_id, 'Product Declined', $desc)
        );



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
        $option = $_POST['payment_option'];

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

        $order_flds = array('ref_order', 'cart_id', 'user_id', 'product_id', 'date_created', 'status', 'seller', 'isPayed', 'payment_option');
        $order_details_flds = array('order_id', 'name', 'contact_number', 'shipping_address');
        $order_details_val = array($name, $contact, $address);
        while ($ord = mysqli_fetch_assoc($order_product)) {
            $seller = mysqli_fetch_assoc(getProduct('products', 'id', $ord['product_id']));
            insertOrders(
                'orders',
                $order_flds,
                array($randomString, $ord['id'], $user_id, $ord['product_id'], $date, 'Pending', $seller['user_id'], "No", $option),
                'order_details',
                $order_details_flds,
                $order_details_val
            );

            updateCart(
                'carts',
                array('user_id', 'product_id', 'isOrdered'),
                array($_SESSION['id'], $ord['product_id'], "Yes")
            );

            $getUser = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
            $getProduct = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $ord['product_id']));
            $desc = $getUser['first_name'] . " " . $getUser['last_name'] . " ordered your product " . $getProduct['product_name'];
            $notif = sendNotif('notification', array('user_id', 'date_send', 'isRead', 'redirect'), array($seller['user_id'], $date, 'No', 'manageOrders.php'));
            $last_id  = mysqli_insert_id($conn);
            sendNotif(
                'notification_details',
                array('notification_id', 'title', 'Description'),
                array($last_id, 'Product Order', $desc)
            );
        }

        // header("Location: ../Pages/choosePayment.php?id=" . $_SESSION['id'] . "");


        header("Location: ../Pages/myPurchase.php");
    } else {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}
