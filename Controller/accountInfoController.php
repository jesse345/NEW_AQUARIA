    <?php
    include("../Model/db.php");

    if(isset($_POST['CHANGEPASS'])){
        $id = $_POST['id'];
        $current_pass = $_POST['current_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];

        if (empty($current_pass)) {
            echo    "<script>
                        alert('Current password is required.');
                        window.location.href='../Pages/accountInfo.php';
                    </script>";
            exit;
        }
        if(empty($new_pass) && empty($confirm_pass)){
            echo    "<script>
                        alert('New password and confirm password are required');
                        window.location.href='../Pages/accountInfo.php';
                    </script>";
            exit;
        }
        if (strlen($new_pass) < 8){
            echo    "<script>
                        alert('Password is too short at least 8 characters long.');
                        window.location.href='../Pages/accountInfo.php';
                    </script>";
            exit;
        }

        if (!empty($new_pass) && $new_pass !== $confirm_pass) {
            echo    "<script>
                        alert('New password and confirm password did not match.');
                        window.location.href='../Pages/accountInfo.php';
                    </script>";
            exit;
        }

        $result = userPass($id);
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];

        if ($current_pass !== $db_password) {
            echo "<script>
                    alert('Current password is incorrect.');
                    window.location.href='../Pages/accountInfo.php';
                </script>";
            exit;
        }
        changePass($new_pass,$id);
        echo "<script>
                    alert('Successfully Changed');
                    window.location.href='../Pages/accountInfo.php';
                </script>";
        exit;
    }
    ?>