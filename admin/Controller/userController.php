<?php
include("../Model/db.php");

if(isset($_POST['updateUser'])){
    $id = $_POST['id'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    updateUser($id,$a,$b,$c,$d,$e,$f);
    echo "
    <script>
        alert('Update Successfully');
        window.location.href='../Pages/manageUsers.php';
    </script>";
}else if(isset($_POST['deleteUser'])){
    deleteUsers($_POST['user_id']);
    echo "
    <script>
        alert('Delete Successfully');
        window.location.href='../Pages/manageUsers.php';
    </script>";
}
?>