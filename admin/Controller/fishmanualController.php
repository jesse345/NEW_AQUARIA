<?php
include("../Model/db.php");
session_start();

if (isset($_POST['add'])) {
	$admin_id = $_SESSION["admin_id"];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$img = $_FILES['image']['name'];

	$targetDir = "../img/"; // Set target directory
	$allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
	$name = $_FILES['image']['name'];
	$fileType = pathinfo($name, PATHINFO_EXTENSION);
	$targetPath = $targetDir . basename($name);

	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if ($check !== false) {
		if (in_array($fileType, $allowedTypes)) {
			move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
			addFishManual($admin_id, $title, $description, $img);
			echo "<script>
					alert('added successfully');
					window.location.href='../Pages/fishmanual.php';
				</script>";
		} else {
			echo "<script>
					alert('File is not an image.');
					window.location.href='../Pages/fishmanual.php';
				</script>";
		}
	} else {
		echo "<script>
				alert('Please select an image file.');
				window.location.href='../Pages/fishmanual.php';
			</script>";
	}
}else if (isset($_POST['edit'])){
    $id = $_POST['manual_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img = $_FILES['image']['name'];

    if(!empty($img)){
        $targetDir = "../img/"; // Set target directory
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $name = $_FILES['image']['name'];
        $fileType = pathinfo($name, PATHINFO_EXTENSION);
        $targetPath = $targetDir . basename($name);

        if (in_array($fileType, $allowedTypes)) {
            if(move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                editRecord($id,$title,$description,$img);
                echo "<script>
                    alert('Edited successfully.');
                    window.location.href='../Pages/fishmanual.php';
                </script>";
            } else {
                echo "<script>
                    alert('Error uploading image.');
                    window.location.href='../Pages/fishmanual.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('File is not an image.');
                window.location.href='../Pages/fishmanual.php';
            </script>";
        }
    } else { 
        editRecord2($id,$title,$description);
        echo "<script>
            alert('Edited successfully.');
            window.location.href='../Pages/fishmanual.php';
        </script>";
    }
}else if (isset($_POST['deleteManual'])) {
	deleteManual($_POST['manual_id']);
	echo "<script>
				alert('Deleted successfully');
				window.location.href='../Pages/fishmanual.php';
			</script>";
}
	// else if(isset($_GET['search'])){
	// 	search
	// }
