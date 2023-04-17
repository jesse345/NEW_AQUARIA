<?php

function insertPost($table, $fields, $values){
	global $conn;
	connect();
	$flds = implode("`,`", $fields);
	$vals = implode("','", $values);
	$query = mysqli_query($conn, "INSERT INTO `$table` (`$flds`) VALUES ('$vals')");
	disconnect();
}

function getAllPost($table){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * FROM `$table` LIMIT 5");
    disconnect();
    return $query;
}
function getBreeders($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT id,user_id,SUBSTRING(description,1,200) as description,image, DATE_FORMAT(date_created, '%M %e %Y') AS date  FROM $table  where id = $value");
    disconnect();
    return $query;
}
function getCommentCount($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT COUNT(breedersblog_id) as commentCount from $table where breedersblog_id = $value");
    disconnect();
    return $query;
}
function forEditnDelete($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT * from $table where user_id = $value");
    disconnect();
    return $query;
}
function forDelete($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "DELETE FROM $table where `id` = $value");
    disconnect();
    return $query;
}


?>