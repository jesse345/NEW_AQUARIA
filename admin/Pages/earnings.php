<?php
include("../Model/db.php");
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("location:../Pages/login.php");
}
$rec = getAllUser();


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
    <style>
        .edit:hover {
            color: green !important;
        }

        .delete:hover {
            color: red !important;
        }

        .view-more:hover {
            color: green !important;
        }
    </style>


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

        <!-- table here -->
        <div class="container-fluid mt-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex">
                        <div class="mr-auto">
                            <h6 class="m-0 font-weight-bold text-primary">Subscription Earnings Summary</h6>
                        </div>
                        <div class="ml-auto">
                            Filter By:
                            <select name="" id="" onchange="location = this.value;">
                                <option value="earnings.php" selected>View All</option>

                                <option value="earnings.php?subscription_type=1" <?php if (isset($_GET['subscription_type']) && $_GET['subscription_type'] == 1) { ?> selected <?php } ?>>
                                    Standard
                                </option>
                                <option value="earnings.php?subscription_type=2" <?php if (isset($_GET['subscription_type']) && $_GET['subscription_type'] == 2) { ?> selected <?php } ?>>
                                    Advanced
                                </option>
                                <option value="earnings.php?subscription_type=3" <?php if (isset($_GET['subscription_type']) && $_GET['subscription_type'] == 3) { ?> selected <?php } ?>>
                                    Premium
                                </option>

                            </select>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <tr>

                                    <th>Subscription Id</th>
                                    <th>User</th>
                                    <th>Subscription Type</th>
                                    <th>Date Subscribe</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                if (isset($_GET['subscription_type'])) {
                                    $subscribe = getSubscribeUser('subscription', 'subscription_type', $_GET['subscription_type']);
                                } else {
                                    $subscribe = getAllSubscription('subscription');
                                }



                                $total = 0;
                                while ($row = mysqli_fetch_assoc($subscribe)) {
                                    $total +=  $row['amount'];
                                    $users = mysqli_fetch_assoc(getSubscribeUser('user_details', 'user_id', $row['user_id']));
                                    if ($row['status'] == "Approved") {
                                ?>
                                        <tr>

                                            <td><?php echo $row['subscription_id'] ?></td>
                                            <td><?php echo $users['first_name'] . " " . $users['last_name']  ?></td>
                                            <td>

                                                <?php if ($row['subscription_type'] == 1) {
                                                    echo "Standard";
                                                } else if ($row['subscription_type'] == 2) {
                                                    echo "Advanced";
                                                }
                                                if ($row['subscription_type'] == 3) {
                                                    echo "Premium";
                                                } ?>

                                            </td>
                                            <td><?php echo date('M d Y', strtotime($row['date_created'])) ?></td>
                                            <td><?php echo number_format($row['amount'], 2) ?></td>


                                        </tr>
                                <?php }
                                } ?>
                                <tr>
                                    <td colspan="4">

                                    </td>
                                    <td>
                                        Total: <?php echo number_format($total, 2) ?>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <!-- <button onclick="downloadTableAsCSV()" class="btn btn-primary">Download as CSV</button> -->

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        function downloadTableAsCSV() {
            const table = document.querySelector('#dataTable');
            const rows = Array.from(table.querySelectorAll('tr'));

            const csv = rows.map(row => {
                const cells = Array.from(row.querySelectorAll('th, td'));
                return cells.map(cell => cell.textContent).join(',');
            }).join('\n');

            const blob = new Blob([csv], {
                type: 'text/csv'
            });
            const url = URL.createObjectURL(blob);

            const link = document.createElement('a');
            link.href = url;
            link.download = 'myTable.csv';

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
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