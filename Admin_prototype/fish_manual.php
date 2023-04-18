<!DOCTYPE html>
<?php
	include("db.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['admin_id'])){
		header("location: admin_login.php");
	}
	$rec = getAllManual();

?>


<html>
<head>
	<title> E AQUARIA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
	body{
		background-color:#e4e9f7;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius:1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
	
	.table-title {        
		padding-bottom: 15px;
	    background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 1px 1px 0 0;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
	
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 1px;
		border: none;
		outline: none !important;
		margin-left: 10px;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
		
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 1px;
		vertical-align: middle;
		margin-right: 10px;
	}
    
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 1px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 1px 1px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 1px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 1px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}

	.search-container {
  		float: right;
	}


	.search-container button {
	/* float: right; */
	padding: 6px 13px;
	margin-right: 16px;
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
	<br>
	<br>
	<!-- <h3 class="text-center text-success" id="message"><?php echo  $success; ?></h3> -->
    <!-- <h3 class="text-center text-success" id="message"></h3> -->
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>FISH <b>MANUAL</b></h2>
					</div>
					<div class="col-sm-6">
						
						<a href="#addManualModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Fish Manual</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
						<div class="search-container">
							<form action="/action_page.php">
							<input type="text" placeholder="Search.." name="search">
							<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
                </div>
			</div>

			<table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>Manual ID</th>
                        <th>Admin ID</th>
						<th>Title</th>
                        <th>Description</th>
						<th>Actions</th>
                    </tr>
                </thead>
                <?php
			        while($row = mysqli_fetch_assoc($rec)){	
		        ?>
                <tbody>
					<tr>
						<td><?php echo $row['manual_id'];?></td>
						<td><?php echo $row['admin_id'];?></td>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['description'];?></td>
						<td>
							<a href="#editManualModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<?php
						}
					?>
                </tbody>
            </table>
        </div>
    </div>

		<!-- Add Modal HTML -->

	<div id="addManualModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form method="POST" action="controller.php">
					<div class="modal-header">						
						<h4 class="modal-title">Add Fish Manual</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
						<!-- <div class="form-group">
							<label>Fish Manual ID</label>
							<input type="text" class="form-control" name="manual_id" placeholder="Enter Manual ID" required>
						</div>				 -->
						<div class="form-group">
							<!-- <label>Admin ID</label> -->
							<input type="hidden" class="form-control" name="admin_id" placeholder="Enter Admin ID" value="1"  required>
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="title" placeholder="Enter Title" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Enter Description" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
					</div>
				</form>

			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="editManualModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="GET" action="fish_manual.php">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Fish Manual</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="form-group">
							<label>Admin ID</label>
							<input type="text" class="form-control" name="admin_id" disabled>
						</div>
						<div class="form-group">
							<label>Fish Manual ID</label>
							<input type="email" class="form-control" name="manual_id" disabled>
						</div>					
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="script.js"></script>
	<script src="javascript.js"></script>
</body>
</html>