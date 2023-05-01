<?php
include("../Model/db.php");
if(isset($_POST["deletepayment"])){
    $id = $_POST["id"];
    
        
    deletePayment($id);
    echo "<script>
            alert('Deleted successfully');
            window.location.href='../Pages/managePayment.php';
        </script>";
}