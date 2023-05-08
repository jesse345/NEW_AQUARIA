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

function getallreport()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `reports`");
	disconnect();
	return $query;
}
function deleteReport($id)
{
	global $conn;
	connect();
	mysqli_query($conn, "DELETE FROM `reports` WHERE `report_id` = '$id'");
	disconnect();
}

function searchReport($value)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `reports` WHERE `report_id` LIKE '%$value%' OR
																`reporter_id` LIKE '%$value%' OR
																`product_id` LIKE '%$value%' OR
																`reason` LIKE '%$value%'");
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

function countUser()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT COUNT(id) FROM `users`");
	disconnect();
	$row = mysqli_fetch_array($query);
	return $row[0];
}

function countSubscriptionType($type)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `subscription` WHERE `subscription_type` = $type AND `status` = 'Approved'");
	disconnect();
	return $query;
}

function countAdvanced()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT COUNT(subscription_id) FROM `subscription` WHERE `subscription_type` = 2");
	disconnect();
}

function countPremium()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT COUNT(subscription_id) FROM `subscription` WHERE `subscription_type` = 3");
	disconnect();
}


function sumAmount()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT SUM(amount) from subscription");
	disconnect();
	$row = mysqli_fetch_array($query);
	return $row[0];
}


function countSubscribers()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT COUNT(id) FROM `users` WHERE isSubscribe = 'Yes' ");
	disconnect();
	$row = mysqli_fetch_array($query);
	return $row[0];
}

function countReceived()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT COUNT(id) FROM `orders` WHERE status = 'received' ");
	disconnect();
	$row = mysqli_fetch_array($query);
	return $row[0];
}

function countBest()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT COUNT(id) FROM `orders` WHERE `product_id` = product_id AND status = 'received'");
	disconnect();
	$row = mysqli_fetch_array($query);
	return $row[0];
}
function getUserShippingInfo()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `shipping_info`");
	disconnect();
	return $query;
}
function searchSI($value)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `shipping_info` WHERE `shipping_id` LIKE '%$value%' OR
																	 `user_id` LIKE '%$value%' OR
																	 `shipping_name` LIKE '%$value%' OR
																	 `shipping_address` LIKE '%$value%' OR
																	 `shipping_contact` LIKE '%$value%'");
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

function searchProduct($search)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `product_details` WHERE `product_id` LIKE '%$search%' OR
																		`product_name` LIKE '%$search%' OR
																		`category` LIKE '%$search%' OR
																		`description` LIKE '%$search%'");
	disconnect();
	return $query;
}
function searchPayment($value)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `payment` WHERE `payment_id` LIKE '%$value%' OR
																`user_id` LIKE '%$value%' OR
																`typeofpayment` LIKE '%$value%' OR
																`amount` LIKE '%$value%' OR
																`reference_no` LIKE '%$value%' OR
																`order_id` LIKE '%$value%'");
	disconnect();
	return $query;
}
function getAllManual()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `fish_manual`");
	disconnect();
	return $query;
}

function addFishManual($admin_id, $title, $description, $img, $description2,$img2,$description3,$img3)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "INSERT INTO `fish_manual` (`admin_id`,`title`,`description`,`manual_img`,`description1`,`manual_img1`,`description2`,`manual_img2`) VALUES($admin_id, '$title', '$description','$img','$description2','$img2','$description3','$img3')");
	disconnect();
}

function userlogin($username, $password)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, " SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'");
	disconnect();
	return $query;
}

function getrec($admin_id)
{
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

function getAllPost()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `breedersblog`");
	disconnect();
	return $query;
}

function searchPost($search)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `breedersblog` WHERE `description` LIKE '%$search%' OR
																	 `id` LIKE '%$search%' OR
																	 `user_id` LIKE '%$search%' OR
																	  `purpose` LIKE '%$search%'
																	 ");
	disconnect();
	return $query;
}
function deletePost($id)
{
	global $conn;
	connect();
	mysqli_query($conn, "DELETE FROM `breedersblog` WHERE `id` = '$id'");
	disconnect();
}

function getallpayment()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `payment`");
	disconnect();
	return $query;
}

function deleterecord($product_id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "DELETE FROM `product_details` WHERE `product_id` = '$product_id'");
	disconnect();
}



function editRecord($id, $title, $description, $img)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "UPDATE `fish_manual` SET `title` = '$title', `description` = '$description',`manual_img` = '$img' WHERE `manual_id` = $id");
	disconnect();
}
function editRecord2($id, $title, $description)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "UPDATE `fish_manual` SET `title` = '$title', `description` = '$description' WHERE `manual_id` = $id");
	disconnect();
}


function findUser($id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `user_details` WHERE `user_id` = $id");
	disconnect();
	return $query;
}
function SearchUser($val)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `user_details` WHERE `user_id` LIKE '%$val%' OR
																	 `first_name` LIKE '%$val%' OR
																	 `last_name` LIKE '%$val%' OR
																	 `address_id` LIKE '%$val%' OR
																	 `contact_number` LIKE '%$val%'");
	disconnect();
	return $query;
}

function findManual($id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `fish_manual` WHERE `manual_id` = $id");
	disconnect();
	return $query;
}

function deleteManual($id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "DELETE FROM `fish_manual` WHERE `manual_id` = $id");
	disconnect();
}

function deletePayment($id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "DELETE FROM `payment` WHERE `payment_id` = $id");
	disconnect();
}

function deleteUsers($id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "DELETE FROM `user_details` WHERE `user_id` = $id");
	disconnect();
}
function updateUser($id, $a, $b, $c, $d, $e, $f)
{
	global $conn;
	connect();
	mysqli_query($conn, "UPDATE `user_details` SET `first_name`='$a', 
												  `last_name`='$b', 
												  `mi`='$c', 
												  `contact_number`='$d', 
												  `gcash_number`='$e', 
												  `gcash_name`='$f'
												  WHERE `user_id` = '$id'
	");
	disconnect();
}

function searchManual($search)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `fish_manual` WHERE `title` LIKE '%$search%' OR
																	`manual_id` LIKE '%$search%' OR 
																	`admin_id` LIKE '%$search%' OR 
																	`description` LIKE '%$search%'");
	disconnect();
	return $query;
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


function getAllOrders()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `status` = 'received'");
	disconnect();
	return $query;
}

function getAllProducts()
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `products` WHERE `isDelete` = 'No'");
	disconnect();
	return $query;
}

function getProduct($table_name, $fields, $values)
{
	global $conn;
	connect();
	$query = "SELECT * FROM `$table_name` WHERE `$fields` = $values ";
	$data = mysqli_query($conn, $query);
	disconnect();
	return $data;
}



function getSubscribeUser($table_name, $fields, $values)
{
	global $conn;
	connect();
	$query = "SELECT * FROM `$table_name` WHERE `$fields` = $values ";
	$data = mysqli_query($conn, $query);
	disconnect();
	return $data;
}
