<?php

function sendNotif($table_name, $fields, $values, $table_name1, $fields1, $values1)
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