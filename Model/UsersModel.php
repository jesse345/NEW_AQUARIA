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


function registerUser($table, $fields, $values)
{
    global $conn;
    connect();
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = mysqli_query($conn, "INSERT INTO `$table` (`$flds`) VALUES ('$vals') ");

    return $query;
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

function getGcash($table_name, $field, $value)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$field` = '$value'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}

function editGcash($table_name, $field, $value, $user_id)
{
    global $conn;
    connect();
    $query = "UPDATE `$table_name` SET `$field` = '$value' WHERE user_id = $user_id";
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
    return $data;
}
function changePass($new_pass,$id){
    global $conn;
    connect();
    mysqli_query($conn, "UPDATE `users` SET `password` = '$new_pass' WHERE `id` = '$id'");
    disconnect();
}
function userPass($id){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT `password` FROM `users` WHERE `id` = '$id'");
    disconnect();
    return $query;
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
