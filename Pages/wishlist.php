<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/head.inc.php"); ?>
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
        ?>

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Wishlist</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <?php
                    $wishlists = getUsersWishlist('wishlists', 'user_id', $_SESSION['id']);
                    if (mysqli_num_rows($wishlists) > 0) { ?>
                        <table class="table table-wishlist table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Stock Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                while ($wishlist = mysqli_fetch_assoc($wishlists)) {
                                    $product = mysqli_fetch_assoc(
                                        getProduct('product_details', 'product_id', $wishlist['product_id'])
                                    );
                                    ?>
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="<?php echo $product['product_img'] ?>" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">
                                                        <?php echo $product['product_name'] ?>
                                                    </a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">₱
                                            <?php echo number_format($product['price'], 2); ?>
                                        </td>
                                        <td class="stock-col">
                                            <?php if ($product['quantity'] > 0) { ?>
                                                <span class="in-stock">In stock</span>
                                            <?php } else { ?>
                                                <span class="out-of-stock ">Out Of stock</span>
                                            <?php } ?>
                                        </td>
                                        <td class="action-col">
                                            <?php if ($product['quantity'] > 0) {
                                                $check = usersCarts(
                                                    $_SESSION['id'], $product['product_id'],
                                                    "No"
                                                );
                                                ?>
                                                <form action="../Controller/CartsController.php" method="POST">
                                                    <input type="hidden" name="product_id"
                                                        value="<?php echo $product['product_id'] ?>">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                                    <input type="hidden" name="price" value="<?php echo $product['price'] ?>">

                                                    <?php if (mysqli_num_rows($check) > 0) { ?>

                                                        <button class="btn btn-block btn-outline-primary-2" type="submit"
                                                            name="removeCart">
                                                            <i class="icon-cart-plus"></i>Remove From Cart
                                                        </button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-block btn-outline-primary-2" type="submit"
                                                            name="addToCart">
                                                            <i class="icon-cart-plus"></i>Add to Cart
                                                        </button>
                                                    <?php } ?>
                                                </form>
                                            <?php } else { ?>
                                                <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                                            <?php } ?>
                                        </td>
                                        <td class="remove-col">
                                            <form
                                                action="../Controller/WishlistsController.php?product_id=<?php echo $product['product_id'] ?>"
                                                method="POST">

                                                <button class="btn-remove" type="submit" name="removeWishlist">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>

                        </table><!-- End .table table-wishlist -->
                    <?php } else { ?>
                        <p>Empty Wishlist</p>
                        <a href="../" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                class="icon-long-arrow-right"></i></a>
                        <br> <br>
                    <?php } ?>

                    <div class="wishlist-share">
                        <div class="social-icons social-icons-sm mb-2">
                            <label class="social-label">Share on:</label>
                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                    class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                    class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                    class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                    class="icon-youtube"></i></a>
                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                    class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .wishlist-share -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
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


<!-- molla/wishlist.html  22 Nov 2019 09:55:06 GMT -->

</html>