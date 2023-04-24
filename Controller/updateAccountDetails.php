<?php
include '../Model/db.php';
session_start();

if(isset($_POST['UPDATE'])){
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $img1 = $_FILES['img1']['name'];
    $img = $_POST['img'];

    if(!empty($img1)){
        $targetDir = "../img/"; // Set target directory
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $name = $_FILES['img1']['name'];
        $fileType = pathinfo($_FILES['img1']['name'], PATHINFO_EXTENSION);
        $targetPath = $targetDir . basename($name);
        $check = getimagesize($_FILES["img1"]["tmp_name"]);

        if ($check) {
                    move_uploaded_file($_FILES['img1']['tmp_name'], $targetPath);
                    updateUser1('user_details',$id,$fname,$lname,$img1);
                    header("Location: ../Pages/myAccount.php");
        }else{
            echo "File is not an image.";
            $uploadOk = 0;
            echo "<script>
				alert('Successfully updated');
				window.location.href='../Pages/myAccount.php';
			</script>";
           
        }

    }else{
        updateUser1('user_details',$id,$fname,$lname,$img);
         echo "<script>
				alert('Successfully updated');
				window.location.href='../Pages/myAccount.php';
			</script>";
    }
    
}

    

?>