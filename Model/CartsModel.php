<?php


function insertCart($table_name, $fields, $values)
{
    global $conn;
    connect();
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = "INSERT INTO $table_name (`$flds`) VALUES ('$vals') ";
    $data = mysqli_query($conn, $query);
    disconnect();
    if ($data) {
        return true;
    } else {
        return false;
    }
}

function usersCart($table_name, $field, $value)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$field[0]` = '$value[0]' AND `$field[1]` = '$value[1]'";
    $data = mysqli_query($conn, $query);

    disconnect();
    return $data;
}

function usersCarts($user_id, $product_id, $isOrdered)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' AND `product_id` = '$product_id' AND `isOrdered` = '$isOrdered'";
    $data = mysqli_query($conn, $query);
    disconnect();
    return $data;
}


function uCart($user_id, $seller, $isOrdered)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' AND `seller` = '$seller' AND `isOrdered` = '$isOrdered'";
    $data = mysqli_query($conn, $query);
    disconnect();
    return $data;
}


function getCart($table_name, $field, $value, $isOrdered)
{
    global $conn;
    connect();
    $query = "SELECT * FROM `$table_name` WHERE `$field` = '$value' AND `isOrdered` = '$isOrdered' ";
    $data = mysqli_query($conn, $query);
    disconnect();
    return $data;
}


function deleteCart($id)
{
    global $conn;
    connect();
    $query = "DELETE FROM `carts` WHERE `id` = $id";
    $data = mysqli_query($conn, $query);
    disconnect();

    if ($data) {
        return true;
    } else {
        return false;
    }
}


function updateCart($table_name, $field, $value)
{
    global $conn;
    connect();
    for ($i = 2; $i < count($field); $i++) {
        $query = mysqli_query(
            $conn,
            "UPDATE `$table_name` SET `$field[$i]` = '$value[$i]' WHERE `$field[0]` = '$value[0]' AND `$field[1]` = $value[1]"
        );
    }
    disconnect();
}


function getAllSeller($id)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT DISTINCT `seller` FROM `carts` WHERE `isOrdered` = 'No' AND `user_id` = $id");
    disconnect();
    return $query;
}
