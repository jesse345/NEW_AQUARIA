<?php
include '../Model/db.php';
session_start();
date_default_timezone_set('Asia/Manila');
$date = date('y-m-d h:i:s');
if (empty($_SESSION['id'])) {
    echo "<script>
    
        alert('bogo kag mama login sa uy tanga');
        window.location.href = '../Pages/';
    </script>";
} else {

    if (isset($_POST['addToCart'])) {
        $product_id = $_POST['product_id'];

        $seller = mysqli_fetch_assoc(getProduct('products', 'id', $product_id));
        $quantity = $_POST['quantity'];
        $user_id = $_SESSION['id'];
        $price = $_POST['price'];
        $total = $quantity * $price;
        $cart = insertCart('carts', array(
            'product_id',
            'user_id',
            'seller',
            'quantity',
            'price',
            'total',
            'isOrdered',
            'date_created'
        ), array($product_id, $user_id, $seller['user_id'], $quantity, $price, $total, "No", $date));

        if ($cart) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            echo "error";
        }
    } else if (isset($_POST['removeCart'])) {
        $cart_id = $_POST['cart_id'];
        $user_id = $_SESSION['id'];

        $cart = deleteCart($cart_id);

        if ($cart) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            echo "error";
        }
    } else if (isset($_POST['submit'])) {
        $cart = mysqli_fetch_assoc(
            usersCart(
                'carts',
                array('user_id', 'product_id'),
                array($_SESSION['id'], $_GET['product_id'])
            )
        );
        $quantity = $_POST['quantity'];
        $total = $quantity * $cart['price'];
        updateCart(
            'carts',
            array('user_id', 'product_id', 'quantity', 'total'),
            array($_SESSION['id'], $_GET['product_id'], $quantity, $total)
        );


        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
