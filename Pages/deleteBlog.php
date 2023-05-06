<?php
include_once '../Model/db.php';
$id = $_GET['id'];
forDelete('breedersblog',$id);
echo "<script>
            alert('Deleted successfully');
            window.location.href='../Pages/breedersblog.php';
        </script>";
?>