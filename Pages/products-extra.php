<!DOCTYPE html>
<html lang="en">
<!-- molla/category-list.html  22 Nov 2019 10:02:52 GMT -->

<head>
  <?php include("../Includes/head.inc.php")?>
  
</head>

<body>

  <div class="page-wrapper">
    <?php
    include("../Includes/header.inc.php");
    $seller = mysqli_fetch_assoc(getUser('user_details', 'user_id', $_GET['user_id']));
    ?>
    <main class="main">
      <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2 mt-2">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="product-lists.php">Products</a></li>
           <li class="breadcrumb-item"> <strong><a href="#"><?php echo ucfirst($seller['first_name']) . " " . ucfirst($seller['last_name']) . "'s" . "  " . "store"   ?></a></strong></li>
            <?php if (isset($_GET['search'])) { ?>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['search'] ?></li>
            <?php } ?>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->
    <h1 style="text-align:center;"><?php echo ucfirst($seller['first_name']) . " " . ucfirst($seller['last_name']) . "'s" . " " . "store"?></h1><br><br>
      <div class="page-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <?php if (!isset($_GET['search'])) { ?>
                <div class="products mb-3">
                  <?php
                    $products = getAllProds('products', $_GET['user_id']);
                    while ($product = mysqli_fetch_assoc($products)) {
                    $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $product['id']));
                    $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                    
                  ?>
                    <div class="product product-list">
                      <div class="row">
                        <div class="col-6 col-lg-3">
                          <figure class="product-media">
                          <?php
                      if (isset($_SESSION['id']) && $product["user_id"] == $_SESSION['id']) {
                      ?>
                        <span class="product-label label-new">Owned</span>
                      <?php } ?>
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                              <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 184px" />
                            </a>
                          </figure>

                        </div>

                        <div class="col-6 col-lg-3 order-lg-last">
                          <div class="product-list-action">
                            <div class="product-price">₱
                              <?php echo number_format($prod_det['price'], 2) ?>
                            </div>

                            <div class="ratings-container">
                              <div class="ratings">
                                <?php
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

                              </div>

                              <span class="ratings-text">(
                                <?php echo mysqli_num_rows($review) ?> )
                              </span>
                            </div>

                            <form action="../Controller/CartsController.php" method="POST">
                              <?php if (isset($_SESSION['id'])) {
                                $check = usersCart(
                                  'carts',
                                  array('user_id', 'product_id'),
                                  array($_SESSION['id'], $prod_det['product_id'])
                                ); ?>
                                <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">

                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">

                                <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">

                                <?php if (mysqli_num_rows($check) > 0) { ?>
                                  <button type="submit" class="btn-product btn-cart w-100" name="removeCart" id="removeCart">
                                    <span>Remove From Cart</span>
                                  </button>
                                <?php } else {
                                if ($product["user_id"] == $_SESSION['id']) {
                                ?>
                                  <a href="manageProducts.php" class="btn-product btn-cart w-100 bg-transparent" name="addToCart">
                                    <span>Manage Product</span>
                                  </a>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product btn-cart w-100 bg-transparent" name="addToCart">
                                    <span>Add to Cart</span>
                                  </button>
                              <?php  }
                              } ?> 
                              <?php } else { ?>
                                <button type="submit" class="btn-product btn-cart w-100 bg-transparent" name="addToCart" id="addToCart">
                                  <span>Add To Cart</span>
                                </button>
                              <?php } ?>

                            </form>

                          </div>

                        </div>


                        <div class="col-lg-6">
                          <div class="product-body product-action-inner">
                            <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                              <?php if (isset($_SESSION['id'])) {
                                $check = usersWishlist(
                                  'wishlists',
                                  array('user_id', 'product_id'),
                                  array($_SESSION['id'], $prod_det['product_id'])
                                ); ?>
                                <?php if (mysqli_num_rows($check) > 0) { ?>

                                  <button type="submit" class="btn-product btn-wishlist border-0 text-danger" title="Wishlist" name="removeWishlist">

                                  </button>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Wishlist" name="addToWishlist">

                                  </button>
                                <?php } ?>
                              <?php } else { ?>
                                <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Add to wishlist" name="addToWishlist">

                                </button>
                              <?php } ?>
                            </form>
                            <div class="product-cat">
                              <a href="#">
                                <?php echo $prod_det['category'] ?>
                              </a>
                            </div>
                            <h3 class="product-title">
                              <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>"><?php echo ucfirst($prod_det['product_name']) ?></a>
                            </h3>
                            <div class="product-content">
                              <p>
                                <?php echo ucfirst($prod_det['description']) ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
                
              <?php } else { ?>
                <div class="products mb-3">
                  <?php
                  $products = searchProduct($_GET['search']);
                  if (mysqli_num_rows($products) > 0) {
                    while ($prod_det = mysqli_fetch_assoc($products)) {
                      $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                  ?>
                      <div class="product product-list">
                        <div class="row">
                          <div class="col-6 col-lg-3">
                            <figure class="product-media">

                              <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                                <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image" style="height: 184px" />
                              </a>
                            </figure>

                          </div>


                          <div class="col-6 col-lg-3 order-lg-last">
                            <div class="product-list-action">
                              <div class="product-price">₱
                                <?php echo number_format($prod_det['price'], 2) ?>
                              </div>

                              <div class="ratings-container">
                                <div class="ratings">
                                  <?php
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

                                </div>

                                <span class="ratings-text">(
                                  <?php echo mysqli_num_rows($review) ?> )
                                </span>
                              </div>




                              <form action="../Controller/CartsController.php" method="POST">
                                <?php if (isset($_SESSION['id'])) {
                                  $check = usersCart(
                                    'carts',
                                    array('user_id', 'product_id'),
                                    array($_SESSION['id'], $prod_det['product_id'])
                                  ); ?>
                                  <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">

                                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">

                                  <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">

                                  <?php if (mysqli_num_rows($check) > 0) { ?>
                                    <button type="submit" class="btn-product btn-cart w-100" name="removeCart" id="removeCart">
                                      <span>Remove From Cart</span>
                                    </button>
                                  <?php } else { ?>
                                    <button type="submit" class="btn-product btn-cart w-100 " name="addToCart" id="addToCart">
                                      <span class="">Add To Cart</span>
                                    </button>
                                  <?php } ?>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product btn-cart w-100 bg-transparent" name="addToCart" id="addToCart">
                                    <span>Add To Cart</span>
                                  </button>
                                <?php } ?>

                              </form>

                            </div>

                          </div>


                          <div class="col-lg-6">
                            <div class="product-body product-action-inner">
                              <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                                <?php if (isset($_SESSION['id'])) {
                                  $check = usersWishlist(
                                    'wishlists',
                                    array('user_id', 'product_id'),
                                    array($_SESSION['id'], $prod_det['product_id'])
                                  ); ?>
                                  <?php if (mysqli_num_rows($check) > 0) { ?>

                                    <button type="submit" class="btn-product btn-wishlist border-0 text-danger" title="Wishlist" name="removeWishlist">

                                    </button>
                                  <?php } else { ?>
                                    <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Wishlist" name="addToWishlist">

                                    </button>
                                  <?php } ?>
                                <?php } else { ?>
                                  <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Add to wishlist" name="addToWishlist">

                                  </button>
                                <?php } ?>
                              </form>
                              <div class="product-cat">
                                <a href="#">
                                  <?php echo $prod_det['category'] ?>
                                </a>
                              </div>
                              <h3 class="product-title">
                                <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>"><?php echo ucfirst($prod_det['product_name']) ?></a>
                              </h3>
                              <div class="product-content">
                                <p>
                                  <?php echo ucfirst($prod_det['description']) ?>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }
                  } else { ?>
                    <p style="font-size: 3rem"> Product <strong style="color:black"> <?php echo $_GET['search'] ?> </strong> not found! </p>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
            <!-- End .col-lg-3 -->
          </div>
          <!-- End .row -->
        </div>
        <!-- End .container -->
      </div>
      <!-- End .page-content -->
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
</html>