<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/manage.css">
    <link rel="stylesheet" href="../css/addProduct.css">
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
        $sub = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));

        $sub_type = mysqli_fetch_assoc(getUser('subscription', 'user_id', $_SESSION['id']));
        ?>
        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">My Products</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page">My Account</li>
                        <li class="breadcrumb-item active" aria-current="page">My Products</li>
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
                                        <a class="nav-link active" href="manageProducts.php">Manage My Products</a>
                                    </li>

                                    <li class="nav-item active">
                                        <a class="nav-link" href="manageOrders.php">Manage Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="myPurchase.php">My Purchase</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="shippingAddress.php">Shipping Info</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="manageSubscription.php">Manage Subscription</a>
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
                                                <div class="card-body">

                                                    <?php
                                                    $total;
                                                    if ($sub['isSubscribe'] == "Yes") {
                                                        if ($sub_type['subscription_type'] == 1) {
                                                            $total = 28 - mysqli_num_rows(getProduct('products', 'user_id', $_SESSION['id']));
                                                        } else if ($sub_type['subscription_type'] == 2) {
                                                            $total = 58 - mysqli_num_rows(getProduct('products', 'user_id', $_SESSION['id']));
                                                        } else if ($sub_type['subscription_type'] == 2) {
                                                            echo " <a href='addProduct.php' class='btn btn-primary mb-2' disabled>Add Product</a>";
                                                        }
                                                        echo " <p class='text-success'> Subscribed User!</p>";

                                                        if ($total <= 0) {
                                                            echo "<a  class='btn btn-primary mb-2' disabled>Add Product</a>";

                                                            echo "<p> You have $total of remaining products left to post. <a href='subscription.php'>Subscribe!</a></p>";
                                                        } else {
                                                            echo "<a href='addProduct.php' class='btn btn-primary mb-2' disabled>Add Product</a>";
                                                            echo "<p> You have $total of remaining products left to post. <a href='subscription.php'>Subcribe!</a></p>";
                                                        }
                                                    ?>
                                                    <?php }
                                                    if ($sub['isSubscribe'] == "No") {
                                                        $total = 3 - mysqli_num_rows(getProduct('products', 'user_id', $_SESSION['id']));
                                                        if ($total <= 0) {
                                                            echo "<a  class='btn btn-primary mb-2' disabled>Add Product</a>";
                                                            echo "<p> You have $total of remaining products left to post. <a href='subscription.php'>Subcribe!</a></p>";
                                                        } else {
                                                            echo "<a href='addProduct.php' class='btn btn-primary mb-2'>Add Product</a>";
                                                            echo "<p> You have $total of remaining products left to post. <a href='subscription.php'>Subcribe!</a></p>";
                                                        }
                                                    }



                                                    ?>


                                                    <div class="table-responsive">

                                                        <table class="table m-0 ">
                                                            <thead>
                                                                <tr>
                                                                    <!-- Set columns width -->
                                                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp;
                                                                        Details</th>
                                                                    <th class="text-center py-3 px-4" style="min-width: 120px;width:200px">Price</th>
                                                                    <th class="text-center py-3 px-4" sstyle="min-width: 120px;width:200px">Quantity
                                                                    </th>
                                                                    <th class="text-center py-3 px-4" style="min-width: 120px;width:200px">Status</th>
                                                                    <th class="text-center align-middle py-3 px-0" style="width: 80px;">Action<a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $products =  getAllUsersProduct('products', 'user_id', $_SESSION['id']);
                                                                if (mysqli_num_rows($products) > 0) {

                                                                    while ($product = mysqli_fetch_assoc($products)) {
                                                                        $prod_det = mysqli_fetch_assoc(
                                                                            getProduct('product_details', 'product_id', $product['id'])
                                                                        );
                                                                ?>
                                                                        <tr>
                                                                            <td class="p-4 ">
                                                                                <div class="media align-items-center">
                                                                                    <img src="<?php echo $prod_det['product_img'] ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                                                    <div class="media-body">
                                                                                        <a href="#" class="d-block text-dark"><?php echo $prod_det['product_name'] ?></a>
                                                                                        <small>
                                                                                            <!-- additional infos here -->
                                                                                        </small>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center font-weight-semibold align-middle p-4">
                                                                                ₱ <?php echo number_format($prod_det['price'], 2); ?>
                                                                            </td>
                                                                            <td class="align-middle p-4 text-center">
                                                                                <?php echo number_format($prod_det['quantity']); ?>
                                                                            </td>
                                                                            <td class="text-center font-weight-semibold align-middle p-4">

                                                                                <?php if ($prod_det['quantity'] > 0) { ?>
                                                                                    <p class="bg-success text-white rounded">In
                                                                                        Stock</p>

                                                                                <?php } else { ?>
                                                                                    <p class="bg-danger text-white rounded">Out of
                                                                                        Stock</p>
                                                                                <?php } ?>

                                                                            </td>
                                                                            <td class="text-center align-middle px-0">
                                                                                <button class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove" type="button" name="deleteProduct" data-toggle="modal" data-target="#exampleModal<?php echo $prod_det['product_id'] ?>">
                                                                                    <i class="fa fa-trash" style="font-size: 20px"></i>
                                                                                </button>
                                                                                <a href="../Pages/editProduct.php?product_id=<?php echo $prod_det['product_id'] ?>" type="button" class="shop-tooltip close float-none text-success">
                                                                                    <i class="fa fa-edit" style="font-size: 20px"></i>
                                                                                </a>

                                                                                <div class="modal fade" id="exampleModal<?php echo $prod_det['product_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content p-5">
                                                                                            <form action="../Controller/ProductsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                                                                                                <div class="modal-body text-left">
                                                                                                    <h4>
                                                                                                        Are you sure you want to remove this product?
                                                                                                    </h4>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                                    <button type="submit" class="btn btn-primary" name="deleteProduct">Yes</button>
                                                                                                </div>

                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                        </tr>

                                                                <?php }
                                                                } else {
                                                                    echo "<td colspan=6>No Products... </td>";
                                                                } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- / Shopping cart table -->





                                                </div>
                                            </div>
                                        </div>



                                        <!-- <p>No order has been made yet.</p>
                                        <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                                class="icon-long-arrow-right"></i></a> -->


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