<?php
include '../Model/db.php';
session_start();


if(isset($_POST['editblog'])){
        
        $description = $_POST['description1'];
        $purpose = $_POST['purpose1'];
        $img = $_FILES['img1']['name'];
        $img1 = $_POST['img'];
    if(!empty($img)){
        $targetDir = "../img/"; // Set target directory
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $name = $_FILES['img1']['name'];
        $fileType = pathinfo($_FILES['img1']['name'], PATHINFO_EXTENSION);
        $targetPath = $targetDir . basename($name);
        $check = getimagesize($_FILES["img1"]["tmp_name"]);
        
            if ($check) {
                move_uploaded_file($_FILES['img1']['tmp_name'], $targetPath);
                updatePost('breedersblog', $_SESSION['id'], $description, $purpose, $img);
                header("Location: ../Pages/BreedersBlog.php");
            }else{
                echo "File is not an image.";
                $uploadOk = 0;
                echo '<script>alert("Failed!!!")</script>';
            }
    }else{
                updatePost('breedersblog', $_SESSION['id'], $description, $purpose, $img1);
                header("Location: ../Pages/BreedersBlog.php");
    }
    
}
?>