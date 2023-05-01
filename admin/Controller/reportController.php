<?php
include("../Model/db.php");


if(isset($_POST['delete'])){
    deleteReport($_POST['reports_id']);
	echo "
    <script>
        alert('Delete Successfully');
        window.location.href='../Pages/manageReport.php';
    </script>";
}
