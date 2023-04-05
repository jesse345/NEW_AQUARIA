<!DOCTYPE html>
<html lang="en">
<!-- molla/category-list.html  22 Nov 2019 10:02:52 GMT -->

<head>
  <?php include("../Includes/head.inc.php") ?>
</head>

<body>
  <div class="page-wrapper">
    <?php include("../Includes/header.inc.php") ?>
    <main class="main">
      <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
          <h1 class="page-title">Products</h1>
        </div>
        <!-- End .container -->
      </div>
      <!-- End .page-header -->
      <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->

      <div class="page-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">
              <div class="toolbox">
                <div class="toolbox-left">
                  <div class="toolbox-info">
                    Showing <span>9 of 56</span> Products
                  </div>
                  <!-- End .toolbox-info -->
                </div>
                <!-- End .toolbox-left -->

                <div class="toolbox-right">
                  <div class="toolbox-sort">
                    <label for="sortby">Sort by:</label>
                    <div class="select-custom">
                      <select name="sortby" id="sortby" class="form-control">
                        <option value="popularity" selected="selected">
                          Most Popular
                        </option>
                        <option value="rating">Most Rated</option>
                        <option value="date">Date</option>
                      </select>
                    </div>
                  </div>
                  <!-- End .toolbox-sort -->
                  <div class="toolbox-layout">
                    <a href="product-lists.php" class="btn-layout active">
                      <svg width="16" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="10" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="10" height="4" />
                      </svg>
                    </a>

                    <a href="product-2cols.php" class="btn-layout">
                      <svg width="10" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                      </svg>
                    </a>

                    <a href="product-3cols.php" class="btn-layout">
                      <svg width="16" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="12" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                        <rect x="12" y="6" width="4" height="4" />
                      </svg>
                    </a>

                    <a href="product-4cols.php" class="btn-layout">
                      <svg width="22" height="10">
                        <rect x="0" y="0" width="4" height="4" />
                        <rect x="6" y="0" width="4" height="4" />
                        <rect x="12" y="0" width="4" height="4" />
                        <rect x="18" y="0" width="4" height="4" />
                        <rect x="0" y="6" width="4" height="4" />
                        <rect x="6" y="6" width="4" height="4" />
                        <rect x="12" y="6" width="4" height="4" />
                        <rect x="18" y="6" width="4" height="4" />
                      </svg>
                    </a>
                  </div>
                  <!-- End .toolbox-layout -->
                </div>
                <!-- End .toolbox-right -->
              </div>
              <!-- End .toolbox -->

              <div class="products mb-3">
                <?php

                $products = getAllProduct('products');
                while ($product = mysqli_fetch_assoc($products)) {
                  $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $product['id']));
                  $review = getProductReviews('feedbacks', 'product_id', $prod_det['product_id']);
                  ?>
                  <div class="product product-list">
                    <div class="row">
                      <div class="col-6 col-lg-3">
                        <figure class="product-media">

                          <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>">
                            <img src="<?php echo $prod_det['product_img'] ?>" alt="Product image" class="product-image"
                              style="height: 184px" />
                          </a>
                        </figure>
                        <!-- End .product-media -->
                      </div>
                      <!-- End .col-sm-6 col-lg-3 -->

                      <div class="col-6 col-lg-3 order-lg-last">
                        <div class="product-list-action">
                          <div class="product-price">₱
                            <?php echo number_format($prod_det['price'], 2) ?>
                          </div>
                          <!-- End .product-price -->
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
                              <button type="submit" class="btn-product btn-cart w-100 bg-transparent" name="addToCart"
                                id="addToCart">
                                <span>Add To Cart</span>
                              </button>
                            <?php } ?>

                          </form>

                        </div>

                      </div>


                      <div class="col-lg-6">
                        <div class="product-body product-action-inner">
                          <form
                            action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>"
                            method="POST">
                            <?php if (isset($_SESSION['id'])) {
                              $check = usersWishlist(
                                'wishlists',
                                array('user_id', 'product_id'),
                                array($_SESSION['id'], $prod_det['product_id'])
                              ); ?>
                              <?php if (mysqli_num_rows($check) > 0) { ?>

                                <button type="submit" class="btn-product btn-wishlist border-0 text-danger" title="Wishlist"
                                  name="removeWishlist">

                                </button>
                              <?php } else { ?>
                                <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2"
                                  title="Wishlist" name="addToWishlist">

                                </button>
                              <?php } ?>
                            <?php } else { ?>
                              <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2"
                                title="Add to wishlist" name="addToWishlist">

                              </button>
                            <?php } ?>
                          </form>
                          <div class="product-cat">
                            <a href="#">
                              <?php echo $prod_det['category'] ?>
                            </a>
                          </div>
                          <!-- End .product-cat -->
                          <h3 class="product-title">
                            <a href="product.php?product_id=<?php echo $prod_det['product_id'] ?>"><?php echo ucfirst($prod_det['product_name']) ?></a>
                          </h3>
                          <!-- End .product-title -->

                          <div class="product-content">
                            <p>
                              <?php echo ucfirst($prod_det['description']) ?>
                            </p>
                          </div>
                          <!-- End .product-content -->
                        </div>
                        <!-- End .product-body -->
                      </div>
                      <!-- End .col-lg-6 -->


                    </div>
                    <!-- End .row -->
                  </div>

                <?php } ?>




                <!-- End .product -->
              </div>
              <!-- End .products -->

              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                      aria-disabled="true">
                      <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                    </a>
                  </li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item-total">of 6</li>
                  <li class="page-item">
                    <a class="page-link page-link-next" href="#" aria-label="Next">
                      Next
                      <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- End .col-lg-9 -->

            <aside class="col-lg-3 order-lg-first">
              <div class="sidebar sidebar-shop">
                <div class="widget widget-clean">
                  <label>Filters:</label>
                  <a href="#" class="sidebar-filter-clear">Clean All</a>
                </div>
                <!-- End .widget widget-clean -->

                <div class="widget widget-collapsible">
                  <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                      aria-controls="widget-1">
                      Category
                    </a>
                  </h3>
                  <!-- End .widget-title -->

                  <div class="collapse show" id="widget-1">
                    <div class="widget-body">
                      <div class="filter-items filter-items-count">
                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-1" />
                            <label class="custom-control-label" for="cat-1">Dresses</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">3</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-2" />
                            <label class="custom-control-label" for="cat-2">T-shirts</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">0</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-3" />
                            <label class="custom-control-label" for="cat-3">Bags</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">4</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-4" />
                            <label class="custom-control-label" for="cat-4">Jackets</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">2</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-5" />
                            <label class="custom-control-label" for="cat-5">Shoes</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">2</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-6" />
                            <label class="custom-control-label" for="cat-6">Jumpers</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">1</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-7" />
                            <label class="custom-control-label" for="cat-7">Jeans</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">1</span>
                        </div>
                        <!-- End .filter-item -->

                        <div class="filter-item">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="cat-8" />
                            <label class="custom-control-label" for="cat-8">Sportwear</label>
                          </div>
                          <!-- End .custom-checkbox -->
                          <span class="item-count">0</span>
                        </div>
                        <!-- End .filter-item -->
                      </div>
                      <!-- End .filter-items -->
                    </div>
                    <!-- End .widget-body -->
                  </div>
                  <!-- End .collapse -->
                </div>
                <!-- End .widget -->
              </div>
              <!-- End .sidebar sidebar-shop -->
            </aside>
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

<!-- molla/category-list.html  22 Nov 2019 10:02:52 GMT -->

</html>