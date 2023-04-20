<?php
include("db.php");
session_start();

$rec = getAllManual();

if (isset($_POST['add'])) {
	// $admin_id  = $_POST['admin_id'];
	$admin_id = $_SESSION["admin_id"];

	// $manual_id  = $_POST['manual_id'];
	$title = $_POST['title'];
	$description = $_POST['description'];


	addFishManual($admin_id, $title, $description);
	// echo "<p>ADDED SUCCESSFULLY</p>";

	echo "<script>
				alert('added successfully');
				window.location.href='fish_manual.php';
			</script>";
} else if (isset($_POST['edit'])) {

	$title = $_POST['title'];
	$description = $_POST['description'];
	// editRecord($_GET['manual_id'], $title,$description);
	echo "<script>
				alert('Edited successfully');
				window.location.href='fish_manual.php';
			</script>";
} else if (isset($_POST['deleteManual'])) {
	deleteManual($_POST['manual_id']);
	echo "<script>
				alert('Deleted successfully');
				window.location.href='fish_manual.php';
			</script>";
}
	// else if(isset($_GET['search'])){
	// 	search
	// }
