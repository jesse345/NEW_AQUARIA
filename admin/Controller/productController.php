<?php
include("../Model/db.php");
session_start();

if(isset($_POST['deleteproduct'])){
    $id = $_POST['product_id'];

    deleterecord($id);
	echo "
    <script>
        alert('DELETE Successfully');
        window.location.href='../Pages/manageProduct.php';
    </script>";
}

