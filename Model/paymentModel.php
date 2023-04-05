<?php


//To insert payment
function insertPayment($table, $fields, $values)
{
	global $conn;
	connect();
	$flds = implode("`,`", $fields);
	$vals = implode("','", $values);
	$query = mysqli_query($conn, "INSERT INTO `$table` (`$flds`) VALUES ('$vals')");
	disconnect();
	// return $query;
}


function getPayment($order_id)
{
	global $conn;
	connect();
	$query = mysqli_query($conn, "SELECT * FROM `payment` WHERE `order_id` = '$order_id'");
	disconnect();
	return $query;
}

// sa user id $_SESSION['id'] gamita kay if di na mao ang id nga gamiton nimo ara automatic na ma error
// nya sa date nga query nag butang nag gamit kog php method nga date para di naka mag NOW SA QUERY
// nya kung mu redirect ka sa model mutawag automatic gyud ni sya ma error kay wala man na include ang db ari.
// suwayi gani nga ibutang nang gi practice san nimo nga insert ug lain file diba mugana na
//ibutang nalang nako sa try.php hahahaa




?>