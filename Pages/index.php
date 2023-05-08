<?php
include '../Model/db.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<?php include("../Pages/preloader.php"); ?>

<head>
  <?php
  include("../Includes/head.inc.php");
  ?>
  <link rel="stylesheet" href="../assets/css/skins/skin-demo-5.css" />
  <link rel="stylesheet" href="../assets/css/demos/demo-5.css" />
  <script src="../assets/js/demos/demo-5.js"></script>

  <?php
  if (isset($_SESSION['id'])) {
    $isVerified = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
    if ($isVerified['isVerified'] == "Yes") {
      $check_form = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
      if ($check_form > 0) {

        $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_SESSION['id']));
      } else {
        header("Location: ../Pages/accountDetailsForm.php");
      }
    } else {
      header("Location: ../Pages/verifyAccount.php");
    }
  }
  ?>
  <style>
    .header {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .header-5 .header-search .header-search-wrapper {
      min-width: 200px !important;
    }

    .main-nav .menu .megamenu-container a:hover {
      color: #0081C9 !important;
    }

    .sf-with-ul:hover {
      color: #0081C9 !important;
    }

    .header-search-extended .btn-primary:hover {
      color: #0081C9 !important;
    }
  </style>
</head>

<body>
  <div class="page-wrapper">
    <header class="header header-5">
      <div class="header-top">
        <div class="container-fluid">
          <div class="header-left text-white">
            <div class="mr-5">
              <a href="faq.php">FAQ</a>
            </div>

            <div>
              <a href="privacy.php">PRIVACY POLICY</a>
            </div>
            <!-- End .header-dropdown -->
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
      </div>
      <!-- End .header-top -->

      <div class="header-middle sticky-header">
        <div class="container-fluid">
          <div class="header-left">
            <button class="mobile-menu-toggler">
              <span class="sr-only">Toggle mobile menu</span>
              <i class="icon-bars"></i>
            </button>

            <a href="index.php" class="logo">
              <img src="../img/logo.png" alt="Molla Logo" width="105" height="25" />
            </a>

            <nav class="main-nav">
              <ul class="menu sf-arrows">
                <li class="megamenu-container active">
                  <a href="index.php">Home</a>
                </li>

                <li class="megamenu-container">
                  <a href="../Pages/product-lists.php">Products</a>
                </li>

                <li>
                  <a href="product-lists.php" class="sf-with-ul">Categories</a>

                  <div class="megamenu megamenu-sm">
                    <div class="row no-gutters">
                      <div class="col-md-6">
                        <div class="menu-col">

                          <ul>

                            <li>
                              <a href="product-lists.php?category=Aquarium">Aquarium</a>
                            </li>

                            <li>
                              <a href="product-lists.php?category=Fishes">Fishes</a>
                            </li>
                            <li>
                              <a href="product-lists.php?category=Equipment & Accessories">Equipment & Accessories</a>
                            </li>
                            <li>
                              <a href="product-lists.php?category=Probiotics">Probiotics</a>
                            </li>
                            <li>
                              <a href="product-lists.php?category=Vitamins">Vitamins</a>
                            </li>
                            <li>
                              <a href="product-lists.php?category=Color Enhancer">Color Enhancer</a>
                            </li>
                            <li>
                              <a href="product-lists.php?category=Medications">Medications</a>
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


                <li class="megamenu-container">

                  <a href="../Pages/breedersBlog.php">Breeders Blog</a>
                </li>
                <li class="megamenu-container">
                  <a href="../Pages/chat.php">CHAT</a>
                </li>
                <li class="megamenu-container">
                  <a href="../Pages/fishManual.php">FISH MANUAL</a>
                </li>


              </ul>
              <!-- End .menu -->
            </nav>
            <!-- End .main-nav -->
          </div>
          <!-- End .header-left -->

          <div class="header-right">
            <div class="header-search header-search-extended header-search-visible">
              <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
              <form action="../Controller/ProductsController.php" method="GET">
                <div class="header-search-wrapper">
                  <label for="q" class="sr-only">Search</label>
                  <input type="search" class="form-control" name="search" id="q" placeholder="Search product ..." required />
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
        <!-- End .container-fluid -->
      </div>
      <!-- End .header-middle -->
    </header>
    <!-- End .header -->

    <main class="main">
      <div class="intro-slider-container mb-0">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav": false, "dots": false}'>
          <div class="intro-slide" style="
                background-image: linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.52),
                    rgba(0, 0, 0, 0.73)
                  ),
                  url(../assets/images/fish2.jpg);
              ">
            <div class="container intro-content text-center">
              <h3 class="intro-subtitle text-white">Don’t Miss</h3>
              <!-- End .h3 intro-subtitle -->
              <h1 class="intro-title text-white">Fish Deals</h1>
              <!-- End .intro-title -->
              <div class="intro-text text-white">Shop Online</div>
              <!-- End .intro-text -->
              <a href="product-lists.php" class="btn btn-primary">Discover NOW</a>
            </div>
            <!-- End .intro-content -->
          </div>
          <!-- End .intro-slide -->

          <div class="intro-slide" style="
                background-image: linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.52),
                    rgba(0, 0, 0, 0.73)
                  ),
                  url(../assets/images/fish1.jpg);
              ">
            <div class="container intro-content text-center">
              <h3 class="intro-subtitle text-white">Best Quality Fish Needs</h3>
              <!-- End .h3 intro-subtitle -->
              <h1 class="intro-title text-white">Treat your Fish</h1>
              <!-- End .intro-title -->

              <div class="intro-text text-white">Because you deserve it</div>

              <!-- End .intro-text -->
              <a href="product-lists.php" class="btn btn-primary">Shop NOW</a>
            </div>
            <!-- End .intro-content -->
          </div>
          <!-- End .intro-slide -->
        </div>
        <!-- End .intro-slider owl-carousel owl-theme -->

        <span class="slider-loader text-white"></span><!-- End .slider-loader -->
      </div>
      <!-- End .intro-slider-container -->

      <div class="mb-4"></div>
      <!-- End .mb-6 -->

      <div class="container">
        <div class="heading heading-center mb-3">
          <h2 class="title">Trendy Products</h2>
          <!-- End .title -->
        </div>
        <!-- End .heading -->
        <div class="tab-content tab-content-carousel">
          <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'>

              <?php
              $products = getAllProduct('products');
              $i = 0;
              while ($product = mysqli_fetch_assoc($products)) {

                if ($i == 5) {
                  break;
                } else {
                  $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $product['id']));
              ?>

                  <div class="product product-7 text-center">
                    <figure class="product-media">

                      <?php
                      if (isset($_SESSION['id']) && $product["user_id"] == $_SESSION['id']) {
                      ?>
                        <span class="product-label label-new">Owned</span>
                      <?php } ?>
                      <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                        <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 300px">
                      </a>

                      <div class="product-action-vertical">
                        <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                          <?php if (isset($_SESSION['id'])) {
                            $check = usersWishlist(
                              'wishlists',
                              array('user_id', 'product_id'),
                              array($_SESSION['id'], $prod_det['product_id'])
                            ); ?>
                            <?php if (mysqli_num_rows($check) > 0) { ?>

                              <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="removeWishlist">
                                <span>Remove From Wishlist</span>
                              </button>
                              <?php } else {
                              if ($product["user_id"] != $_SESSION['id']) { ?>

                                <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                  <span>Add To Wishlist</span>
                                </button>
                            <?php }
                            } ?>
                          <?php } else { ?>
                            <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                              <span>Add To Wishlist</span>
                            </button>
                          <?php } ?>
                        </form>
                      </div><!-- End .product-action-vertical -->

                      <div class="product-action">
                        <form action="../Controller/CartsController.php" method="POST">
                          <div class="product-action product-action-transparent">

                            <?php if (isset($_SESSION['id'])) {
                              $check = usersCarts(
                                $_SESSION['id'],
                                $prod_det['product_id'],
                                "No"
                              ); ?>
                              <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">
                              <input type="hidden" name="quantity" value="1">
                              <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                              <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">
                              <?php if (mysqli_num_rows($check) > 0) { ?>
                                <button type="submit" class="btn-product btn-cart border-0" name="removeCart" id="removeCart">
                                  <span>Remove From Cart</span>
                                </button>
                                <?php } else {
                                if ($product["user_id"] == $_SESSION['id']) {
                                ?>
                                  <a href="manageProducts.php" class="btn-product btn-cart border-0" name="addToCart">
                                    <span>Manage Product</span>
                                  </a>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                    <span>Add to Cart</span>
                                  </button>
                              <?php  }
                              } ?>
                            <?php } else { ?>
                              <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                <span>Add To Cart</span>
                              </button>
                            <?php } ?>
                          </div>
                        </form>
                      </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                      <div class="product-cat">
                        <?php echo $prod_det['category'] ?>
                      </div><!-- End .product-cat -->
                      <h3 class="product-title">
                        <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                          <?php echo $prod_det['product_name'] ?>
                        </a>
                      </h3>
                      <!-- End .product-title -->
                      <div class="product-price">
                        <?php echo $prod_det['price'] ?>
                      </div><!-- End .product-price -->

                      <?php
                      $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                      $rate = 0;
                      while ($star = mysqli_fetch_assoc($review)) {
                        $rate += $star['rate'];
                      }
                      if ($rate == 0) {
                        $total = 0;
                      } else {
                        $total = round($rate / mysqli_num_rows($review), PHP_ROUND_HALF_DOWN);
                      }
                      ?>
                      <div class="ratings-container">
                        <div class="ratings">
                          <?php if ($total == 0) { ?>
                            <div class="ratings-val" style="width: 0%;"></div>
                          <?php } else if ($total == 1) { ?>
                            <div class="ratings-val" style="width: 20%;"></div>
                          <?php } else if ($total == 2) { ?>
                            <div class="ratings-val" style="width: 40%;"></div>
                          <?php } else if ($total == 3) { ?>
                            <div class="ratings-val" style="width: 60%;"></div>
                          <?php } else if ($total == 4) { ?>
                            <div class="ratings-val" style="width: 80%;"></div>
                          <?php } else if ($total == 5) { ?>
                            <div class="ratings-val" style="width: 100%;"></div>
                          <?php } ?>

                        </div><!-- End .ratings -->
                        <span class="ratings-text">(
                          <?php echo mysqli_num_rows($review) ?> Reviews )
                        </span>
                      </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                  </div><!-- End .product -->

              <?php }
                $i++;
              } ?>
              <!-- End .product -->

            </div>
            <!-- End .owl-carousel -->
          </div>
          <!-- .End .tab-pane -->
          <div class="tab-pane p-0 fade" id="trendy-women-tab" role="tabpanel" aria-labelledby="trendy-women-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'></div>
            <!-- End .owl-carousel -->
          </div>
          <!-- .End .tab-pane -->
          <div class="tab-pane p-0 fade" id="trendy-men-tab" role="tabpanel" aria-labelledby="trendy-men-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'></div>
            <!-- End .owl-carousel -->
          </div>
          <!-- .End .tab-pane -->
          <div class="tab-pane p-0 fade" id="trendy-access-tab" role="tabpanel" aria-labelledby="trendy-access-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "nav": true
                                    }
                                }
                            }'></div>
            <!-- End .owl-carousel -->
          </div>
          <!-- .End .tab-pane -->
        </div>
        <!-- End .tab-content -->
      </div>
      <!-- End .container -->

      <div class="mb-5"></div>
      <!-- End .mb-5 -->

      <div class="container-fluid">
        <div class="cta cta-border mb-5" style="
              background-image: linear-gradient(
                  to bottom,
                  rgba(0, 0, 0, 0.52),
                  rgba(0, 0, 0, 0.73)
                ),
                url(../assets/images/aq.jpg);
            ">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="cta-content">
                <div class="cta-text text-left text-white">
                  <p>
                    Subscribe to E-Aquaria <br /><strong>Sell limited product and browse to our Fish
                      Manual 24/7</strong>
                  </p>
                </div>
                <!-- End .cta-text -->

                <?php if (isset($_SESSION['id']) && $isVerified['isSubscribe'] == "Yes") { ?>
                  <a href="manageSubscription.php" class="btn btn-primary btn-round"><span>Manage Subscription</span><i class="icon-long-arrow-right"></i></a>
                <?php } else { ?>
                  <a href="subscription.php" class="btn btn-primary btn-round"><span>Subscribe Now!</span><i class="icon-long-arrow-right"></i></a>
                <?php } ?>
              </div>
              <!-- End .cta-content -->
            </div>
            <!-- End .col-md-12 -->
          </div>
          <!-- End .row -->
        </div>
        <!-- End .cta -->
      </div>

      <div class="mb-5"></div>
      <!-- End .mb-5 -->

      <div class="container pt-6 new-arrivals">
        <div class="heading heading-center mb-3">
          <h2 class="title">Products</h2>
          <!-- End .title -->

          <ul class="nav nav-pills justify-content-center" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="new-cloth-link" data-toggle="tab" href="#new-aquarium-tab" role="tab" aria-controls="new-aquarium-tab" aria-selected="false">Aquarium</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="new-fishes-link" data-toggle="tab" href="#new-fishes-tab" role="tab" aria-controls="new-fishes-tab" aria-selected="false">Fishes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="new-equipment-link" data-toggle="tab" href="#new-equipment-tab" role="tab" aria-controls="new-equipment-tab" aria-selected="false">Equipment & Accessories</a>
            </li>
          </ul>
        </div>
        <!-- End .heading -->

        <div class="tab-content">
          <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
            <div class="products">
              <div class="row justify-content-center">

                <?php
                $products = getAllProduct('products');
                $i = 0;
                while ($prod = mysqli_fetch_assoc($products)) {

                  if ($i == 8) {
                    break;
                  } else {
                    $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $prod['id']));
                ?>
                    <div class="col-6 col-md-4 col-lg-3">
                      <div class="product product-7 text-center">
                        <figure class="product-media">

                          <?php
                          if (isset($_SESSION['id']) && $prod["user_id"] == $_SESSION['id']) {
                          ?>
                            <span class="product-label label-new">Owned</span>
                          <?php } ?>

                          <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                            <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 300px;" />

                          </a>


                          <div class="product-action-vertical">
                            <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                              <?php if (isset($_SESSION['id'])) {
                                $check = usersWishlist(
                                  'wishlists',
                                  array('user_id', 'product_id'),
                                  array($_SESSION['id'], $prod_det['product_id'])
                                ); ?>
                                <?php if (mysqli_num_rows($check) > 0) { ?>

                                  <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="removeWishlist">
                                    <span>Remove From Wishlist</span>
                                  </button>
                                  <?php } else {

                                  if ($prod["user_id"] != $_SESSION['id']) { ?>

                                    <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                      <span>Add To Wishlist</span>
                                    </button>
                                <?php }
                                } ?>
                              <?php } else { ?>
                                <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                  <span>Add To Wishlist</span>
                                </button>
                              <?php } ?>
                            </form>
                          </div>
                          <!-- End .product-action -->


                          <div class="product-action">
                            <form action="../Controller/CartsController.php" method="POST">
                              <div class="product-action product-action-transparent">

                                <?php if (isset($_SESSION['id'])) {
                                  $check = usersCarts(
                                    $_SESSION['id'],
                                    $prod_det['product_id'],
                                    "No"
                                  ); ?>
                                  <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">
                                  <input type="hidden" name="quantity" value="1">
                                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                  <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">
                                  <?php if (mysqli_num_rows($check) > 0) { ?>
                                    <button type="submit" class="btn-product btn-cart border-0" name="removeCart" id="removeCart">
                                      <span>Remove From Cart</span>
                                    </button>
                                    <?php } else {
                                    if ($prod["user_id"] != $_SESSION['id']) { ?>


                                      <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                        <span>Add To Cart</span>
                                      </button>
                                    <?php } else { ?>
                                      <a href="manageProducts.php" class="btn-product btn-cart border-0" name="addToCart">
                                        <span>Manage Product</span>
                                      </a>
                                  <?php }
                                  }
                                } else { ?>
                                  <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                    <span>Add To Cart</span>
                                  </button>
                                <?php } ?>
                              </div>
                            </form>



                          </div>
                          <!-- End .product-action -->
                        </figure>
                        <!-- End .product-media -->

                        <div class="product-body">
                          <div class="product-cat">
                            <?php echo $prod_det['category'] ?>
                          </div><!-- End .product-cat -->
                          <h3 class="product-title">
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                              <?php echo $prod_det['product_name'] ?>
                            </a>
                          </h3>
                          <!-- End .product-title -->
                          <div class="product-price">
                            ₱
                            <?php echo number_format($prod_det['price'], 2) ?>
                          </div><!-- End .product-price -->

                          <?php
                          $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                          $rate = 0;
                          while ($star = mysqli_fetch_assoc($review)) {
                            $rate += $star['rate'];
                          }
                          if ($rate == 0) {
                            $total = 0;
                          } else {
                            $total = round($rate / mysqli_num_rows($review), PHP_ROUND_HALF_DOWN);
                          }
                          ?>
                          <div class="ratings-container">
                            <div class="ratings">
                              <?php if ($total == 0) { ?>
                                <div class="ratings-val" style="width: 0%;"></div>
                              <?php } else if ($total == 1) { ?>
                                <div class="ratings-val" style="width: 20%;"></div>
                              <?php } else if ($total == 2) { ?>
                                <div class="ratings-val" style="width: 40%;"></div>
                              <?php } else if ($total == 3) { ?>
                                <div class="ratings-val" style="width: 60%;"></div>
                              <?php } else if ($total == 4) { ?>
                                <div class="ratings-val" style="width: 80%;"></div>
                              <?php } else if ($total == 5) { ?>
                                <div class="ratings-val" style="width: 100%;"></div>
                              <?php } ?>

                            </div><!-- End .ratings -->
                            <span class="ratings-text">(
                              <?php echo mysqli_num_rows($review) ?> Reviews )
                            </span>
                          </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                        <!-- End .product-body -->
                      </div>
                      <!-- End .product -->
                    </div>
                <?php }
                  $i++;
                } ?>
              </div>
              <!-- End .row -->

            </div>
            <!-- End .products -->
          </div>
          <!-- .End .tab-pane -->

          <div class="tab-pane p-0 fade" id="new-aquarium-tab" role="tabpanel" aria-labelledby="new-cloth-link">
            <div class="products">
              <div class="row justify-content-center">

                <?php
                // $products = getProductByCategory('Aquarium');
                $products = getAllProduct('products');
                $i = 0;
                while ($prod = mysqli_fetch_assoc($products)) {
                  $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $prod['id']));
                  if ($prod_det['category'] == "Aquarium") {
                    if ($i == 8) {
                      break;
                    } else {



                ?>
                      <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                          <figure class="product-media">
                            <?php
                            if (isset($_SESSION['id']) && $prod["user_id"] == $_SESSION['id']) {
                            ?>
                              <span class="product-label label-new">Owned</span>
                            <?php } ?>
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                              <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 300px;" />

                            </a>


                            <div class="product-action-vertical">
                              <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                                <?php if (isset($_SESSION['id'])) {
                                  $check = usersWishlist(
                                    'wishlists',
                                    array('user_id', 'product_id'),
                                    array($_SESSION['id'], $prod_det['product_id'])
                                  ); ?>
                                  <?php if (mysqli_num_rows($check) > 0) { ?>

                                    <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="removeWishlist">
                                      <span>Remove From Wishlist</span>
                                    </button>
                                    <?php } else {
                                    if ($prod['user_id'] != $_SESSION['id']) { ?>
                                      <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                        <span>Add To Wishlist</span>
                                      </button>
                                  <?php }
                                  } ?>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                    <span>Add To Wishlist</span>
                                  </button>
                                <?php } ?>
                              </form>
                            </div>
                            <!-- End .product-action -->


                            <div class="product-action">
                              <form action="../Controller/CartsController.php" method="POST">
                                <div class="product-action product-action-transparent">

                                  <?php if (isset($_SESSION['id'])) {
                                    $check = usersCarts(
                                      $_SESSION['id'],
                                      $prod_det['product_id'],
                                      "No"
                                    ); ?>
                                    <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                    <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">
                                    <?php if (mysqli_num_rows($check) > 0) { ?>
                                      <button type="submit" class="btn-product btn-cart border-0" name="removeCart" id="removeCart">
                                        <span>Remove From Cart</span>
                                      </button>
                                      <?php } else {
                                      if ($prod['user_id'] != $_SESSION['id']) { ?>
                                        <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                          <span>Add To Cart</span>
                                        </button>
                                      <?php } else { ?>
                                        <a href="manageProducts.php" class="btn-product btn-cart border-0" name="addToCart">
                                          <span>Manage Product</span>
                                        </a>
                                    <?php }
                                    }
                                  } else { ?>
                                    <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                      <span>Add To Cart</span>
                                    </button>
                                  <?php } ?>
                                </div>
                              </form>



                            </div>
                            <!-- End .product-action -->
                          </figure>
                          <!-- End .product-media -->

                          <div class="product-body">
                            <div class="product-cat">
                              <?php echo $prod_det['category'] ?>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title">
                              <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                                <?php echo $prod_det['product_name'] ?>
                              </a>
                            </h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                              ₱
                              <?php echo number_format($prod_det['price'], 2) ?>
                            </div><!-- End .product-price -->

                            <?php
                            $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                            $rate = 0;
                            while ($star = mysqli_fetch_assoc($review)) {
                              $rate += $star['rate'];
                            }
                            if ($rate == 0) {
                              $total = 0;
                            } else {
                              $total = round($rate / mysqli_num_rows($review), PHP_ROUND_HALF_DOWN);
                            }
                            ?>
                            <div class="ratings-container">
                              <div class="ratings">
                                <?php if ($total == 0) { ?>
                                  <div class="ratings-val" style="width: 0%;"></div>
                                <?php } else if ($total == 1) { ?>
                                  <div class="ratings-val" style="width: 20%;"></div>
                                <?php } else if ($total == 2) { ?>
                                  <div class="ratings-val" style="width: 40%;"></div>
                                <?php } else if ($total == 3) { ?>
                                  <div class="ratings-val" style="width: 60%;"></div>
                                <?php } else if ($total == 4) { ?>
                                  <div class="ratings-val" style="width: 80%;"></div>
                                <?php } else if ($total == 5) { ?>
                                  <div class="ratings-val" style="width: 100%;"></div>
                                <?php } ?>

                              </div><!-- End .ratings -->
                              <span class="ratings-text">(
                                <?php echo mysqli_num_rows($review) ?> Reviews )
                              </span>
                            </div><!-- End .rating-container -->
                          </div><!-- End .product-body -->
                          <!-- End .product-body -->
                        </div>
                        <!-- End .product -->
                      </div>
                <?php }
                    $i++;
                  }
                } ?>
              </div>
              <!-- End .row -->

            </div>
            <!-- End .products -->
          </div>
          <!-- .End .tab-pane -->
          <div class="tab-pane p-0 fade" id="new-fishes-tab" role="tabpanel" aria-labelledby="new-fishes-link">
            <div class="products">
              <div class="row justify-content-center">

                <?php
                // $products = getProductByCategory('Fishes');
                $products = getAllProduct('products');
                $i = 0;
                while ($prod = mysqli_fetch_assoc($products)) {
                  $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $prod['id']));
                  if ($prod_det['category'] == "Fishes") {
                    if ($i == 8) {
                      break;
                    } else {

                ?>
                      <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                          <figure class="product-media">
                            <?php
                            if (isset($_SESSION['id']) && $prod["user_id"] == $_SESSION['id']) {
                            ?>
                              <span class="product-label label-new">Owned</span>
                            <?php } ?>
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                              <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 300px;" />

                            </a>


                            <div class="product-action-vertical">
                              <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                                <?php if (isset($_SESSION['id'])) {
                                  $check = usersWishlist(
                                    'wishlists',
                                    array('user_id', 'product_id'),
                                    array($_SESSION['id'], $prod_det['product_id'])
                                  ); ?>
                                  <?php if (mysqli_num_rows($check) > 0) { ?>

                                    <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="removeWishlist">
                                      <span>Remove From Wishlist</span>
                                    </button>
                                    <?php } else {
                                    if ($prod['user_id'] != $_SESSION['id']) { ?>

                                      <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                        <span>Add To Wishlist</span>
                                      </button>
                                  <?php }
                                  } ?>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                    <span>Add To Wishlist</span>
                                  </button>
                                <?php } ?>
                              </form>
                            </div>
                            <!-- End .product-action -->


                            <div class="product-action">
                              <form action="../Controller/CartsController.php" method="POST">
                                <div class="product-action product-action-transparent">

                                  <?php if (isset($_SESSION['id'])) {
                                    $check = usersCarts(
                                      $_SESSION['id'],
                                      $prod_det['product_id'],
                                      "No"
                                    ); ?>
                                    <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                    <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">
                                    <?php if (mysqli_num_rows($check) > 0) { ?>
                                      <button type="submit" class="btn-product btn-cart border-0" name="removeCart" id="removeCart">
                                        <span>Remove From Cart</span>
                                      </button>
                                      <?php } else {
                                      if ($prod['user_id'] != $_SESSION['id']) { ?>
                                        <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                          <span>Add To Cart</span>
                                        </button>
                                      <?php } else { ?>
                                        <a href="manageProducts.php" class="btn-product btn-cart border-0" name="addToCart">
                                          <span>Manage Product</span>
                                        </a>
                                    <?php }
                                    }
                                  } else { ?>
                                    <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                      <span>Add To Cart</span>
                                    </button>
                                  <?php } ?>
                                </div>
                              </form>



                            </div>
                            <!-- End .product-action -->
                          </figure>
                          <!-- End .product-media -->

                          <div class="product-body">
                            <div class="product-cat">
                              <?php echo $prod_det['category'] ?>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title">
                              <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                                <?php echo $prod_det['product_name'] ?>
                              </a>
                            </h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                              ₱
                              <?php echo number_format($prod_det['price'], 2) ?>
                            </div><!-- End .product-price -->

                            <?php
                            $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                            $rate = 0;
                            while ($star = mysqli_fetch_assoc($review)) {
                              $rate += $star['rate'];
                            }
                            if ($rate == 0) {
                              $total = 0;
                            } else {
                              $total = round($rate / mysqli_num_rows($review), PHP_ROUND_HALF_DOWN);
                            }
                            ?>
                            <div class="ratings-container">
                              <div class="ratings">
                                <?php if ($total == 0) { ?>
                                  <div class="ratings-val" style="width: 0%;"></div>
                                <?php } else if ($total == 1) { ?>
                                  <div class="ratings-val" style="width: 20%;"></div>
                                <?php } else if ($total == 2) { ?>
                                  <div class="ratings-val" style="width: 40%;"></div>
                                <?php } else if ($total == 3) { ?>
                                  <div class="ratings-val" style="width: 60%;"></div>
                                <?php } else if ($total == 4) { ?>
                                  <div class="ratings-val" style="width: 80%;"></div>
                                <?php } else if ($total == 5) { ?>
                                  <div class="ratings-val" style="width: 100%;"></div>
                                <?php } ?>

                              </div><!-- End .ratings -->
                              <span class="ratings-text">(
                                <?php echo mysqli_num_rows($review) ?> Reviews )
                              </span>
                            </div><!-- End .rating-container -->
                          </div><!-- End .product-body -->
                          <!-- End .product-body -->
                        </div>
                        <!-- End .product -->
                      </div>
                <?php }
                    $i++;
                  }
                } ?>
              </div>
              <!-- End .row -->
            </div>
            <!-- End .products -->
          </div>
          <!-- .End .tab-pane -->
          <div class="tab-pane p-0 fade" id="new-equipment-tab" role="tabpanel" aria-labelledby="new-equipment-link">
            <div class="products">
              <div class="row justify-content-center">

                <?php
                // $products = getProductByCategory('Equipment & Accessories');

                $i = 0;
                while ($prod = mysqli_fetch_assoc($products)) {
                  $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $prod['product_id']));
                  if ($prod_det['category'] == "Equipment & Accessories") {
                    if ($i == 8) {
                      break;
                    } else {

                ?>
                      <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-7 text-center">
                          <figure class="product-media">
                            <?php
                            if (isset($_SESSION['id']) && $prod["user_id"] == $_SESSION['id']) {
                            ?>
                              <span class="product-label label-new">Owned</span>
                            <?php } ?>
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                              <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 300px;" />

                            </a>


                            <div class="product-action-vertical">
                              <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                                <?php if (isset($_SESSION['id'])) {
                                  $check = usersWishlist(
                                    'wishlists',
                                    array('user_id', 'product_id'),
                                    array($_SESSION['id'], $prod_det['product_id'])
                                  ); ?>
                                  <?php if (mysqli_num_rows($check) > 0) { ?>

                                    <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="removeWishlist">
                                      <span>Remove From Wishlist</span>
                                    </button>
                                    <?php } else {
                                    if ($prod['user_id'] != $_SESSION['id']) { ?>

                                      <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                        <span>Add To Wishlist</span>
                                      </button>
                                  <?php }
                                  } ?>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product-icon btn-wishlist btn-expandable border-0" title="Add to wishlist" name="addToWishlist">
                                    <span>Add To Wishlist</span>
                                  </button>
                                <?php } ?>
                              </form>
                            </div>
                            <!-- End .product-action -->


                            <div class="product-action">
                              <form action="../Controller/CartsController.php" method="POST">
                                <div class="product-action product-action-transparent">

                                  <?php if (isset($_SESSION['id'])) {
                                    $check = usersCarts(
                                      $_SESSION['id'],
                                      $prod_det['product_id'],
                                      "No"
                                    ); ?>
                                    <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                    <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">
                                    <?php if (mysqli_num_rows($check) > 0) { ?>
                                      <button type="submit" class="btn-product btn-cart border-0" name="removeCart" id="removeCart">
                                        <span>Remove From Cart</span>
                                      </button>
                                      <?php } else {
                                      if ($prod['user_id'] != $_SESSION['id']) { ?>
                                        <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                          <span>Add To Cart</span>
                                        </button>
                                      <?php } else { ?>
                                        <a href="manageProducts.php" class="btn-product btn-cart border-0" name="addToCart">
                                          <span>Manage Product</span>
                                        </a>
                                    <?php }
                                    }
                                  } else { ?>
                                    <button type="submit" class="btn-product btn-cart border-0" name="addToCart">
                                      <span>Add To Cart</span>
                                    </button>
                                  <?php } ?>
                                </div>
                              </form>



                            </div>
                            <!-- End .product-action -->
                          </figure>
                          <!-- End .product-media -->

                          <div class="product-body">
                            <div class="product-cat">
                              <?php echo $prod_det['category'] ?>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title">
                              <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                                <?php echo $prod_det['product_name'] ?>
                              </a>
                            </h3>
                            <!-- End .product-title -->
                            <div class="product-price">
                              ₱
                              <?php echo number_format($prod_det['price'], 2) ?>
                            </div><!-- End .product-price -->

                            <?php
                            $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                            $rate = 0;
                            while ($star = mysqli_fetch_assoc($review)) {
                              $rate += $star['rate'];
                            }
                            if ($rate == 0) {
                              $total = 0;
                            } else {
                              $total = round($rate / mysqli_num_rows($review), PHP_ROUND_HALF_DOWN);
                            }
                            ?>
                            <div class="ratings-container">
                              <div class="ratings">
                                <?php if ($total == 0) { ?>
                                  <div class="ratings-val" style="width: 0%;"></div>
                                <?php } else if ($total == 1) { ?>
                                  <div class="ratings-val" style="width: 20%;"></div>
                                <?php } else if ($total == 2) { ?>
                                  <div class="ratings-val" style="width: 40%;"></div>
                                <?php } else if ($total == 3) { ?>
                                  <div class="ratings-val" style="width: 60%;"></div>
                                <?php } else if ($total == 4) { ?>
                                  <div class="ratings-val" style="width: 80%;"></div>
                                <?php } else if ($total == 5) { ?>
                                  <div class="ratings-val" style="width: 100%;"></div>
                                <?php } ?>

                              </div><!-- End .ratings -->
                              <span class="ratings-text">(
                                <?php echo mysqli_num_rows($review) ?> Reviews )
                              </span>
                            </div><!-- End .rating-container -->
                          </div><!-- End .product-body -->
                          <!-- End .product-body -->
                        </div>
                        <!-- End .product -->
                      </div>
                <?php }
                    $i++;
                  }
                } ?>
              </div>
              <!-- End .row -->
            </div>
            <!-- End .products -->
          </div>
          <!-- .End .tab-pane -->
        </div>
        <!-- End .tab-content -->

        <div class="more-container text-center mt-1 mb-3">
          <a href="product-lists.php" class="btn btn-outline-primary-2 btn-round btn-more">Load more</a>
        </div>
        <!-- End .more-container -->
      </div>
      <!-- End .container -->

      <div class="mb-2"></div>
      <!-- End .mb-2 -->

      <?php
      include("../Includes/blog.inc.php");
      include("../Includes/footer.inc.php");
      ?>
    </main>

  </div>

  <!-- End .page-wrapper -->
  <!-- <button id="scroll-top" title="Back to Top">
    <i class="icon-arrow-up"></i>
  </button> -->

  <?php
  include("../Includes/loginModal.inc.php");
  include("../Includes/mobileMenu.inc.php");
  include("../Includes/scripts.inc.php");
  ?>

</body>

</html>