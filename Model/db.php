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

include("breederModel.php");

include("ShippingModel.php");

include("VerificationCodeModel.php");

include("SubscriptionModel.php");

function disconnect()
{
    global $conn;
    mysqli_close($conn);
}
