<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include("../Layouts/head.layout.php");

    ?>



</head>

<body>




    <div class="page-wrapper-layout">
        <?php include("../Layouts/header.layout.php") ?>

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">My Shopping Basket</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Shopping Basket</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-content-layout">

                <div class="container px-3 my-5 clearfix">
                    <!-- Shopping cart table -->
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  m-0 table-hover">
                                    <thead>
                                        <tr>
                                            <!-- Set columns width -->
                                            <th></th>
                                            <th class="text-center py-3 px-4" style="min-width: 400px;">
                                                Product &amp;
                                                Details</th>
                                            <th class="text-center py-3 px-4" style="min-width: 120px;width:200px">Price
                                            </th>
                                            <th class="text-center py-3 px-4" style="min-width: 130px; width:200px;">
                                                Quantity</th>
                                            <th class="text-center py-3 px-4" style="min-width: 120px;">Total</th>
                                            <th class="text-center align-middle py-3 px-0" style="width: 50px;"><a
                                                    href="#" class="shop-tooltip float-none text-light" title=""
                                                    data-original-title="Clear cart"><i
                                                        class="ino ion-md-trash"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $carts = usersCart('carts', array('user_id', 'isOrdered'), array($_SESSION['id'], "No"));
                                        $total = 0;
                                        if (mysqli_num_rows($carts) > 0) {
                                            while ($cart = mysqli_fetch_assoc($carts)) {
                                                $product = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $cart['product_id']));
                                                // to get the total price inside the cart
                                                $total += $cart['total'];
                                                ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <input type="checkbox" name="" id="">
                                                    </td>
                                                    <td class="p-4">
                                                        <div class="media align-items-center">
                                                            <img src="<?php echo $product['product_img'] ?>"
                                                                class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                            <div class="media-body">
                                                                <a href="#" class="d-block text-dark">
                                                                    <?php echo $product['product_name'] ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="text-center font-weight-semibold align-middle p-4">₱
                                                        <?php echo number_format($product['price']) ?>
                                                    </td>

                                                    <td class="align-middle">
                                                        <form
                                                            action="../Controller/CartsController.php?product_id=<?php echo $cart['product_id'] ?>"
                                                            method="POST">

                                                            <div class="input-group quantity mx-auto" style="width: 100%; ">

                                                                <input type="text" class="form-control text-center"
                                                                    value="<?php echo $cart['quantity'] ?>" name="quantity"
                                                                    required hidden>


                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-sm  btn-minus" type="submit"
                                                                        name="submit">
                                                                        <i class="fa fa-minus button"></i>
                                                                    </button>
                                                                </div>


                                                                <input type="text"
                                                                    class="form-control text-center bg-transparent"
                                                                    value="<?php echo $cart['quantity'] ?>" name="quantity"
                                                                    disabled>

                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-sm btn-plus" name="submit"
                                                                        type="submit">
                                                                        <i class="fa fa-plus button"></i>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </td>


                                                    <td class="text-center font-weight-semibold align-middle p-4">₱
                                                        <?php echo number_format($cart['total']) ?>
                                                    </td>

                                                    <td class="text-center align-middle px-0">

                                                        <form action="../Controller/CartsController.php" method="POST">
                                                            <input type="hidden" name="product_id"
                                                                value="<?php echo $product['product_id'] ?>">
                                                            <button class="border-0 bg-transparent" type="submit"
                                                                name="removeCart" id="removeCart">
                                                                <i class="fa fa-trash-o" style="font-size:23px;color:red"></i>

                                                            </button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            <?php }
                                        } else {
                                            echo "<td colspan = 4> Empty Record<td>";
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- / Shopping cart table -->
                            <div class="float-right">
                                <div class="text-right mt-4 mr-5">

                                    <div class="text-large">
                                        <label style="margin-right: 66px;">Total price</label>
                                        <strong>
                                            ₱
                                            <?php echo number_format($total) ?>
                                        </strong>
                                    </div>
                                </div>
                                <a href="../">
                                    <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to
                                        shopping</button>
                                </a>


                                <?php
                                if ($total > 0) {
                                    ?>
                                    <a href="../Pages/checkout.php?id=<?php echo $_SESSION['id'] ?>">
                                        <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>

                                    <?php } else { ?>
                                        <input type="button" value="Check out" disabled />
                                        <?php
                                }
                                ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </main>
        <?php include("../Layouts/footer.layout.php"); ?>
    </div>

    <style>
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none !important;
            margin: 0 !important;
        }
    </style>



    <?php
    include("../Layouts/mobileMenu.layout.php");
    include("../Layouts/loginModal.layout.php");
    include("../Layouts/scripts.layout.php");
    ?>
    <script src="../JS/cart.js"></script>
</body>



<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->

</html>