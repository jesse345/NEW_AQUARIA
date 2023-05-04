<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}


?>
<html>

<head>
	<title> E AQUARIA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<nav class="sidebar close">
		<header>
			<div class="image-text">
				<span class="image">
					<img src="batman.png" alt="batman">
				</span>

				<div class="text header-text">
					<span class="name">E-AQUARIA</span>
					<span class="profession">Ornamental Fish
				</div>
			</div>

			<i class='bx bx-chevron-right toggle'></i>
		</header>

		<div class="menu-bar">
			<div class="menu">
				<ul class="menu-links">
					<li class="nav-link">
						<a href="index.php">
							<i class='bx bx-home-alt icon'></i>
							<span class="text nav-text">Dashboard</span>
						</a>
					</li>
					<!-- <li class="nav-link">
						<a href="#">
							<i class='bx bx-bell icon'></i>
							<span class="text nav-text">Notification</span>
						</a>
					</li> -->
					<li class="nav-link">
						<a href="fish_manual.php">
							<i class='bx bx-book-content icon'></i>
							<span class="text nav-text">Fish Manual</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="payment.php">
							<i class='bx bx-money icon'></i>
							<span class="text nav-text">Manage Payment</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="post.php">
						<!-- bar-chart-alt-2 -->
							<i class='bx bx-repost icon'></i>
							<span class="text nav-text">Manage Post</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="product.php">
							<i class='bx bxl-product-hunt icon'></i>
							<span class="text nav-text">Manage Products</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="report.php">
							<i class='bx bxs-report icon'></i>
							<span class="text nav-text">Manage Reports</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="shipping_info.php">
							<i class='bx bx-info-square icon'></i>
							<span class="text nav-text">Manage Shipping Info</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="users.php">
							<i class='bx bx-user icon'></i>
							<span class="text nav-text">Manage Users</span>
						</a>
					</li>
					<li class="nav-link">
						<a href="subscription.php">
							<i class='bx bx-wallet icon'></i>
							<span class="text nav-text">Subscription</span>
						</a>
					</li>
				</ul>
			</div>

			<div class="bottom-content">
				<li class="">
					<a href="logout.php">
						<i class='bx bx-log-out icon'></i>
						<span class="text nav-text">Logout</span>
					</a>
				</li>

				<li class="mode">
					<div class="moon-sun">
						<i class='bx bx-moon icon moon'></i>
						<i class='bx bx-sun icon sun'></i>
					</div>
					<span class="mode-text text">Dark Mode</span>

					<div class="toggle-switch">
						<span class="switch"></span>
					</div>
				</li>
			</div>
		</div>
	</nav>

	
	<section class="book" id="book">
		<div class="book-content">
			<div class="box">
				<!-- <img src="user.png"> -->
				<i class='bx bx-user icon'></i>
				<h3>TOTAL NUMBER OF USERS</h3>
				<?php
					$num = countUser();
					echo $num;
				?><br>
				<!-- <a href="users.php" class="btn">More Info</a> -->

			</div>

			<div class="box">
				<!-- <img src="user.png"> -->
				<i class='bx bx-user icon'></i>
				<h3>TOTAL NUMBER OF<br>SUBSCRIBERS</h3>
				<?php
					$subscribers = countSubscribers();
					echo $subscribers;
				?>
				<!-- <a href="subscription.php" class="btn">More Info</a> -->
			</div>

			
		</div>
	</section>
	<section class="book" id="book">
		<div class="book-content">
			<div class="box">
				<i class='bx bx-user icon'></i>
				<h3>TOTAL NUMBER OF <br>PRODUCTS SOLD</h3>
				<?php
					$received = countReceived();
					echo $received;
				?><br>
			</div>
<!-- 
			<div class="box">

				<i class='bx bx-user icon'></i>
				<h3>BEST SELLER</h3>
				<?php
					$best = countBest();
					echo $best;
				?><br>
				<a href="" class="btn">More Info</a>
				<br /><br /><br />
			</div> -->

	</section>

	<script src="script.js"></script>
</body>

</html>