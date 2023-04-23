<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}
	$rec = getAllUser();

?>
<html>
<head>
	<title> E AQUARIA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
	table {
  border-collapse: collapse;
  width: 80%;
  text-align: center;
  margin-top: 2rem;
  margin-left: 16rem;
}

tr,
th,
td {
  border: 1px solid #c0c0c0;
  padding: 10px;
}
</style>
	

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
						<a href="#">
							<i class='bx bx-home-alt icon'></i>
							<span class="text nav-text">Dashboard</span>
						</a>
					</li>
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
	
	<table>
	<h1 style="text-align:center;">USERS</h1>
		<tr>
			<th>ID</th>
			<th>FIRST NAME</th>
			<th>MIDDLE INITIAL</th>
			<th>LASTNAME</th>
			<th>ADDRESS</th>
			<th>CONTACT NUMBER</th>
			<th>USER IMAGE</th>
			<th>GCASH NUMBER</th>
			<th>GCASH NAME</th>
		</tr>
		
		<?php
			while($row = mysqli_fetch_assoc($rec)){
				$gp = mysqli_fetch_assoc(getproducts($row['user_id']));
				
		?>

		<tr>
			<td><?php echo $row['user_id'];?></td>
			<td><?php echo $row['first_name'];?></td>
			<td><?php echo $row['mi'];?></td>
			<td><?php echo $row['last_name'];?></td>
			<td><?php echo $row['address_id'];?></td>
            <td><?php echo $row['contact_number'];?></td>
			<td><img src = "<?php echo $row['user_img'];?>" style="width: 190px;" ></td>
			<td><?php echo $row['gcash_number'];?></td>
			<td><?php echo $row['gcash_name'];?></td>
		</tr>
		<?php
		}
	?>
	</table>
	<script src="script.js"></script>
</body>
</html>