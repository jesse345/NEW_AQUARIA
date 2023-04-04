<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
    <link rel="stylesheet" href="../css/manage.css">
</head>

<body>
    <div class="page-wrapper">
        <?php include("../Includes/header.inc.php");

        if (!isset($_SESSION['id'])) {
            echo "<script>
                alert('Invalid Request. You need to login first');
                window.location.href = '../'
            </script>";
        }

        $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
        ?>
        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Manage Orders</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page">My Account</li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Orders</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-2">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                    <li class="nav-item ">

                                        <a class="nav-link " href="myAccount.php">Account
                                            Details
                                        </a>

                                    </li>
                                    <li class="nav-item active">

                                        <a class="nav-link " href="accountInfo.php">Account Info

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="manageProducts.php">Manage My Products</a>
                                    </li>

                                    <li class="nav-item active">
                                        <a class="nav-link active" href="manageOrders.php">Manage Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="myPurchase.php">My Purchase</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="shippingAddress.php">Shipping Info</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

                                        <div class="px-3 my-5 clearfix">
                                            <!-- Shopping cart table -->
                                            <div class="card border-0">
                                                <div class="card-body border-0">
                                                    <div class="table-responsive">
                                                        <table class="table  m-0">
                                                            <thead>
                                                                <tr>
                                                                    <!-- Set columns width -->
                                                                    <th class="text-center py-3 px-4" style="min-width: 330px;">Product Name &amp;
                                                                        Details</th>

                                                                    <th class="text-center py-3 px-4" style="min-width: 120px;width:200px">
                                                                        Order By</th>

                                                                    <th class="text-center py-3 px-4" style="min-width: 80px;width:80px">
                                                                        Quantity</th>

                                                                    <th class="text-center py-3 px-4" style="min-width: 120px;width:200px">
                                                                        Total Price</th>
                                                                    <th class="text-center py-3 px-4" style="min-width: 150px;width:200px">
                                                                        Status
                                                                    </th>
                                                                    <th></th>
                                                                    <th class="text-center align-middle py-3 px-0" style="min-width: 150px;width:200px">
                                                                        <a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart">
                                                                            <i class="ino ion-md-trash">

                                                                            </i>
                                                                        </a>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $orders = viewOrderedProduct('orders', 'seller', $_SESSION['id']);
                                                                if (mysqli_fetch_assoc($orders) > 0) {
                                                                    while ($order = mysqli_fetch_assoc($orders)) {

                                                                        $buyer = mysqli_fetch_assoc(getUser('user_details', 'user_id', $order['user_id']));
                                                                        $cart = mysqli_fetch_assoc(
                                                                            usersCart(
                                                                                'carts',
                                                                                array('user_id', 'product_id'),
                                                                                array($buyer['user_id'], $order['product_id'])
                                                                            )
                                                                        );
                                                                        $prod_det = mysqli_fetch_assoc(
                                                                            getProduct('product_details', 'product_id', $order['product_id'])
                                                                        );

                                                                ?>
                                                                        <tr>
                                                                            <td class="p-4">
                                                                                <div class="media align-items-center">
                                                                                    <img src="<?php echo $prod_det['product_img'] ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                                                    <div class="media-body">
                                                                                        <a href="#" class="d-block text-dark"><?php echo $prod_det['product_name'] ?></a>
                                                                                        <small>

                                                                                        </small>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center font-weight-semibold align-middle">
                                                                                <?php echo ucfirst($buyer['first_name']) . " " .  ucfirst($buyer['last_name']); ?>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <?php echo number_format($cart['quantity']) ?>
                                                                            </td>
                                                                            <td class="text-center font-weight-semibold align-middle">
                                                                                ₱ <?php echo number_format($cart['total']) ?>
                                                                            </td>
                                                                            <td class="text-center align-middle px-0">
                                                                                <?php
                                                                                if ($order['status'] == 'Approved') {
                                                                                    echo "<p class='bg-success rounded text-white'>Approved</p>";
                                                                                } else if ($order['status'] == 'Pending') {
                                                                                    echo "<p class='bg-gray rounded text-dark'>Pending for Approval</p>";
                                                                                } else if ($order['status'] == 'Decline') {
                                                                                    echo "<p class='bg-danger rounded text-white'>Disapproved</p>";
                                                                                } else if ($order['status'] == 'deliver') {
                                                                                    echo "<p class='bg-success rounded text-white'>To Ship</p>";
                                                                                } else if ($order['status'] == 'received') {
                                                                                    echo "<p class='bg-success rounded text-white'>Success</p>";
                                                                                } else if ($order['status'] == 'paid') {
                                                                                    echo "<p class='bg-success rounded text-white'>Paid</p>";
                                                                                } else if ($order['status'] == 'Cancelled') {
                                                                                    echo "<p class='bg-danger rounded text-white'>Cancelled</p>";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <!-- Spacing Purposes -->
                                                                                <div style="width:10px">
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center align-middle px-0">
                                                                                <?php if ($order['status'] == 'Pending') { ?>
                                                                                    <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                        <input type="submit" name="acceptOrder" value="Accept Order" class="btn-success">
                                                                                        <input type="submit" name="declineOrder" value="Decline Order" class="btn-danger mt-1">
                                                                                    </form>
                                                                                <?php } else if ($order['status'] == 'Approved') {
                                                                                    echo "<p class='bg-gray rounded text-dark'>Waiting for Payment</p>"; ?>
                                                                                <?php } else if ($order['status'] == 'Cancelled') {
                                                                                    echo "<p class='bg-danger rounded text-white'>Cancelled</p>";
                                                                                } else if ($order['status'] == 'Decline') {
                                                                                    echo 'Disapproved';
                                                                                } else if ($order['status'] == 'paid') { ?>
                                                                                    <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">

                                                                                        <input type="submit" name="shipProduct" value="Ship Product">
                                                                                        <br> <br>
                                                                                        <button class="btn-success">
                                                                                            <a href="../Pages/receipt.php?order_id=<?php echo $order['id'] ?>" class="text-white">
                                                                                                View Receipt</a>
                                                                                        </button>
                                                                                    </form>
                                                                                <?php } else if ($order['status'] == 'deliver' || $order['status'] == 'received') { ?>
                                                                                    <button class="btn-success">
                                                                                        <a href="../Pages/receipt.php?order_id=<?php echo $order['id'] ?>" class="text-white">
                                                                                            View Receipt</a>
                                                                                    </button>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                <?php }
                                                                } else {
                                                                    echo "<td colspan=6>No Ordered Products... </td>";
                                                                } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- / Shopping cart table -->





                                                </div>
                                            </div>
                                        </div>






                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- End .main -->
        <?php


        include("../Includes/footer.inc.php");
        ?>
    </div>

    <?php
    include("../Includes/loginModal.inc.php");
    include("../Includes/mobileMenu.inc.php");
    include("../Includes/scripts.inc.php");
    ?>

</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>