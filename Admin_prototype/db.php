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

function disconnect()
{
	global $conn;
	mysqli_close($conn);
}

function getallproduct()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `product_details`");
	disconnect();
	return $query;
}

function getAllUser()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `user_details`");
	disconnect();
	return $query;
}

function getUserShippingInfo()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `shipping_info`");
	disconnect();
	return $query;
}

function getproducts($product_id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$product_id'");
	disconnect();
	return $query;
}

function searchProduct($field, $option)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `product_details` WHERE `$option` LIKE '%$field%'");
	disconnect();
	return $query;
}

function getAllManual(){
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `fish_manual`");
	disconnect();
	return $query;
}

function addFishManual($manual_id, $admin_id, $title, $description){
	global $conn;
	connect();
	$query = mysqli_query($conn, "INSERT INTO `fish_manual` VALUES('$manual_id', '$admin_id', '$title', '$description')");
	disconnect();
}

function userlogin($username, $password){
	global $conn;
	connect();
	$query = mysqli_query($conn, " SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'");
	disconnect();
	return $query;
}

function getrec($admin_id){
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `admin` WHERE `admin_id` = $admin_id");
	//$rows = mysqli_fetch_all($query);
	disconnect();
	if (mysqli_num_rows($query) > 0)
		return $query;
	else 
		return false;
}

// function isApproved(){
// 	global $conn;
// 	connect();
// 	$query = mysqli_query($conn, "SELECT * FROM `products` WHERE isApproved = 'Pending' ORDER BY date_created ASC");
// 	disconnect();
// 	return $query;
// }

// function Approve($product_id){
// 	global $conn;
// 	connect();
// 	$query = mysqli_query($conn, "UPDATE products SET `isApproved` = 'Approved' WHERE id = '$product_id'");
// 	disconnect();
// 	return $query;
// }

// function DisApprove($product_id){
// 	global $conn;
// 	connect();
// 	$query = mysqli_query($conn, "UPDATE products SET `isApproved` = 'Disapproved' WHERE id = '$product_id'");
// 	disconnect();
// 	return $query;
// }

function createSubscription($table_name, $fields, $values)
{
	global $conn;
	connect();
	$flds = implode("`,`", $fields);
	$vals = implode("','", $values);
	$query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals') ");
	disconnect();
}


function getAllSubscription($table_name)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `$table_name`");
	disconnect();
	return $query;
}


function approveSubscription($subsciption_id, $date_started, $date_end, $user_id)
{
	global $conn;
	connect();

	$query = mysqli_query(
		$conn,
		"UPDATE `subscription` SET `date_started` = '$date_started', `date_end` = '$date_end' WHERE `subscription_id` = $subsciption_id"
	);

	$query1 = mysqli_query(
		$conn,
		"UPDATE `users` SET `isSubscribe` = 'Yes'  WHERE `id` = $user_id"
	);


	disconnect();
}