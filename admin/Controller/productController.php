<?php
include("../Model/db.php");
session_start();

if (isset($_POST['deleteproduct'])) {
    $id = $_POST['product_id'];

    deleterecord($id);
    echo "
    <script>
        alert('DELETE Successfully');
        window.location.href='../Pages/manageProduct.php';
    </script>";
}



if (isset($_POST['collector'])) {
    $id = $_GET['product_id'];

    edit_Record('product_details', array('product_id', 'filter'), array($id, 1));

    echo "
    <script>
        alert('Product Set to Collector');
        window.location.href='../Pages/filterProduct.php';
    </script>";
}


if (isset($_POST['newbie'])) {
    $id = $_GET['product_id'];

    edit_Record('product_details', array('product_id', 'filter'), array($id, 2));

    echo "
    <script>
        alert('Product Set to Newbie');
        window.location.href='../Pages/filterProduct.php';
    </script>";
}
