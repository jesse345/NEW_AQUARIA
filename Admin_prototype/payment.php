<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}
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
			<td><button onclick="openViewModal('<?php echo $row['payment_id']?>','<?php echo $row['user_id']?>','<?php echo $row['typeofpayment']?>', '<?php echo $row['receipt_img']?>','<?php echo $row['date_created']?>','<?php echo $row['amount']?>','<?php echo $row['reference_no']?>','<?php echo $row['order_id']?>')" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >VIEW</button></td>
			<!-- <td>  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">VIEW</button></td> -->
			<td><?php echo $row['payment_id'];?></td>
			<td><?php echo $row['user_id'];?></td>
			<td><?php echo $row['typeofpayment'];?></td>
			<td><img src = "<?php echo $row['receipt_img'];?>" style="width: 190px;" ></td>
			<td><?php echo $row['date_created'];?></td>
			<td><?php echo $row['amount'];?></td>
			<td><?php echo $row['reference_no'];?></td>
			<td><?php echo $row['order_id'];?></td>
			<td>

			<form action="payment.php?payment_id=<?php echo $row['payment_id'] ?>" METHOD="POST">
			
				<br>
			

				<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">VIEW</button> -->
				<button type="submit" name="delete">DELETE</button>
			</td>
			</form>
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
						<div class="modal-body" style="text-align:center;">
							<img src="https://placehold.co/600x400.png" style="width:100px;" name="receipt_img" id="receipt_img" alt=""> <br> <br>


							<label for="payment_id">PaymentID</label>
							<input type="text" name="payment_id" id="payment_id" readonly> <br>

							<label for="user_id">UserID</label>
							<input type="text" name="user_id" id="user_id" readonly> <br>

							<label for="payment_type">Type of Payment</label>
							<input type="text" name="payment_type" id="payment_type" readonly> <br>

							<label for="date_created">Date Created</label>
							<input type="datetime" name="date_created" id="date_created" readonly> <br>

							<label for="amount">Amount</label>
							<input type="text" name="amount" id="amount" readonly> <br>

							<label for="reference_no">Reference No</label>
							<input type="text" name="reference_no" id="reference_no" readonly> <br>

							<label for="order_id">Order ID</label>
							<input type="text" name="order_id" id="order_id" readonly> <br>
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
	<script>
		function openViewModal(paymentID,userID,typeofpayment,receipt_img,date_created,amount,reference_no,orderID){

			document.getElementById('payment_id').value = paymentID;
			document.getElementById('user_id').value = userID;
			document.getElementById('payment_type').value = typeofpayment;
			document.getElementById('date_created').value = date_created;
			document.getElementById('amount').value = amount;
			document.getElementById('reference_no').value = reference_no;
			document.getElementById('order_id').value = orderID;
			// document.getElementById('receipt_img').src = receipt_img;
			
 
		}
	</script>
</body>
</html>