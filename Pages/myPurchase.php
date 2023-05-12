<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
    <link rel="stylesheet" href="../css/manage.css">
    <link rel="stylesheet" href="../css/feedback.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
                    <h1 class="page-title text-white">My Purchase</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Purchase</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-2">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">

                                    <li class="nav-item">

                                        <a class="nav-link" href="myAccount.php">Account
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


                                    <li class="nav-item">
                                        <a class="nav-link" href="manageOrders.php">Manage Orders</a>
                                    </li>

                                    <li class="nav-item active">
                                        <a class="nav-link active" href="myPurchase.php">My Purchase</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="shippingAddress.php">Shipping Info</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="manageSubscription.php">Manage Subscription</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="../includes/logout.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">

                                    <div class="px-3 my-5 clearfix">
                                        <!-- Shopping cart table -->
                                        <div class="card border-0">
                                            <div class="card-body border-0">
                                                <div class="table-responsive">
                                                    <!-- <div class="mb-1">
                                                        <a href="myPurchase.php" class="btn btn-primary mb-1" style="border-radius: 20px">All</a>
                                                        <a href="myPurchase.php?type=Pending" class="btn btn-primary mb-1" style="border-radius: 20px">Pending</a>
                                                        <a href="myPurchase.php?type=Decline" class="btn btn-primary mb-1" style="border-radius: 20px">Decline</a>
                                                        <a href="myPurchase.php?type=Cancelled" class="btn btn-primary mb-1" style="border-radius: 20px">Cancelled</a>
                                                        <a href="myPurchase.php?type=paid" class="btn btn-primary mb-1" style="border-radius: 20px">To Pay</a>
                                                        <a href="myPurchase.php?type=deliver" class="btn btn-primary mb-1" style="border-radius: 20px">To Ship</a>
                                                        <a href="myPurchase.php?type=received" class="btn btn-primary mb-1" style="border-radius: 20px">Success</a>
                                                    </div> -->
                                                    <table class="table  m-0">
                                                        <thead>
                                                            <tr>
                                                                <!-- Set columns width -->
                                                                <th class="text-center py-3 px-4" style="min-width: 330px;">Product Name &amp;
                                                                    Details</th>

                                                                <th class="text-center py-3 px-4" style="min-width: 80px;width:80px">
                                                                    Quantity</th>

                                                                <th class="text-center py-3 px-4" style="min-width: 120px;width:200px">
                                                                    Total Price</th>
                                                                <th class="text-center py-3 px-4" style="min-width: 150px;width:200px">
                                                                    Date Created
                                                                </th>

                                                                <th class="text-center py-3 px-4" style="min-width: 150px;width:200px">
                                                                    Date End
                                                                </th>
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
                                                            if (isset($_GET['type'])) {
                                                                $orders = getTypes('user_id', $_SESSION['id'], $_GET['type']);
                                                            } else {


                                                                $orders = viewOrderedProduct('orders', 'user_id', $_SESSION['id']);
                                                            }
                                                            if (mysqli_num_rows($orders) > 0) {
                                                                while ($order = mysqli_fetch_assoc($orders)) {

                                                                    $cart = mysqli_fetch_assoc(
                                                                        usersCart(
                                                                            'carts',
                                                                            array('user_id', 'product_id'),
                                                                            array($_SESSION['id'], $order['product_id'])
                                                                        )
                                                                    );

                                                                    $prod_det = mysqli_fetch_assoc(
                                                                        getProduct('product_details', 'product_id', $cart['product_id'])
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

                                                                        <td class="align-middle p-4 text-center">
                                                                            <?php echo number_format($cart['quantity']) ?></td>
                                                                        </td>
                                                                        <td class="text-center font-weight-semibold align-middle p-4">
                                                                            ₱ <?php echo number_format($cart['total'], 2) ?></td>

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
                                                                        <td class="text-center align-middle px-0">
                                                                            <?php

                                                                            if ($order['status'] == 'Approved') {
                                                                                echo "<p class='bg-success rounded text-white'>Approved</p>";
                                                                            } else if ($order['status'] == 'Pending') {
                                                                                echo "<p class='bg-gray rounded text-dark'>Pending for Approval</p>";
                                                                            } else if ($order['status'] == 'Decline') {
                                                                                echo "<p class='bg-danger rounded text-white'>Disapproved</p>";
                                                                            } else if ($order['status'] == 'Cancelled') {
                                                                                echo "<p class='bg-danger rounded text-white'>Cancelled</p>";
                                                                            } else if ($order['status'] == 'deliver') {
                                                                                echo "<p class='bg-success rounded text-white'>To Ship</p>";
                                                                            } else if ($order['status'] == 'received') {
                                                                                echo "<p class='bg-success rounded text-white'>Success</p>";
                                                                            } else if ($order['status'] == 'paid') {
                                                                                echo "<p class='bg-success rounded text-white'>Paid</p>";
                                                                            } ?>
                                                                        </td>
                                                                        <td>
                                                                            <!-- Spacing Purposes -->
                                                                            <div style="width:10px">
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center align-middle px-0">
                                                                            <?php if ($order['status'] == 'Pending') { ?>
                                                                                <button class="bg-danger text-white rounded border-danger" type="button" name="removeCart" id="removeCart" data-toggle="modal" data-target="#cancelModal<?php echo $order['id'] ?>">
                                                                                    Cancel Order
                                                                                </button>


                                                                                <div class="modal fade" id="cancelModal<?php echo $order['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content p-5">
                                                                                            <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                                <input type="hidden" name="cart_id" value="<?php echo $cart['id'] ?>">
                                                                                                <div class="modal-body text-left">
                                                                                                    <h4>
                                                                                                        Are you sure you want to cancel this order?
                                                                                                    </h4>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                                    <button type="submit" name="cancelOrder" class="btn btn-primary">Yes</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            <?php } else if ($order['status'] == 'Approved') { ?>

                                                                                <?php
                                                                                if ($order['payment_option'] == 1) { ?>
                                                                                    <a href="../Pages/chat.php?user=<?php echo $order['seller'] ?>" class="btn btn-success">
                                                                                        Chat</a>

                                                                                <?php  } else { ?>
                                                                                    <a href="#modal-addpost<?php echo $order['id'] ?>" class="btn btn-success" data-toggle="modal">
                                                                                        Send Payment</a>
                                                                                <?php }
                                                                                ?>
                                                                            <?php } else if ($order['status'] == 'Decline') {
                                                                                echo "<p class='bg-danger rounded text-white'>Disapproved</p>";
                                                                            } else if ($order['status'] == 'deliver') { ?>

                                                                                <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                    <!-- <input type="submit" name="productReceived" value="Receive Product" class=" btn-success"> -->
                                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#received<?php echo $order['id'] ?>">
                                                                                        <span>Receive Product</span>

                                                                                    </button>
                                                                                    <br> <br>

                                                                                    <?php if ($order['payment_option'] != 1) {  ?>
                                                                                        <button class="btn-success">
                                                                                            <a href="../Pages/receipt.php?order_id=<?php echo $order['id'] ?>" class="text-white">
                                                                                                View Receipt</a>
                                                                                        </button>
                                                                                    <?php } ?>

                                                                                </form>
                                                                            <?php } else if ($order['status'] == 'received') { ?>
                                                                                <?php if ($order['payment_option'] != 1) {  ?>
                                                                                    <button class="btn-success">
                                                                                        <a href="../Pages/receipt.php?order_id=<?php echo $order['id'] ?>" class="text-white">
                                                                                            View Receipt</a>
                                                                                    </button>
                                                                                    <br><br>

                                                                                <?php } ?>



                                                                                <a href="#review" data-toggle="modal" data-target="#exampleModal<?php echo $order['id'] ?>">
                                                                                    <?php
                                                                                    $check = mysqli_fetch_assoc(userProductReviews($_SESSION['id'], $order['product_id']));

                                                                                    echo $check > 0 ? "View your review" : " Leave Review";
                                                                                    ?>
                                                                                </a>



                                                                            <?php } else if ($order['status'] == 'paid') { ?>
                                                                                <button class="btn-success">
                                                                                    <a href="../Pages/receipt.php?order_id=<?php echo $order['id'] ?>" class="text-white">
                                                                                        View Receipt</a>
                                                                                </button>




                                                                            <?php } else if ($order['status'] == 'Cancelled') {
                                                                                echo "<p class='bg-danger rounded text-white'>Cancelled</p>";
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="received<?php echo $order['id']  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <form action="../Controller/OrdersController.php?order_id=<?php echo $order['id'] ?>" method="POST">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Receive Product?</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary" name="productReceived">Receive</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal fade" id="exampleModal<?php echo $order['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                            <div class="modal-content p-5">
                                                                                <div class="modal-header">
                                                                                    <?php
                                                                                    $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $order['product_id']));
                                                                                    ?>
                                                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $prod_det['product_name'] . " Product Review" ?></h5>

                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="../Controller/FeedbackController.php?product_id=<?php echo $order['product_id'] ?>" method="POST">
                                                                                        <style>
                                                                                            .disabled {
                                                                                                pointer-events: none;
                                                                                            }
                                                                                        </style>
                                                                                        <div class="form-group">
                                                                                            <label for="rating">Rate the product *</label>
                                                                                            <div class="d-flex">
                                                                                                <div class="text-primary rating">


                                                                                                    <?php
                                                                                                    if ($check > 0) {
                                                                                                        for ($j = 0; $j < 5 - $check['rate']; $j++) {
                                                                                                    ?>
                                                                                                            <i class="far fa-star" style="font-size: 2rem;"></i>
                                                                                                        <?php }
                                                                                                        for ($i = 0; $i < $check['rate']; $i++) {
                                                                                                        ?>
                                                                                                            <i class="fas fa-star" style="font-size: 2rem;"></i>
                                                                                                        <?php }
                                                                                                    } else {
                                                                                                        ?>

                                                                                                        <input type="radio" name="rating" value="5" id="5" required>
                                                                                                        <label for="5">☆</label>
                                                                                                        <input type="radio" name="rating" value="4" id="4" required>
                                                                                                        <label for="4">☆</label>
                                                                                                        <input type="radio" name="rating" value="3" id="3" required>
                                                                                                        <label for="3">☆</label>
                                                                                                        <input type="radio" name="rating" value="2" id="2" required>
                                                                                                        <label for="2">☆</label>
                                                                                                        <input type="radio" name="rating" value="1" id="1" required>
                                                                                                        <label for="1">☆</label>
                                                                                                    <?php } ?>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>


                                                                                        <div class="form-group">
                                                                                            <label for="message">Your Review *</label>
                                                                                            <?php
                                                                                            if ($check > 0) {
                                                                                            ?>
                                                                                                <textarea id="message" cols="30" rows="5" class="form-control" name="feedback" required disabled><?php echo $check['feedback'] ?></textarea>
                                                                                            <?php } else { ?>
                                                                                                <textarea id="message" cols="30" rows="5" class="form-control" name="feedback" required></textarea>

                                                                                            <?php } ?>
                                                                                        </div>
                                                                                        <div class="form-group mb-0">
                                                                                            <?php
                                                                                            if ($check <= 0) {
                                                                                            ?>
                                                                                                <input type="submit" name="review" value="Leave Your Review" class="btn btn-primary px-3">
                                                                                            <?php } ?>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal fade" id="modal-addpost<?php echo $order['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">GCASH PAYMENT</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true"><i class="icon-close"></i></span>
                                                                                    </button>
                                                                                </div>
                                                                                <form method="post" action="../Controller/PaymentController.php?order_id=<?php echo $order['id'] ?>" enctype="multipart/form-data">
                                                                                    <div class="modal-body p-5">
                                                                                        <div class="d-block">
                                                                                            <?php $s = mysqli_fetch_assoc(getUser('user_details', 'user_id', $order['seller'])) ?>
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Gcash Name</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $s['gcash_name'] ?>" style="width: 100%;" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Gcash Number</label>
                                                                                                <input type="text" class="form-control" value="<?php echo $s['gcash_number'] ?>" style="width: 100%;" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Amount</label>
                                                                                                <input type="text" class="form-control" name="amount" id="amount" style="width: 100%;" value="<?php echo '₱ ' . $cart['total'] ?>" disabled>
                                                                                                <input type="number" class="form-control" name="amount" id="amount" style="width: 100%;" value="<?php echo $cart['total'] ?>" hidden>
                                                                                                <input type="hidden" id="payment-gcash" name="payment-gcash" value="Gcash">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Reference No</label>
                                                                                                <input type="number" class="form-control" name="reference-no" id="reference-no" placeholder="Enter Reference No" style="width: 100%;" maxlength="15">
                                                                                            </div>
                                                                                            <label class="form-label">Upload Receipt</label>
                                                                                            <input class="form-control" type="file" name="receipt-img" id="receipt-img" multiple>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary" name="pay" id="pay">Pay</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>





                                                            <?php }
                                                            } else {
                                                                echo "<td colspan=6>No Records..</td>";
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
        </main>



        <?php


        include("../Includes/footer.inc.php");
        ?>
    </div>

    <?php
    include("../Includes/loginModal.inc.php");
    include("../Includes/mobileMenu.inc.php");
    include("../Includes/scripts.inc.php");
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>