<?php
$conn;

function connect()
{
    global $conn;
    $conn = mysqli_connect('localhost', 'root', '', 'eaquaria') or die("Connection Failed");
    return $conn;
}


include('UsersModel.php');

include('ProductsModel.php');

include("CartsModel.php");

include("WishlistsModel.php");

include("NotificationModel.php");

include("OrdersModel.php");

include("paymentModel.php");

include("reportProductModel.php");

include("ShippingModel.php");

include("VerificationCodeModel.php");

function disconnect()
{
    global $conn;
    mysqli_close($conn);
}
