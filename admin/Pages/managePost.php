<?php
include("../Model/db.php");
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("location:../Pages/login.php");
}


if (isset($_GET['search'])) {
    $rec = searchPost($_GET['search']);
} else {
    $rec = getAllPost();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../Pages/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../Pages/fishmanual.php">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span>Fish Manual</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Pages/managePayment.php">
                    <i class='bx bx-money icon'></i>
                    <span>Manage Payment</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/managePost.php">
                    <i class='bx bx-repost icon'></i>
                    <span>Manage Post</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/manageProduct.php">
                    <i class='bx bxl-product-hunt icon'></i>
                    <span>Manage Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/manageReport.php">
                    <i class='bx bxs-report icon'></i>
                    <span>Manage Reports</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/manageSI.php">
                    <i class='bx bx-info-square icon'></i>
                    <span>Manage Shipping Info</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/manageUsers.php">
                    <i class='bx bx-user icon'></i>
                    <span>Manage Users</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/subscription.php">
                    <i class='bx bx-wallet icon'></i>
                    <span>Subcription</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/extensions.php">
                    <i class='bx bx-wallet icon'></i>
                    <span>Subcription Extensions</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/earnings.php">
                    <i class='bx bx-money icon'></i>
                    <span>Earnings</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Pages/logout.php">
                    <i class='bx bx-log-out icon'></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- table here -->
        <div class="container-fluid mt-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex">
                        <div class="mr-auto">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Post</h6>
                        </div>
                        <div class="ml-auto">
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th>BLOG ID</th>
                                    <th>USER ID</th>
                                    <th>DESCRIPTION</th>
                                    <th>PURPOSE</th>
                                    <th>IMAGE</th>
                                    <th>DATE CREATED</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <?php
                            if (mysqli_num_rows($rec) > 0) {
                                while ($row = mysqli_fetch_assoc($rec)) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['purpose']; ?></td>
                                            <td><img src="../../img/<?php echo $row['image']; ?>" style="width: 190px;"></td>
                                            <td><?php echo $row['date_created']; ?></td>
                                            <td>
                                                <a href="#deleteEmployeeModal<?php echo $row['id']; ?>" class="delete" data-toggle="modal"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                <a href="#viewMore<?php echo $row['id']; ?>" data-toggle="modal" title="View"><i class="fa fa-eye text-success" style="position:absolute;margin-top:5px;"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <div id="deleteEmployeeModal<?php echo $row['id'] ?>" class="modal fade">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="../Controller/postController.php" method="POST">
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this record?</p>
                                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                                                        <input type="submit" name="deletepost" class="btn btn-danger" value="Yes">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="viewMore<?php echo $row['id'] ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-body" style="text-align:center;">

                                                    <div class="form-group row mt-3">
                                                        <label class="col-sm-4 col-form-label">BLOG ID</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="payment_id" value="<?php echo $row['id']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">USER ID</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">DESCRIPTION</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="payment_type" value="<?php echo $row['description']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">PURPOSE</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="date_created" value="<?php echo $row['purpose']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">IMAGE</label>
                                                        <div class="col-sm-8">
                                                            <img src="../../img/<?php echo $row['image']; ?>" style="width: 190px;" class="img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">DATE CREATED</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="reference_no" value="<?php echo $row['date_created']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } else {
                                echo "<td colspan = 7>NO RECORD FOUND</td>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>