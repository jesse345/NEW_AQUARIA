<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}
	$rec = getallproduct();
	
	$product_id;
	if(isset($_GET["delete"])){
		$product_id = $_GET["product_id"];
			
			deleterecord($product_id);
			echo '<script>alert("Are you sure you want to delete?")</script>';
	}

	if(isset($_GET['search'])){
		$rec = searchProduct($_GET['search']);
	}else{
		$rec = getallproduct();
	}
		

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
	<h1 style="text-align:center;">PRODUCTS</h1>
	<div class="search-container">
			<form action="product.php">
				<input type="text" placeholder="Search.." name="search">
				<input type="submit" name="submit" value="Search">
			<!-- <button type="submit"><i class="fa fa-search"></i></button> -->
			</form>
		</div>
		<tr>
			<th></th>
			<th>PRODUCT ID</th>
			<th>PRODUCT NAME</th>
			<th>QUANTITY</th>
			<th>DESCRIPTION</th>
			<th>PRICE</th>
			<th>PRODUCT IMAGE</th>
			<th>CATEGORY</th>
			<th>TANK TYPE</th>
			<th>DIMENSION</th>
			<th>THICKNESS</th>
			<th>FISH TYPE</th>
			<th>FISH CLASS</th>
			<th>SIZE</th>
			<th>GENDER</th>
			<th>AGE</th>
			<th>SPECIFICATION</th>
			<th>EXPIRATION DATE</th>
			<th>BENEFITS</th>
			<th>SHIPPING TYPE</th>
			<th>ACTIONS</th>
		</tr>
		
		<?php
			if(mysqli_num_rows($rec)>0){
				while($row = mysqli_fetch_assoc($rec)){	
				// $gp = mysqli_fetch_assoc(getproducts($row['product_id']));
				
		?>

		<tr>
		<td><button onclick="openViewModal('<?php echo $row['product_id']?>','<?php echo $row['product_name']?>','<?php echo $row['quantity']?>', 
		'<?php echo $row['description']?>','<?php echo $row['price']?>','<?php echo $row['category']?>','<?php echo $row['tank_type']?>',
		'<?php echo $row['dimension']?>','<?php echo $row['thickness']?>','<?php echo $row['fish_type']?>','<?php echo $row['fish_class']?>',
		'<?php echo $row['size']?>','<?php echo $row['gender']?>','<?php echo $row['age']?>','<?php echo $row['specification']?>','<?php echo $row['expiration_date']?>',
		'<?php echo $row['benefits']?>','<?php echo $row['shipping_type']?>',)
		" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >VIEW</button></td>
			<td><?php echo $row['product_id'];?></td>
			<td><?php echo $row['product_name'];?></td>
			<td><?php echo $row['quantity'];?></td>
			<td><?php echo $row['description'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><img src = "<?php echo $row['product_img'];?>" style="width: 190px;" ></td>
			<td><?php echo $row['category'];?></td>
			<td><?php echo $row['tank_type'];?></td>
			<td><?php echo $row['dimension'];?></td>
			<td><?php echo $row['thickness'];?></td>
			<td><?php echo $row['fish_type'];?></td>
			<td><?php echo $row['fish_class'];?></td>
			<td><?php echo $row['size'];?></td>
			<td><?php echo $row['gender'];?></td>
			<td><?php echo $row['age'];?></td>
			<td><?php echo $row['specification'];?></td>
			<td><?php echo $row['expiration_date'];?></td>
			<td><?php echo $row['benefits'];?></td>
			<td><?php echo $row['shipping_type'];?></td>
			<form action="product.php?product_id=<?php echo $row['product_id'] ?>" METHOD="POST">
				<td><button type="submit" name="delete">DELETE</button><br>
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
							<img src="<?php echo $row['product_img'];?>" style="width:100px;" name="product_img" id="product_img" alt=""> <br> <br>

							<label for="product_id">ProductID</label>
							<input type="text" name="product_id" id="product_id" readonly> <br>

							<label for="product_name">ProductName</label>
							<input type="text" name="product_name" id="product_name" readonly> <br>

							<label for="quantity">Quantity</label>
							<input type="text" name="quantity" id="quantity" readonly> <br>

							<label for="description">Description</label>
							<input type="datetime" name="description" id="description" readonly> <br>

							<label for="price">Price</label>
							<input type="text" name="price" id="price" readonly> <br>

							<label for="category">Category No</label>
							<input type="text" name="category" id="category" readonly> <br>

							<label for="tank_type">TANK TYPE</label>
							<input type="text" name="tank_type" id="tank_type" readonly> <br>

							<label for="dimension">DIMENSION</label>
							<input type="text" name="dimension" id="dimension" readonly> <br>

							<label for="thickness">THICKNESS</label>
							<input type="text" name="thickness" id="thickness" readonly> <br>

							<label for="fish_type">FISH TYPE</label>
							<input type="text" name="fish_type" id="fish_type" readonly> <br>

							<label for="fish_class">FISH CLASS</label>
							<input type="text" name="fish_class" id="fish_class" readonly> <br>

							<label for="size">SIZE</label>
							<input type="text" name="size" id="size" readonly> <br>

							<label for="gender">GENDER</label>
							<input type="text" name="gender" id="gender" readonly> <br>

							<label for="age">AGE</label>
							<input type="text" name="age" id="age" readonly> <br>

							<label for="specification">SPECIFICATION</label>
							<input type="text" name="specification" id="specification" readonly> <br>

							<label for="expiration_date">EXPIRATION DATE</label>
							<input type="text" name="expiration_date" id="expiration_date" readonly> <br>

							<label for="benefits">BENEFITS</label>
							<input type="text" name="benefits" id="benefits" readonly> <br>

							<label for="shipping_type">SHIPPING TYPE</label>
							<input type="text" name="shipping_type" id="shipping_type" readonly> <br>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php }
		} else{
			echo"<td colspan = 21>NO RECORD FOUND</td>";
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
		function openViewModal(product_id,product_name,quantity,description,price,category,tank_type,dimension,thickness,fish_type,fish_class,size,gender,age,specification,expiration_date,benefits,shipping_type){

			document.getElementById('product_id').value = product_id;
			document.getElementById('product_name').value = product_name;
			document.getElementById('quantity').value = quantity;
			document.getElementById('description').value = description;
			document.getElementById('price').value = price;
			document.getElementById('category').value = category;
			document.getElementById('tank_type').value = tank_type;
			document.getElementById('dimension').value = dimension;
			document.getElementById('thickness').value = thickness;
			document.getElementById('fish_type').value = fish_type;
			document.getElementById('fish_class').value = fish_class;
			document.getElementById('size').value = size;
			document.getElementById('gender').value = gender;
			document.getElementById('age').value = age;
			document.getElementById('specification').value = specification;
			document.getElementById('expiration_date').value = expiration_date;
			document.getElementById('benefits').value = benefits;
			document.getElementById('shipping_type').value = shipping_type;

			// document.getElementById('receipt_img').src = receipt_img;
			
 
		}
	</script>
</body>
</html>