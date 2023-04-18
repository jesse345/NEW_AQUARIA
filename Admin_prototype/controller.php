<?php
include("db.php");
session_start();

$rec = getAllManual();

	if(isset($_POST['add']))
	{	 
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
	}
?>