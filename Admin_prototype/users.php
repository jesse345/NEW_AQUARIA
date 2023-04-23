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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
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
	<h1 style="text-align:center;">USERS</h1>
		<tr>
			<th></th>
			<th>ID</th>
			<th>FIRST NAME</th>
			<th>MIDDLE INITIAL</th>
			<th>LASTNAME</th>
			<th>ADDRESS</th>
			<th>CONTACT NUMBER</th>
			<th>USER IMAGE</th>
			<th>GCASH NUMBER</th>
			<th>GCASH NAME</th>
			<th>ACTIONS</th>
		</tr>
		
		<?php
			while($row = mysqli_fetch_assoc($rec)){
				$gp = mysqli_fetch_assoc(getproducts($row['user_id']));
				
		?>

		<tr>
			<td><button onclick="openViewModal('<?php echo $row['user_id']?>','<?php echo $row['first_name']?>','<?php echo $row['mi']?>', 
			'<?php echo $row['last_name']?>','<?php echo $row['address_id']?>', '<?php echo $row['contact_number']?>', '<?php echo $row['gcash_number']?>', 
			'<?php echo $row['gcash_name']?>')" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >VIEW</button></td>
			<td><?php echo $row['user_id'];?></td>
			<td><?php echo $row['first_name'];?></td>
			<td><?php echo $row['mi'];?></td>
			<td><?php echo $row['last_name'];?></td>
			<td><?php echo $row['address_id'];?></td>
            <td><?php echo $row['contact_number'];?></td>
			<td><img src = "<?php echo $row['user_img'];?>" style="width: 190px;" ></td>
			<td><?php echo $row['gcash_number'];?></td>
			<td><?php echo $row['gcash_name'];?></td>
			<td>
				<a href="#editManualModal<?php echo $row['user_id']?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
				<a href="#deleteEmployeeModal<?php echo $row['user_id']?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
			</td>
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
							<img src="https://placehold.co/600x400.png" style="width:100px;" name="image" id="image" alt=""> <br> <br>

							<label for="user_id">USER ID</label>
							<input type="text" name="user_id" id="user_id" readonly> <br>

							<label for="first_name">FIRST NAME</label>
							<input type="text" name="first_name" id="first_name" readonly> <br>

							<label for="mi">MIDDLE INITAL</label>
							<input type="text" name="mi" id="mi" readonly> <br>

							<label for="last_name">LAST NAME</label>
							<input type="text" name="last_name" id="last_name" readonly> <br>

							<label for="address_id">ADDRESS ID</label>
							<input type="text" name="address_id" id="address_id" readonly> <br>

							<label for="contact_number">CONTACT NUMBER</label>
							<input type="number" name="contact_number" id="contact_number" readonly> <br>

							<label for="gcash_number">GCASH NUMBER</label>
							<input type="text" name="gcash_number" id="gcash_number" readonly> <br>

							<label for="gcash_name">GCASH NAME</label>
							<input type="text" name="gcash_name" id="gcash_name" readonly> <br>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>		

			<!-- Edit Modal HTML -->
			<div id="editManualModal<?php echo $row['user_id']?>" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="users.php?user_id=<?php echo $row['user_id']?>">
								<?php $details = mysqli_fetch_assoc(findUser($row['user_id']));?>
									<div class="modal-header">						
										<h4 class="modal-title">Edit Users</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<!-- <label>Admin ID</label> -->
											<input type="hidden" class="form-control" name="user_id" readonly>
										</div>
												
										<div class="form-group">
											<label>Firstname</label>
											<input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']?>" required>
										</div>
										<div class="form-group">
											<label>Middle Inital</label>
											<input type="text" class="form-control" name="mi" value="<?php echo $row['mi']?>" required>
										</div>
										<div class="form-group">
											<label>Lastname</label>
											<input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']?>" required>
										</div>
										<div class="form-group">
											<label>Address ID</label>
											<input type="text" class="form-control" name="address_id" value="<?php echo $row['address_id']?>" required>
										</div>
										<div class="form-group">
											<label>Contact Number</label>
											<input type="text" class="form-control" name="contact_number" value="<?php echo $row['contact_number']?>" required>
										</div>
				
										<div class="form-group">
											<label>IMAGE</label>
											<input type="text" class="form-control" name="user_img" value="<?php echo $row['user_img']?>" readonly>
										</div>
										<div class="form-group">
											<label>GCASH NUMBER</label>
											<input type="text" class="form-control" name="gcash_number" value="<?php echo $row['gcash_number']?>" required>
										</div>
										<div class="form-group">
											<label>GCASH NAME</label>
											<input type="text" class="form-control" name="gcash_name" value="<?php echo $row['gcash_name']?>" required>
										</div>
									</div>
									<div class="modal-footer">
										<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
										<input type="submit" class="btn btn-info" name="edit" value="Save">
									</div>
								</form>
							</div>
						</div>
					</div>


					<div id="deleteEmployeeModal<?php echo $row['user_id']?>" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<form action="users.php" method="POST">
								<div class="modal-header">						
									<h4 class="modal-title">Delete Users</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">					
									<p>Are you sure you want to delete these Records?</p>
									<p class="text-warning"><small>This action cannot be undone.</small></p>
								</div>
								<div class="modal-footer">
									<input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">
									<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
									<input type="submit" name="deleteUsers" class="btn btn-danger" value="Delete">
								</div>
							</form>
						</div>
					</div>
				</div>
		<?php
		}
	?>
	</table>
	<script src="script.js"></script>
	<script>
		function openViewModal(user_id,first_name,mi,last_name,address_id,contact_number,gcash_number,gcash_name){

			document.getElementById('user_id').value = user_id;
			document.getElementById('first_name').value = first_name;
			document.getElementById('mi').value = mi;
			document.getElementById('last_name').value = last_name;
			document.getElementById('address_id').value = address_id;
			document.getElementById('contact_number').value = contact_number;
			document.getElementById('gcash_number').value = gcash_number;
			document.getElementById('gcash_name').value = gcash_name;
		}
	</script>
</body>
</html>