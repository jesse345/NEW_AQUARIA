<?php


function createSubscription($table_name, $fields, $values)
{
    global $conn;
    connect();
    $flds = implode("`,`", $fields);
    $vals = implode("','", $values);
    $query = mysqli_query($conn, "INSERT INTO `$table_name` (`$flds`) VALUES ('$vals') ");
    disconnect();
}


function getAllSubscription($table_name)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `$table_name`");
    disconnect();
    return $query;
}



function getUserSubscription($user_id)
{
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `subscription` WHERE `user_id` = $user_id");
    disconnect();
    return $query;
}


function approveSubscription($subsciption_id, $date_started, $date_end, $user_id)
{
    global $conn;
    connect();

    $query = mysqli_query(
        $conn,
        "UPDATE `subscription` SET `date_started` = '$date_started', `date_end` = '$date_end' WHERE `subscription_id` = $subsciption_id"
    );

    $query1 = mysqli_query(
        $conn,
        "UPDATE `users` SET `isSubscribe` = 'Yes'  WHERE `id` = $user_id"
    );


    disconnect();
}


function expireSubscription($user_id)
{
    global $conn;
    connect();
    $sql = mysqli_query($conn, "UPDATE `users` SET `isSubscribe` = 'No' WHERE `id` == $user_id");
    disconnect();
}
