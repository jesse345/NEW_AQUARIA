<?php
include '../Model/db.php';
session_start();


if(isset($_POST['postblog'])){
    $description = $_POST['description'];
    $purpose = $_POST['purpose'];
    $img = $_FILES['img']['name'];

    $targetDir = "../img/"; // Set target directory
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $name = $_FILES['img']['name'];
    $fileType = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $targetPath = $targetDir . basename($name);
    

    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check) {
        move_uploaded_file($_FILES['img']['tmp_name'], $targetPath);
        insertPost('breedersblog',
            array('user_id','description','purpose','image'),
            array($_SESSION['id'],$description,$purpose, $img));
            echo "<script>
                    alert('Post Successfully');
                    window.location.href='../Pages/breedersblog.php';
                </script>";
        
    }else{
        echo "File is not an image.";
        $uploadOk = 0;
        echo '<script>alert("Failed!!!")</script>';
    }

}


?>

