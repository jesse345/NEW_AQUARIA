<!DOCTYPE html>
<?php
	include("db.php");
	$rec = getallpayment();
	// $record = getAllUser();
	
	// $product_id = array();
	$product_id;
	if(isset($_GET["delete"])){
		$product_id = $_GET["product_id"];
		// for($i = 0; $i < count($product_id) ; $i++){
			
			deleterecord($product_id);
			echo '<script>alert("Are you sure you want to delete?")</script>';
			//header("location:homepage.php");
		// }	
	}
		

?>
<html lang="en">
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
	<h1 style="text-align:center;">PAYMENT</h1>
		<tr>
			<th>PAYMENT ID</th>
			<th>USER ID</th>
			<th>TYPE OF PAYMENT</th>
			<th>RECEIPT IMAGE</th>
			<th>DATE CREATED</th>
			<th>AMOUNT</th>
			<th>REFERENCE NUMBER</th>
			<th>ORDER ID</th>
            <th>ACTIONS</th>
		</tr>
		
		<?php
			while($row = mysqli_fetch_assoc($rec)){
				$gp = mysqli_fetch_assoc(getproducts($row['payment_id']));
				
		?>

		<tr>
			<td><?php echo $row['payment_id'];?></td>
			<td><?php echo $row['user_id'];?></td>
			<td><?php echo $row['typeofpayment'];?></td>
			<td><img src = "<?php echo $row['receipt_img'];?>" style="width: 190px;" ></td>
			<td><?php echo $row['date_created'];?></td>
			<td><?php echo $row['amount'];?></td>
			<td><?php echo $row['reference_no'];?></td>
			<td><?php echo $row['order_id'];?></td>
			<form action="payment.php?payment_id=<?php echo $row['payment_id'] ?>" METHOD="POST">
				<td><button type="submit" name="delete">DELETE</button></td>
			</form>
		</tr>
		<?php
		}
	?>
	</table>
	
	<!-- <?php
		if(isset($_POST['APPROVE'])){
			$product_id = $_GET['id'];
			$select = Approve($product_id);
			
			echo '<script type = "text/javascript">';
			echo 'alert("Product Approved!");';
			echo 'window.location.href ="product.php"';
			echo '</script>';
		}
		
		if(isset($_POST['DISAPPROVE'])){
			$product_id = $_GET['id'];
			$select = DisApprove($product_id);
			$select = "DELETE FROM products WHERE id = '$product_id'";
	
			echo '<script type = "text/javascript">';
			echo 'alert("Product Disapproved!");';
			echo 'window.location.href ="product.php"';
			echo '</script>';
		}
	?> -->
	<script src="script.js"></script>
</body>
</html>