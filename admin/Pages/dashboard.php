<?php
include("../Model/db.php");
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("location:../Pages/login.php");
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
    <link href="../assets/css/dashboard.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
                <a class="nav-link" href="dashboard.php">
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
                <a class="nav-link" href="../Pages/filterProduct.php">
                    <i class='bx bxl-product-hunt icon'></i>
                    <span>Filter Fishes</span></a>
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Dashboard</h1>
                    </div>
                    <!--row-->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $num = countUser();
                                                echo $num;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Product Sold</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $received = countReceived();
                                                echo $received;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Revenue from Subscription</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $tAmount = sumAmount();
                                                echo $tAmount;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-money-bill-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Subscribed</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $subscribers = countSubscribers();
                                                echo $subscribers;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bell fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-8 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Most Sale Products base on Category</h6>
                                </div>
                                <div class="card-body">
                                    <?php

                                    $total_number_of_products = mysqli_num_rows(getAllProducts());
                                    $product_order = getAllOrders();
                                    $aquarium = 0;
                                    $fishes = 0;
                                    $equipment = 0;
                                    $probiotics = 0;
                                    $color = 0;
                                    $medication = 0;
                                    $vitamin = 0;

                                    while ($prod = mysqli_fetch_assoc($product_order)) {
                                        $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $prod['product_id']));
                                        if ($prod_det['category'] == "Aquarium") {
                                            $aquarium++;
                                        } else if ($prod_det['category'] == "Fishes") {
                                            $fishes++;
                                        } else if ($prod_det['category'] == "Equipment & Accessories") {
                                            $equipment++;
                                        } else if ($prod_det['category'] == "Probiotics") {
                                            $probiotics++;
                                        } else if ($prod_det['category'] == "Vitamins") {
                                            $vitamin++;
                                        } else if ($prod_det['category'] == "Color Enhancer") {
                                            $color++;
                                        } else if ($prod_det['category'] == "Medications") {
                                            $medication++;
                                        }
                                    }

                                    ?>
                                    <h4 class="small font-weight-bold">Aquarium <span class="float-right"><?php echo floor(($aquarium / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo floor(($aquarium / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($aquarium / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Fishes<span class="float-right"><?php echo floor(($fishes / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo floor(($fishes / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($fishes / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Equipment & Accessories <span class="float-right"><?php echo floor(($equipment / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo floor(($equipment / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($equipment / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Probiotics<span class="float-right"><?php echo floor(($probiotics / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo floor(($probiotics / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($probiotics / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Color Enhancer<span class="float-right"><?php echo floor(($color / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo floor(($color / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($color / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Medication<span class="float-right"><?php echo floor(($medication / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo floor(($medication / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($medication / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Vitamin<span class="float-right"><?php echo floor(($vitamin / $total_number_of_products) * 100) ?>%</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo floor(($vitamin / $total_number_of_products) * 100) ?>%" aria-valuenow="<?php echo floor(($vitamin / $total_number_of_products) * 100) ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <input type="hidden" name="standard" value="<?php echo mysqli_num_rows(countSubscriptionType(1)) ?>">
                        <input type="hidden" name="advanced" value="<?php echo mysqli_num_rows(countSubscriptionType(2)) ?>">
                        <input type="hidden" name="premium" value="<?php echo mysqli_num_rows(countSubscriptionType(3)) ?>">



                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Subscription Sources</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Standard
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Advance
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Premium
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
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