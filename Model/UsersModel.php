<?php


function login($username, $password)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}


//Registration
function insertUser($table_name, $fields, $values, $table_name1, $fields1, $values1)
{
    global $conn;
    connect();
    //for user table
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    //for user_details table
    $flds1 = implode("`,`", $fields1);
    $vals1 = implode("','", $values1);

    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals') ");
    $query2 = mysqli_query($conn, "INSERT INTO `$table_name1` (`$flds1`) VALUES((SELECT LAST_INSERT_ID()),'$vals1')");
    disconnect();
}

//To get the user
function getUser($table_name, $field, $value)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$field` = '$value'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}

function editUser($table_name, $fields, $values)
{
    global $conn;
    connect();
    for ($i = 1; $i < count($fields); $i++) {
        $query = "UPDATE $table_name SET `$fields[$i]` = '$values[$i]' WHERE `$fields[0]` = $values[0]";
        $data = mysqli_query($conn, $query);
    }
    disconnect();
}


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
    $address = mysqli_query($conn, "SELECT * FROM address WHERE id = $id");
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

function getUserProductReview($table, $fields, $values)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table` WHERE `$fields[0]` = $values[0] AND `$fields[1]` = $values[1]";
    $data = mysqli_query($conn, $query);
    disconnect();
    return $data;
}