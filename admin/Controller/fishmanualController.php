<?php
include("../Model/db.php");
session_start();

if (isset($_POST['add'])) {
	$admin_id = $_SESSION["admin_id"];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$description2 = $_POST['description2'];
	$description3 = $_POST['description3'];
	$img = $_FILES['image']['name'];
	$img2 = $_FILES['image2']['name'];
	$img3 = $_FILES['image3']['name'];

	$targetDir = "../img/"; // Set target directory
	$allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

	$name = $_FILES['image']['name'];
	$fileType = pathinfo($name, PATHINFO_EXTENSION);
	$targetPath = $targetDir . basename($name);

	$name2 = $_FILES['image2']['name'];
	$fileType2 = pathinfo($name2, PATHINFO_EXTENSION);
	$targetPath2 = $targetDir . basename($name2);

	$name3 = $_FILES['image3']['name'];
	$fileType3 = pathinfo($name3, PATHINFO_EXTENSION);
	$targetPath3 = $targetDir . basename($name3);





	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if ($check !== false) {
		if (in_array($fileType, $allowedTypes)) {
			move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
			move_uploaded_file($_FILES['image2']['tmp_name'], $targetPath2);
			move_uploaded_file($_FILES['image3']['tmp_name'], $targetPath3);

			addFishManual($admin_id, $title, $description, $img, $description2,$img2,$description3,$img3);
			
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
