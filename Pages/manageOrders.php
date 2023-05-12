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
            <div class="page-header text-center" style="background-image: url('../assets/images/fish2.jpg')">
                <div class="container">
                    <h1 class="page-title text-white">Manage Orders</h1>
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
                                    <li class="nav-item">
                                        <a class="nav-link " href="gcash_info.php">Gcash Info
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
                                        <a class="nav-link" href="../includes/logout.php">Sign Out</a>
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
                                                    <div>

                                                        <?php $tp = countOrders($_SESSION['id']);

                                                        ?>
                                                        <p style="font-size: 1.5rem"> <b>Total Products Sold: </b> <span><?php echo mysqli_num_rows($tp) ?></span></p>
                                                        <?php
                                                        $ti = 0;
                                                        while ($total = mysqli_fetch_assoc($tp)) {
                                                            $cart = mysqli_fetch_assoc(getUser('carts', 'id', $total['cart_id']));
                                                            $ti += $cart['total'];
                                                        } ?>
                                                        <p style="font-size: 1.5rem"> <b>Total Income: </b> <span>₱ <?php echo number_format($ti, 2) ?></span></p>


                                                    </div>
                                                    <div class="table-responsive">
                                                        <!-- <div class="mb-1">
                                                            <a href="manageOrders.php" class="btn btn-primary mb-1" style="border-radius: 20px">All</a>
                                                            <a href="manageOrders.php?type=Pending" class="btn btn-primary mb-1" style="border-radius: 20px">Pending</a>
                                                            <a href="manageOrders.php?type=Decline" class="btn btn-primary mb-1" style="border-radius: 20px">Decline</a>
                                                            <a href="manageOrders.php?type=Cancelled" class="btn btn-primary mb-1" style="border-radius: 20px">Cancelled</a>
                                                            <a href="manageOrders.php?type=paid" class="btn btn-primary mb-1" style="border-radius: 20px">To Pay</a>
                                                            <a href="manageOrders.php?type=deliver" class="btn btn-primary mb-1" style="border-radius: 20px">To Ship</a>
                                                            <a href="manageOrders.php?type=received" class="btn btn-primary mb-1" style="border-radius: 20px">Success</a>
                                                        </div> -->
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
                                                                    <th class="text-center py-3 px-4" style="min-width: 150px;width:200px">
                                                                        Date Created
                                                                    </th>

                                                                    <th class="text-center py-3 px-4" style="min-width: 150px;width:200px">
                                                                        Date End
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
                                                                if (isset($_GET['type'])) {
                                                                    $orders = getTypes('seller', $_SESSION['id'], $_GET['type']);
                                                                } else {


                                                                    $orders = viewOrderedProduct('orders', 'seller', $_SESSION['id']);
                                                                }
                                                                if (mysqli_num_rows($orders) > 0) {
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
                                                                                        <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>" class="d-block text-dark">
                                                                                            <?php echo $prod_det['product_name'] ?>
                                                                                        </a>
                                                                                        <small>
                                                                                            Payment Option: <?php echo $order['payment_option'] == 1 ? 'Pay On Delivery' : 'Online Payment' ?>
                                                                                        </small>
                                                                                        <br>
                                                                                        <small>
                                                                                            Delivery Type: <?php echo $prod_det['shipping_type'] ?>
                                                                                        </small>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center font-weight-semibold align-middle">
                                                                                <?php echo ucfirst($buyer['first_name']) . " " . ucfirst($buyer['last_name']); ?>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <?php echo number_format($cart['quantity']) ?>
                                                                            </td>
                                                                            <td class="text-center font-weight-semibold align-middle">
                                                                                ₱
                                                                                <?php echo number_format($cart['total'], 2) ?>
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
                                                                            <td class="text-center align-middle px-0">
                                                                                <?php
                                                                                echo date("M d Y", strtotime($order['date_created']));
                                                                                ?>
                                                                            </td>

                                                                            <td class="text-center align-middle px-0">
                                                                                <?php
                                                                                echo $order['date_end'] == "0000-00-00 00:00:00" ? '' : date("M d Y", strtotime($order['date_end']));
                                                                                ?>
                                                                            </td>
                                                                            <td>

                                                                            </td>
                                                                            <td>
                                                                                <!-- Spacing Purposes -->
                                                                                <div style="width:10px">
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center align-middle px-0">
                                                                                <?php if ($order['status'] == 'Pending') { ?>
                                                                                    <!-- <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                        <input type="submit" name="acceptOrder" value="Accept Order" class="btn-success">
                                                                                        <input type="submit" name="declineOrder" value="Decline Order" class="btn-danger mt-1">
                                                                                    </form> -->
                                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#acceptOrder<?php echo $order['id'] ?>">
                                                                                        <span>Accept Order</span>

                                                                                    </button>

                                                                                    <button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#declineOrder<?php echo $order['id'] ?>">
                                                                                        <span>Decline Order</span>

                                                                                    </button>
                                                                                    <?php } else if ($order['status'] == 'Approved') {
                                                                                    if ($order['payment_option'] == 1) { ?>

                                                                                        <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                            <a href="../Pages/chat.php?user=<?php echo $order['user_id']; ?>" class="btn btn-success">
                                                                                                Chat</a>
                                                                                            <br><br>
                                                                                            <!-- <input type="submit" name="shipProduct" value="Ship Product" class="btn btn-secondary"> -->
                                                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ship<?php echo $order['id'] ?>">
                                                                                                <span>Ship Product</span>

                                                                                            </button>
                                                                                        </form>

                                                                                    <?php } else {
                                                                                        echo "<p class='bg-gray rounded text-dark'>Waiting for Payment</p>";
                                                                                    }
                                                                                    ?>

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
                                                                                    <?php if ($order['payment_option'] != 1) { ?>
                                                                                        <button class="btn-success">
                                                                                            <a href="../Pages/receipt.php?order_id=<?php echo $order['id'] ?>" class="text-white">
                                                                                                View Receipt</a>
                                                                                        </button>
                                                                                    <?php } ?>

                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="acceptOrder<?php echo $order['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">Confirm Order?</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary" name="acceptOrder">Accept</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="declineOrder<?php echo $order['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">Decline Order?</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary" name="declineOrder">Accept</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="ship<?php echo $order['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">Ship Product?</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary" name="shipProduct">Ship</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>


                                                                <?php }
                                                                } else {
                                                                    echo "<td colspan=6>Empty Record... </td>";
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