<?php


function verification_codes($table, $fields, $values)
{
    global $conn;
    connect();
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = mysqli_query($conn, "INSERT INTO `$table` (`$flds`) VALUES ('$vals') ");
    disconnect();
}

function checkCode($user_id)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `verification_codes` WHERE `user_id` = $user_id ORDER BY `id` DESC  LIMIT 1;");

    disconnect();
    return $query;
}
