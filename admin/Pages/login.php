<!doctype html>
<?php
	include("../Model/db.php");
	session_start();
	
	if(isset($_SESSION['admin_id'])){
		header("location: ../Pages/dashboard.php");
	}
	
	
	$username;
	$password;
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$admin = userlogin($username, $password);
		if(mysqli_num_rows($admin) > 0){
			$data = mysqli_fetch_assoc($admin);
			
			$_SESSION['admin_id'] = $data['admin_id'];
			$_SESSION['username'] = $data['username'];
			header("location: dashboard.php");
		}else{
			echo "INVALID USERNAME OR PASSWORD";
		}
	}
?>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>ADMIN E-AQUARIA</title>
    <link href='../assets/css/bootstrap5.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="login-box">
    <h2>Login</h2>
        <form method="POST" action="login.php">
            <div class="user-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            LOGIN</button>
        </form>
    </div>


    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
</body>
</html>
