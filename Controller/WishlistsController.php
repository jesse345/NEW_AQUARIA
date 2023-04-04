<?php
include '../Model/db.php';
session_start();
if (empty($_SESSION['id'])) {
    echo "<script>
    
        alert('bogo kag mama login sa uy tanga');
        window.location.href = '../Pages/';
    </script>";
} else {
    if (isset($_POST['addToWishlist'])) {

        $product_id = $_GET['product_id'];
        $user_id = $_SESSION['id'];
        insertWishlist('wishlists', array('product_id', 'user_id', 'date_created'), array($product_id, $user_id));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (isset($_POST['removeWishlist'])) {
        $product_id = $_GET['product_id'];

        deleteWishlist('wishlists', array('product_id', 'user_id'), array($product_id, $_SESSION['id']));

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
