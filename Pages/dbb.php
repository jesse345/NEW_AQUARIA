<?php
$hostname = "localhost";
$user = "root";
$pass = "";
$database = "eaquaria";
$conn;

function connect()
{
	global $hostname, $user, $pass, $database, $conn;
	$conn = mysqli_connect($hostname, $user, $pass, $database) or die("Connection Error");
}

function getAllProd($id){
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `product_details` WHERE id = $id");
    disconnect();
}

function disconnect()
{
	global $conn;
	mysqli_close($conn);
}


