<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}
	$rec = getallreport();

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
	<h1 style="text-align:center;">REPORTS</h1>

		<tr>
			<th></th>
			<th>REPORT ID</th>
			<th>REPORTER ID</th>
			<th>PRODUCT ID</th>
			<th>REASON</th>
			<th>DATE REPORTED</th>
		</tr>
		
		<?php
			while($row = mysqli_fetch_assoc($rec)){
				$gp = mysqli_fetch_assoc(getproducts($row['product_id']));
				
		?>

		<tr>
			<td><button onclick="openViewModal('<?php echo $row['report_id']?>','<?php echo $row['reporter_id']?>','<?php echo $row['product_id']?>', 
			'<?php echo $row['reason']?>','<?php echo $row['date_reported']?>')" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >VIEW</button></td>
			<td><?php echo $row['report_id'];?></td>
			<td><?php echo $row['reporter_id'];?></td>
			<td><?php echo $row['product_id'];?></td>
			<td><?php echo $row['reason'];?></td>
			<td><?php echo $row['date_reported'];?></td>
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

							<label for="report_id">REPORT ID</label>
							<input type="text" name="report_id" id="report_id" readonly> <br>

							<label for="reporter_id">REPORTER ID</label>
							<input type="text" name="reporter_id" id="reporter_id" readonly> <br>

							<label for="product_id">PRODUCT ID</label>
							<input type="text" name="product_id" id="product_id" readonly> <br>

							<label for="reason">REASON</label>
							<input type="text" name="reason" id="reason" readonly> <br>

							<label for="date_reported">DATE REPORTED</label>
							<input type="datetime" name="date_reported" id="date_reported" readonly> <br>

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
		function openViewModal(report_id,reporter_id,product_id,reason,date_reported){

			document.getElementById('report_id').value = report_id;
			document.getElementById('reporter_id').value = reporter_id;
			document.getElementById('product_id').value = product_id;
			document.getElementById('reason').value = reason;
			document.getElementById('date_reported').value = date_reported;
 
		}
	</script>
</body>
</html>