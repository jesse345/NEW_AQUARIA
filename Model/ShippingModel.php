<?php


function getAddress()
{
    global $conn;
    connect();
    $address = mysqli_query($conn, "SELECT * FROM address");
    disconnect();
    return $address;
}


function getUserAddress($id)
{
    global $conn;
    connect();
    $address = mysqli_query($conn, "SELECT * FROM `address` WHERE `id` = $id");
    disconnect();
    return $address;
}


function insertShipping($table, $fields, $values)
{
    global $conn;
    connect();
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = mysqli_query($conn, "INSERT INTO `$table` (`$flds`) VALUES ('$vals')");
    disconnect();
    // return $query;
}


function getUserShippingInfo($id)
{
    global $conn;
    connect();
    $address = mysqli_query($conn, "SELECT * FROM `shipping_info` WHERE `user_id` = $id ");
    disconnect();
    return $address;
}
