<?php


function insertWishlist($table_name, $fields, $values)
{
    global $conn;
    connect();
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = "INSERT INTO $table_name (`$flds`) VALUES ('$vals',NOW()) ";
    $data = mysqli_query($conn, $query);
    disconnect();
}




function usersWishlist($table_name, $field, $value)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$field[0]` = '$value[0]' AND `$field[1]` = '$value[1]'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}


function deleteWishlist($table_name, $fields, $values)
{
    global $conn;
    connect();
    $query = "DELETE FROM `$table_name` WHERE `$fields[0]` = '$values[0]' AND `$fields[1]` = '$values[1]'";
    $data = mysqli_query($conn, $query);
    disconnect();
}


function getUsersWishlist($table_name, $field, $value)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$field` = '$value'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}