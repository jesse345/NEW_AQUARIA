<!DOCTYPE html>
<html>
<head>
	<title> E AQUARIA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



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
		.search-container {
  		/* float: right; */
		text-align:center;
		margin-top: 50px;
	}


	.search-container button {
	/* float: right; */
	padding: 6px 13px;
	background: #ddd;
	font-size: 17px;
	border: none;
	cursor: pointer;
	}

	.search-container button:hover {
		background: #ccc;
	}

	.search-container input {
		padding: 6px;
		color: black;
		width: 320px;
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
				<<li class="">
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
		<h1 style="text-align:center;">BREEDER'S BLOG</h1>
		<div class="search-container">
			<form action="/action_page.php">
			<input type="text" placeholder="Search.." name="search">
			<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<tr>
			<th>ID</th>
			<th>USER ID</th>
			<th>DESCRIPTION</th>
			<th>PURPOSE</th>
			<th>IMAGE</th>
			<th>DATE_CREATED</th>
		</tr>
		<?php
		include("db.php");
		$rec=getAllPost();
			while($row = mysqli_fetch_assoc($rec)){
				
		?>

		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['user_id'];?></td>
			<td><?php echo $row['description'];?></td>
			<td><?php echo $row['purpose'];?></td>
			<td><img src = "<?php echo $row['image'];?>" style="width: 190px;" ></td>
			<td><?php echo $row['date_created'];?></td>
			
		</tr>
		<?php
		}
	?>
	</table>

	<script src="script.js"></script>
</body>

</html>