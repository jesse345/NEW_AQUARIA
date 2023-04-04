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
function deleteComment($id){
    global $conn;
    connect();
    $query = "DELETE FROM `comment` WHERE `comment_id` = '$id]' ";
    $data = mysqli_query($conn, $query);
    disconnect();
}

?>