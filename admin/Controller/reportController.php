<?php
include("../Model/db.php");
session_start();

if(isset($_POST['deletereport'])){
    $id = $_POST['report_id'];

    deletereport($id);
	echo "
    <script>
        alert('Deletew Successfully');
        window.location.href='../Pages/manageReport.php';
    </script>";
}
