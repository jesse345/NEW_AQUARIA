<?php
include "../Model/dbPDO.php";
$connect = new PDO('mysql:host=localhost;dbname=eaquaria', 'root', '');
session_start();
$session_id = $_SESSION['id'];

if (isset($_SESSION['id'])) {
    $users2 = $connect->query("SELECT * FROM user_details WHERE user_id = $session_id");
    $user2 = $users2->fetch(PDO::FETCH_ASSOC);
}
?>
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="mr-5">
                    <a href="#">FAQ</a>
                </div>

                <div>
                    <a href="#">PRIVACY POLICY</a>
                </div>
            </div>
            <!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu p-2">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                            </li>
                            <li><a href="../Pages/about.php">About Us</a></li>
                            <li><a href="../Pages/contact.php">Contact Us</a></li>
                            <?php if (isset($_SESSION['id'])) { ?>
                                <li>
                                    <?php

                                    $unread = mysqli_num_rows(unRead($_SESSION['id'])) ?>
                                    <a href="Notification.php">
                                        Notifications <?php echo  $unread > 0 ? "($unread)" : '' ?>

                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <?php if (!isset($_SESSION['id'])) { ?>
                                    <a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php if (isset($_SESSION['id'])) { ?>
                    <div class="header-dropdown">
                        <a href="#"><i class="icon-user"></i>
                            <?php echo $user2['first_name'] . " " . $user2['last_name'] ?>
                        </a>
                        <div class="header-menu">
                            <ul>
                                <li><a href="myAccount.php">My Account</a></li>
                                <li><a href="#">Manage My Products</a></li>
                                <li><a href="#">Manage Orders</a></li>
                                <li><a href="#">Manage My Purchase</a></li>
                                <li>
                                    <a href="../Includes/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div><!-- End .header-menu -->
                    </div><!-- End .header-dropdown -->
                <?php } ?>
                <!-- End .top-menu -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="../" class="logo">
                    <img src="../img/logo.png" alt="Molla Logo" width="105" height="25" />
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="../">Home</a>
                        </li>

                        <li class="megamenu-container">
                            <a href="../Pages/product-lists.php">Products</a>
                        </li>

                        <li>
                            <a href="product.html" class="sf-with-ul">Categories</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">
                                            <div class="menu-title">Product Details</div>
                                            <!-- End .menu-title -->
                                            <ul>
                                                <li><a href="product.html">Default</a></li>
                                                <li>
                                                    <a href="product-centered.html">Centered</a>
                                                </li>
                                                <li>
                                                    <a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a>
                                                </li>
                                                <li>
                                                    <a href="product-gallery.html">Gallery</a>
                                                </li>
                                                <li>
                                                    <a href="product-sticky.html">Sticky Info</a>
                                                </li>
                                                <li>
                                                    <a href="product-sidebar.html">Boxed With Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="product-fullwidth.html">Full Width</a>
                                                </li>
                                                <li>
                                                    <a href="product-masonry.html">Masonry Sticky Info</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End .menu-col -->
                                    </div>
                                    <!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="category.html">
                                                <img src="../assets/images/menu/banner-2.jpg" alt="Banner" />

                                                <div class="banner-content banner-content-bottom">
                                                    <div class="banner-title text-white">
                                                        New Trends<br /><span><strong>spring 2019</strong></span>
                                                    </div>
                                                    <!-- End .banner-title -->
                                                </div>
                                                <!-- End .banner-content -->
                                            </a>
                                        </div>
                                        <!-- End .banner -->
                                    </div>
                                    <!-- End .col-md-6 -->
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .megamenu megamenu-sm -->
                        </li>
                        <li>
                            <a href="..Pages/breedersBlog.php">Breeders Blog</a>
                        </li>
                        <li>
                            <a href="..Pages/chat.php">Chat</a>
                        </li>
                        <li>
                            <a href="..Pages/fishManual.php">Fish Manual</a>
                        </li>
                    </ul>
                    <!-- End .menu -->
                </nav>
                <!-- End .main-nav -->
            </div>
            <!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required />
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->

                <a href="wishlist.php" class="wishlist-link">
                    <i class="icon-heart-o"></i>
                </a>

                <!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="cart.php" class="dropdown-toggle" role="button">
                        <i class="icon-shopping-cart"></i>
                        <?php
                        if (isset($_SESSION['id'])) {
                            $carts = $connect->query("SELECT * FROM `carts` WHERE `user_id` = '$session_id' AND `isOrdered` = 'No'");
                            // $cart = $cart->fetch(PDO::FETCH_ASSOC);     
                            $rows = $carts->fetchAll();

                            $carts_count = count($rows);
                            if ($carts_count > 0) {
                        ?>
                                <span class="cart-count">
                                    <?php echo $carts_count; ?>
                                </span>
                        <?php }
                        } ?>
                    </a>

                    <?php
                    if (isset($_SESSION['id'])) :
                    ?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <?php


                                if ($carts_count > 0) {
                                    $i = 0;
                                    while ($products = $carts->fetch(PDO::FETCH_ASSOC)) {
                                        $productID = $products['product_id'];
                                        if ($i == 2) {
                                            break;
                                        }

                                        $product2 = $connect->query("SELECT * FROM product_details WHERE product_id = $productID");
                                        $product = $product2->fetch(PDO::FETCH_ASSOC);
                                ?>
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">
                                                        <?php echo $product['product_name'] ?>
                                                        (
                                                        <?php echo $product['quantity'] ?>
                                                        )
                                                    </a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    Total: ₱
                                                    <?php echo $products['total'] ?>
                                                </span>
                                            </div>
                                            <!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="<?php echo $product['product_img'] ?>" alt="product" />
                                                </a>
                                            </figure>
                                            <form action="../Controller/CartsController.php" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                                <button class="btn-remove" title="Remove Product" name="removeCart">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </form>
                                        </div>


                                    <?php $i++;
                                    } ?>
                            </div>
                            <div class="dropdown-cart-action mt-1">
                                <a href="cart.php" class="btn btn-primary">View Cart</a>

                            </div>


                        <?php } else { ?>
                            <div class="dropdown">
                                Empty Record...
                            </div>
                        <?php } ?>
                        </div><!-- End .dropdown-menu -->
                    <?php endif; ?>

                </div><!-- End .cart-dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->
</header>