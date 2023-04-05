<?php

include_once '../Model/db.php';
session_start();

if (isset($_SESSION['id'])) {
    $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
}
?>
<header class="header-layout">
    <div class="header-top-layout">
        <div class="container">
            <div class="header-left-layout">
                <div class="mr-5">
                    <a href="#">FAQ</a>
                </div>

                <div>
                    <a href="#">PRIVACY POLICY</a>
                </div>
            </div>
            <!-- End .header-left -->

            <div class="header-right-layout">
                <ul class="top-menu-layout p-2">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                            </li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li>
                                <?php if (!isset($_SESSION['id'])) { ?>
                                    <a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a>
                                <?php } ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php if (isset($_SESSION['id'])) { ?>
                    <div class="header-dropdown-layout">
                        <a href="#"><i class="icon-user"></i>
                            <?php echo $user['first_name'] . " " . $user['last_name'] ?>
                        </a>
                        <div class="header-menu-layout">
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

    <div class="header-middle-layout sticky-header">
        <div class="container">
            <div class="header-left-layout">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="../" class="logo-layout">
                    <img src="../assets/images/logo.png" alt="Molla Logo" width="105" height="25" />
                </a>

                <nav class="main-nav">
                    <ul class="menu-layout sf-arrows-layout">
                        <li class="megamenu-container active">
                            <a href="../">Home</a>
                        </li>

                        <li class="megamenu-container">
                            <a href="../Pages/product-lists.php">Products</a>
                        </li>

                        <li>
                            <a href="product.html" class="sf-with-ul-layout">Categories</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters-layout">
                                    <div class="col-md-6-layout">
                                        <div class="menu-col-layout">
                                            <div class="menu-title-layout">Product Details</div>
                                            <!-- End .menu-title -->
                                            <ul>
                                                <li><a href="product.html">Default</a></li>
                                                <li>
                                                    <a href="product-centered.html">Centered</a>
                                                </li>
                                                <li>
                                                    <a href="product-extended.html"><span>Extended Info<span
                                                                class="tip tip-new">New</span></span></a>
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

                                    <div class="col-md-6-layout">
                                        <div class="banner-layout banner-overlay-layout">
                                            <a href="category.html">
                                                <img src="../assets/images/menu/banner-2.jpg" alt="Banner" />

                                                <div class="banner-content-layout banner-content-bottom-layout">
                                                    <div class="banner-title-layout text-white">
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
                            <a href="blog.html">Breeders Blog</a>
                        </li>
                    </ul>
                    <!-- End .menu -->
                </nav>
                <!-- End .main-nav -->
            </div>
            <!-- End .header-left -->

            <div class="header-right-layout">
                <div class="header-search-layout">
                    <a href="#" class="search-toggle-layout" role="button" title="Search"><i
                            class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper-layout">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control-layout" name="q" id="q" placeholder="Search in..."
                                required />
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->

                <a href="wishlist.php" class="wishlist-link-layout">
                    <i class="icon-heart-o"></i>
                </a>

                <!-- End .compare-dropdown -->

                <div class="dropdown dropdown-layout cart-dropdown-layout">
                    <a href="cart.php" class="dropdown-toggle dropdown-toggle-layout" role="button">
                        <i class="icon-shopping-cart"></i>
                        <?php
                        if (isset($_SESSION['id'])) {
                            $cart = getCart('carts', 'user_id', $_SESSION['id'], "No");

                            $count = mysqli_num_rows($cart);
                            if ($count > 0) {
                                ?>
                                <span class="cart-count-layout">
                                    <?php echo $count; ?>
                                </span>
                            <?php }
                        } ?>
                    </a>

                    <?php
                    if (isset($_SESSION['id'])) {
                        ?>
                        <div class="dropdown-menu dropdown-menu-layout dropdown-menu-right dropdown-menu-right-layout">
                            <div class="dropdown-cart-products-layout">
                                <?php
                                $cart = getCart('carts', 'user_id', $_SESSION['id'], "No");

                                $count = mysqli_num_rows($cart);

                                if ($count > 0) {
                                    $i = 0;
                                    while ($products = mysqli_fetch_assoc($cart)) {

                                        if ($i == 2) {
                                            break;
                                        }
                                        $product = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $products['product_id']))
                                            ?>
                                        <div class="product-layout">
                                            <div class="product-cart-details-layout">
                                                <h4 class="product-title-layout">
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

                                            <figure class="product-image-container-layout">
                                                <a href="product.html" class="product-image-layout">
                                                    <img src="<?php echo $product['product_img'] ?>" alt="product" />
                                                </a>
                                            </figure>
                                            <form action="../Controller/CartsController.php" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                                <button class="btn-remove-layout" title="Remove Product" name="removeCart">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </form>
                                        </div>


                                        <?php $i++;
                                    } ?>
                                </div>
                                <div class="dropdown-cart-action-layout mt-1">
                                    <a href="cart.php" class="btn btn-layout btn-primary-layout">View Cart</a>

                                </div>


                            <?php } else { ?>
                                <div class="dropdown dropdown-layout">
                                    Empty Record...
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!-- End .dropdown-menu -->
                </div>
                <!-- End .cart-dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->
</header>