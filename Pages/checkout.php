<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/head.inc.php") ?>
</head>

<body>

    <div class="page-wrapper-layout">
        <?php

        include("../Includes/header.inc.php");
        $shipping_info = mysqli_fetch_assoc(getUser('shipping_info', 'user_id', $_SESSION['id']));
        ?>

        <main class="main">

            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Checkout</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="checkout">
                    <div class="container">

                        <div class="row">
                            <aside class="col-lg-7">
                                <div class="summary">
                                    <h3 class="summary-title">Shipping Info</h3>

                                    <label>Full Name *</label>
                                    <input type="text" class="form-control" value="<?php echo  $shipping_info['shipping_name'] ?>" required disabled>

                                    <label>Contact Number *</label>
                                    <input type="text" class="form-control" value="<?php echo  $shipping_info['shipping_contact'] ?>" required disabled>

                                    <label>Shipping Address *</label>
                                    <input type="text" class="form-control" value="<?php echo  $shipping_info['shipping_address'] ?>" required disabled>

                                    <button class="btn btn-outline-primary-2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        <span>Edit Shipping Info</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div>
                            </aside>


                            <aside class="col-lg-5">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $carts = getCart('carts', 'user_id', $_SESSION['id'], "No");
                                            $total = 0;
                                            while ($cart = mysqli_fetch_assoc($carts)) {
                                                $prod_det = mysqli_fetch_assoc(
                                                    getProduct('product_details', 'product_id', $cart['product_id'])
                                                );
                                                $total += $cart['total'];
                                            ?>
                                                <tr>
                                                    <td><a href="#"><?php echo $prod_det['product_name'] ?></a></td>

                                                    <td><?php echo number_format($cart['quantity']) ?></td>
                                                    <td>₱ <?php echo number_format($cart['total'], 2) ?></td>
                                                </tr>
                                            <?php } ?>

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td></td>
                                                <td>₱ <?php echo number_format($total, 2) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Place Order</span>
                                    </button>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <?php include("../Includes/footer.inc.php"); ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Shipping Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 20px;">
                    <form action="../Controller/UsersController.php?id=<?php echo $_SESSION['id'] ?>" method="POST">

                        <label>Full Name *</label>
                        <input type="text" class="form-control" name="shipping_name" value="<?php echo  $shipping_info['shipping_name'] ?>" required>

                        <label>Contact Number *</label>
                        <input type="number" class="form-control" name="shipping_contact" value="<?php echo  $shipping_info['shipping_contact'] ?>" required>

                        <label>Shipping Address *</label>
                        <input type="text" class="form-control" name="shipping_address" value="<?php echo  $shipping_info['shipping_address'] ?>" required>

                        <button type="submit" class="btn btn-outline-primary-2" name="editShippingInfo">
                            <span>SAVE CHANGES</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <?php
    include("../Includes/mobileMenu.inc.php");
    include("../Includes/loginModal.inc.php");
    include("../Includes/scripts.inc.php")
    ?>

</body>


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->

</html>