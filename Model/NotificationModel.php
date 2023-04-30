<?php

function sendNotif($table_name, $fields, $values)
{
    global $conn;
    connect();
    //for notification table
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);

    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals')");
    return $query;
}

function viewAllNotif($table_name, $fld, $val)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE $fld = $val");

    disconnect();
    return $query;
}



function getTime($id)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT CAST(`date_send` AS TIME) AS time FROM `notification` WHERE id = $id");
    disconnect();
    return $query;
}
