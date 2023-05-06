<?php

include_once '../Model/db.php';
session_start();

if (isset($_SESSION['id'])) {
    $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
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
                            <?php echo $user['first_name'] . " " . $user['last_name'] ?>
                        </a>
                        <div class="header-menu">
                            <ul>
                                <li><a href="myAccount.php">My Account</a></li>
                                <li><a href="manageProducts.php">Manage My Products</a></li>
                                <li><a href="manageOrders.php">Manage Orders</a></li>
                                <li><a href="myPurchase.php">Manage My Purchase</a></li>
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
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>" class="sf-with-ul">Categories</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">

                                            <ul>

                                                <li>
                                                    <a href="product-centered.html">Aquarium</a>
                                                </li>

                                                <li>
                                                    <a href="product-gallery.html">Fishes</a>
                                                </li>
                                                <li>
                                                    <a href="product-sticky.html">Equipment & Accessories</a>
                                                </li>
                                                <li>
                                                    <a href="product-sidebar.html">Probiotics</a>
                                                </li>
                                                <li>
                                                    <a href="product-fullwidth.html">Vitamins</a>
                                                </li>
                                                <li>
                                                    <a href="product-masonry.html">Color Enhancer</a>
                                                </li>
                                                <li>
                                                    <a href="product-masonry.html">Medications</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End .menu-col -->
                                    </div>
                                    <!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="category.html">
                                                <img src="../img/cat.jpg" alt="Banner" />
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

                            <a href="../Pages/breedersBlog.php">Breeders Blog</a>
                        </li>
                        <li>

                            <a href="../Pages/chat.php">Chat</a>
                        </li>
                         <li>
                            <a href="../Pages/fishManual.php">Fish Manual</a>
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
                    <form action="../Controller/ProductsController.php" method="GET">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="search" id="q" placeholder="Search product ..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" required />
                            <button class="btn btn-primary" type="submit" name="searchProduct">
                                <i class="icon-search"></i>
                            </button>
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
                            $cart = getCart('carts', 'user_id', $_SESSION['id'], "No");

                            $count = 0;

                            while ($carts = mysqli_fetch_assoc($cart)) {
                                $products = mysqli_fetch_assoc(getProduct('products', 'id', $carts['product_id']));
                                if ($products['isDelete'] == "No") {
                                    $count++;
                                }
                            }

                            if ($count > 0) {
                        ?>
                                <span class="cart-count">
                                    <?php echo $count; ?>
                                </span>
                        <?php }
                        } ?>
                    </a>




                </div>
                <!-- End .cart-dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->
</header>