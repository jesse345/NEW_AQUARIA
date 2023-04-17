<?php
include_once '../Model/db.php';
$id = $_GET['id'];

if(isset($_GET['id'])){
    forDelete('breedersblog',$id);
    header("Location:../Pages/breedersblog.php");
}



?>