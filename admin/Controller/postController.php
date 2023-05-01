<?php
include("../Model/db.php");

if(isset($_POST['deletepost'])){
    deletePost($_POST['id']);
    echo "<script>
            alert('Deleted successfully');
            window.location.href='../Pages/managePost.php';
        </script>";
}
?>