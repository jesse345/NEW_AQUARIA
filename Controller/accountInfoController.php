<?php
include("../Model/db.php");


if(isset($_POST['CHANGEPASS'])){
    $id = $_POST['id'];
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $pass = userPass($id);
    $db_pass = mysqli_fetch_assoc($pass);
    
    echo $db_pass['password'];
    
    
    if ($current_pass != $db_pass){
        echo "<script>
					alert('Current password is incorrect.');
					window.location.href='../Pages/accountInfo.php';
				</script>";
    exit;
    }
    if(empty($current_pass)) {
        echo "<script>
					alert('Current password is required.');
					window.location.href='../Pages/accountInfo.php';
				</script>";
        exit;
    }
    if(!empty($new_pass) && $new_pass !== $confirm_pass) {
        echo "<script>
					alert('New password and confirm password did not match.');
					window.location.href='../Pages/accountInfo.php';
				</script>";
        exit;
     }

    

    if(!empty($new_pass)){
        changePass('users',$id,$new_pass);
        echo "<script>
					alert('Password Changed!');
					window.location.href='../Pages/accountInfo.php';
				</script>";
    }



    
}

?>