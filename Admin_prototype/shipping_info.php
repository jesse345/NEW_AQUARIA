<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}
	$rec = getUserShippingInfo();
?>
<html>
<head>
	<title> E AQUARIA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
						<a href="index.php">
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
	<h1 style="text-align:center;">SHIPPING INFO</h1>
		<tr>
			<th></th>
			<th>SHIPPING ID</th>
            <th>USER ID</th>
			<th>SHIPPING NAME</th>
			<th>SHIPPING ADDRESS</th>
			<th>SHIPPING CONTACT</th>
		</tr>
		
		<?php
			while($row = mysqli_fetch_assoc($rec)){
				$gp = mysqli_fetch_assoc(getproducts($row['user_id']));
				
		?>

		<tr>
			<td><button onclick="openViewModal('<?php echo $row['shipping_id']?>','<?php echo $row['user_id']?>','<?php echo $row['shipping_name']?>', 
			'<?php echo $row['shipping_address']?>','<?php echo $row['shipping_contact']?>')" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >VIEW</button></td>
            <td><?php echo $row['shipping_id'];?></td>
			<td><?php echo $row['user_id'];?></td>
            <td><?php echo $row['shipping_name'];?></td>
            <td><?php echo $row['shipping_address'];?></td>
            <td><?php echo $row['shipping_contact'];?></td>
		</tr>
		<div class="container">
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">			
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Modal Header</h4>
						</div>
						<div class="modal-body" style="text-align:center">
							<img src="https://placehold.co/600x400.png" style="width:100px;" name="image" id="image" alt=""> <br> <br>

							<label for="shipping_id">SHIPPING ID</label>
							<input type="text" name="shipping_id" id="shipping_id"> <br>

							<label for="user_id">USER ID</label>
							<input type="text" name="user_id" id="user_id"> <br>

							<label for="shipping_name">SHIPPING NAME</label>
							<input type="text" name="shipping_name" id="shipping_name"> <br>

							<label for="shipping_address">SHIPPING ADDRESS</label>
							<input type="datetime" name="shipping_address" id="shipping_address"> <br>

							<label for="shipping_contact">SHIPPING CONTACT</label>
							<input type="datetime" name="shipping_contact" id="shipping_contact"> <br>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<?php
		}
	?>
	</table>
	<script src="script.js"></script>
	<script>
		function openViewModal(shipping_id,user_id,shipping_name,shipping_address,shipping_contact){

			document.getElementById('shipping_id').value = shipping_id;
			document.getElementById('user_id').value = user_id;
			document.getElementById('shipping_name').value = shipping_name;
			document.getElementById('shipping_address').value = shipping_address;
			document.getElementById('shipping_contact').value = shipping_contact;
 
		}
	</script>
</body>
</html>