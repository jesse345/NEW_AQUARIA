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
    $query = mysqli_query($conn, "SELECT * FROM `$table`");
    disconnect();
    return $query;
}
function getBreedersDate($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT id,user_id,description,image, DATE_FORMAT(date_created, '%M %e %Y') AS date  FROM $table  where id = $value");
    disconnect();
    return $query;
}
function getBreedersDesc($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT SUBSTRING(description,1,200) as description from $table where id = $value");
    disconnect();
    return $query;
}
function getCommentCount($table,$value){
    global $conn;
    connect();
    $query = mysqli_query($conn, "SELECT COUNT(user_id) as commentCount from $table where user_id = $value");
    disconnect();
    return $query;
}


?>