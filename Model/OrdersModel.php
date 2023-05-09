<?php


function getAllOrders()
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `orders` ");
    disconnect();
    return $query;
}

function getUserOrders($table_name, $fld, $val)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE $fld = '$val'");
    disconnect();
    return $query;
}

function insertOrders($table_name, $fields, $values, $table_name1, $fields1, $values1)
{
    global $conn;
    connect();
    //for notification table
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    //for notification_details table
    $flds1 = implode("`,`", $fields1);
    $vals1 = implode("','", $values1);

    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals')");
    $query2 = mysqli_query($conn, "INSERT INTO `$table_name1` (`$flds1`) VALUES((SELECT LAST_INSERT_ID()),'$vals1')");

    disconnect();
}

function insertOrderDetails($table_name, $fields, $values)
{
    global $conn;
    connect();

    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);


    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals')");
    disconnect();
}

function viewOrderedProduct($table_name, $fld, $val)
{

    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE $fld = '$val'");
    disconnect();
    return $query;
}

function verifyOrder($table_name, $fields, $values)
{
    global $conn;
    connect();
    for ($i = 1; $i < count($fields); $i++) {
        $query = "UPDATE $table_name SET `$fields[$i]` = '$values[$i]' WHERE `$fields[0]` = $values[0]";
        $data = mysqli_query($conn, $query);
    }
    disconnect();
}

function cancelOrder($table_name, $flds, $vals)
{
    global $conn;
    connect();
    for ($i = 2; $i < count($flds); $i++) {
        $query = "UPDATE $table_name SET `$flds[$i]` = '$vals[$i]'  WHERE `$flds[0]` = $vals[0] AND `$flds[1]` = $vals[1] ";
        $data = mysqli_query($conn, $query);
    }
    disconnect();
}


function refOrder($table_name)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT DISTINCT(ref_order) FROM `$table_name` ");
    disconnect();
    return $query;
}


function getOrderedProducts($seller)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `seller` = '$seller'");
    disconnect();
    return $query;
}


function updateOrderPayment($order_id)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "UPDATE `orders` SET `isPayed` = 'Yes', `status` = 'paid' WHERE `id` = $order_id");
    disconnect();
}



function getTypes($user, $id, $status)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `$user` = $id AND `status` = '$status' ");
    disconnect();
    return $query;
}


function countOrders($seller)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `orders` WHERE `seller` = $seller AND `status` = 'received' ");
    disconnect();
    return $query;
}
