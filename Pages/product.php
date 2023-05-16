<!DOCTYPE html>
<html lang="en">


<!-- molla/product-centered.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
    <link rel="stylesheet" href="../assets/css/plugins/nouislider/nouislider.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        .btn-primary:hover {
            background-color: #0069d9 !important;
            border-color: #0069d9 !important;

        }
    </style>
</head>

<body>
    <?php
    if (!isset($_GET['product_id'])) {
        echo "<script>
            alert('Invalid Request');
            window.location.href = '../'
        </script>";
    }
    ?>
    <div class="page-wrapper">
        <?php
        include("../Includes/header.inc.php");
        $prod = mysqli_fetch_assoc(getProduct('products', 'id', $_GET['product_id']));
        $prod_det = mysqli_fetch_assoc(getProduct('product_details', 'product_id', $_GET['product_id']));

        $seller = mysqli_fetch_assoc(getUser('user_details', 'user_id', $prod['user_id']));
        ?>
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="product-lists.php">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo $prod_det['product_name'] ?>
                        </li>
                    </ol>


                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="<?php echo $prod_det['product_img'] ?>" data-zoom-image="<?php echo $prod_det['product_img'] ?>" alt="product image" style="height:350px">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <?php
                                            $images = getProduct('product_images', 'product_id', $_GET['product_id']);
                                            while ($img = mysqli_fetch_assoc($images)) {
                                            ?>
                                                <a class="product-gallery-item active" href="#" data-image="<?php echo $img['img'] ?>" data-zoom-image="<?php echo $img['img'] ?>">
                                                    <img src="<?php echo $img['img'] ?>" alt="product side" style="height:100px">
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $review = getProductReviews('feedbacks', 'product_id', $_GET['product_id']);
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
                            <div class="col-md-6">
                                <div class="product-details">
                                    <strong><a href="products-extra.php?user_id=<?php echo $seller['user_id'] ?>" name="submit"><?php echo ucfirst($seller['first_name']) . " " . ucfirst($seller['last_name'])   ?></a></strong>
                                </div>


                                <div class="product-details product-details-centered">
                                    <h1 class="product-title">
                                        <?php echo ucfirst($prod_det['product_name']) ?>
                                    </h1><!-- End .product-title -->

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

                                        <a class="ratings-text" href="#product-review-link" id="review-link">(
                                            <?php echo mysqli_num_rows($review) ?> Reviews
                                            )
                                        </a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">₱
                                        <?php echo number_format($prod_det['price'], 2) ?>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>
                                            <?php echo ucfirst($prod_det['description']) ?>
                                        </p>
                                    </div><!-- End .product-content -->


                                    <div class="product-details-action">
                                        <form action="../Controller/CartsController.php" method="POST">
                                            <div class="details-action-col">

                                                <div class="product-details-quantity">
                                                    <?php
                                                    if (isset($_SESSION['id']) && $prod['user_id'] != $_SESSION['id']) {
                                                    ?>
                                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="<?php echo $prod_det['quantity'] ?>" step="1" data-decimals="0" name="quantity" required>
                                                    <?php } else { ?>
                                                        <p>Stock: <?php echo $prod_det['quantity'] ?></p>
                                                    <?php } ?>
                                                </div>

                                                <?php if (isset($_SESSION['id'])) {
                                                    $check = usersCarts(
                                                        $_SESSION['id'],
                                                        $prod_det['product_id'],
                                                        "No"
                                                    ); ?>
                                                    <input type="hidden" name="product_id" value="<?php echo $prod_det['product_id'] ?>">

                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">

                                                    <input type="hidden" name="price" value="<?php echo $prod_det['price'] ?>">

                                                    <?php if (mysqli_num_rows($check) > 0) { ?>
                                                        <button type="submit" class="btn-product btn-cart border-0" name="removeCart" id="removeCart">
                                                            <span>Remove From Cart</span>
                                                        </button>
                                                    <?php } else { ?>
                                                        <?php
                                                        if ($prod['user_id'] != $_SESSION['id']) {
                                                        ?>
                                                            <button type="submit" class="btn-product btn-cart " name="addToCart" id="addToCart">
                                                                <span class="">Add To Cart</span>
                                                            </button>
                                                        <?php } else { ?>
                                                            <a href="manageProducts.php" class="btn-product btn-cart border-0" name="addToCart">
                                                                <span>Manage Product</span>
                                                            </a>
                                                    <?php }
                                                    }
                                                } else { ?>
                                                    <button type="submit" class="btn-product btn-cart border-0" name="addToCart" id="addToCart">
                                                        <span>Add To Cart</span>
                                                    </button>
                                                <?php } ?>

                                        </form>
                                    </div>

                                    <div class="details-action-wrapper">
                                        <form action="../Controller/WishlistsController.php?product_id=<?php echo $prod_det['product_id'] ?>" method="POST">
                                            <?php if (isset($_SESSION['id'])) {
                                                $check = usersWishlist(
                                                    'wishlists',
                                                    array('user_id', 'product_id'),
                                                    array($_SESSION['id'], $prod_det['product_id'])
                                                ); ?>
                                                <?php if (mysqli_num_rows($check) > 0) { ?>

                                                    <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Wishlist" name="removeWishlist">
                                                        <span>Remove From Wishlist</span>
                                                    </button>
                                                    <?php } else {
                                                    if ($prod['user_id'] != $_SESSION['id']) { ?>

                                                        <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Wishlist" name="addToWishlist">
                                                            <span>Add To Wishlist</span>
                                                        </button>
                                                <?php }
                                                } ?>
                                            <?php } else { ?>
                                                <button type="submit" class="btn-product btn-wishlist border-0 bg-transparent mr-2" title="Add to wishlist" name="addToWishlist">
                                                    <span>Add To Wishlist</span>
                                                </button>
                                            <?php } ?>
                                        </form>

                                        <?php if (isset($_SESSION['id'])  && $prod['user_id'] != $_SESSION['id']) { ?>
                                            <a href="#" class="btn-product icon-font-awesome-flag text-danger" data-toggle="modal" data-target="#report">
                                                <span class="text-danger">Report Product</span></a>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content p-5">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Select a Reason</h5>
                                            </div>
                                            <form action="../Controller/ReportController.php?product_id=<?php echo $_GET['product_id'] ?>" method="POST">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <select name="report_type" style="width:100%; padding: 3%;">
                                                            <option value="Prohibited Items/Products">Prohibited Items/Products</option>
                                                            <option value="Offensive or Potential Offensive Items">Offensive or Potential Offensive Items </option>
                                                            <option value="Illegam Items/Products ">Illegam Items/Products </option>
                                                            <option value="Critically Extinct Species">Critically Extinct Species </option>
                                                            <option value="Unrelated Items/Products">Unrelated Items/Products </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="report" class="btn btn-danger">Send Report</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <a href="../pages/chat.php?user=<?php echo $prod['user_id'] ?>" class="btn btn-primary text-white"><i class='fas fa-comment-dots'></i>Chat Now</a>
                                    </div>

                                    <div class="social-icons social-icons-sm">
                                        <span>Category:</span>
                                        <?php echo $prod_det['category'] ?>


                                    </div>

                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">
                                Reviews (
                                <?php
                                $review = getProductReviews('feedbacks', 'product_id', $_GET['product_id']);
                                echo mysqli_num_rows($review); ?>
                                )


                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Description</h3>
                                <p>
                                    <?php echo $prod_det['description']; ?>
                                </p>
                                <ul>
                                    <li> <strong>Quantity: </strong>
                                        <?php echo $prod_det['quantity']; ?>
                                        remaining
                                    </li>
                                    <?php if ($prod_det['category'] == "Aquarium") { ?>
                                        <li> <strong>Tank Type: </strong>
                                            <?php echo $prod_det['tank_type']; ?>
                                        </li>
                                        <li> <strong>Tank Dimension: </strong>
                                            <?php echo $prod_det['dimension']; ?>
                                        </li>
                                        <li> <strong>Thickness of Glass: </strong>
                                            <?php echo $prod_det['thickness']; ?>
                                        </li>
                                    <?php } else if ($prod_det['category'] == "Fishes") { ?>
                                        <li> <strong>Fish Type: </strong>
                                            <?php echo $prod_det['fish_type']; ?>
                                        </li>
                                        <li> <strong>Fish Classification: </strong>
                                            <?php echo $prod_det['fish_class']; ?>
                                        </li>
                                        <li> <strong>Size: </strong>
                                            <?php echo $prod_det['size']; ?>
                                        </li>
                                        <li> <strong>Gender: </strong>
                                            <?php echo $prod_det['gender']; ?>
                                        </li>
                                        <li> <strong>Age: </strong>
                                            <?php echo $prod_det['age']; ?>
                                        </li>
                                        <li> <strong>Scientific Name: </strong>
                                            <?php echo $prod_det['scientificName']; ?>
                                        </li>
                                        <li> <strong>Lifespan: </strong>
                                            <?php echo $prod_det['lifespan']; ?>
                                        </li>
                                    <?php } else if ($prod_det['category'] == "Equipment & Accessories") { ?>
                                        <li> <strong>Product Specification: </strong>
                                            <?php echo $prod_det['specification']; ?>
                                        </li>
                                    <?php } else { ?>
                                        <li> <strong>Expiration Date: </strong>
                                            <?php echo $prod_det['expiration_date']; ?>
                                        </li>
                                        <li> <strong>Benefits: </strong>
                                            <?php echo $prod_det['benefits']; ?>
                                        </li>
                                    <?php } ?>
                                    <li> <strong>Transaction Type: </strong>
                                        <?php echo $prod_det['shipping_type'] ?>
                                    </li>
                                </ul>

                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->


                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (
                                    <?php
                                    $review = getProductReviews('feedbacks', 'product_id', $_GET['product_id']);
                                    echo mysqli_num_rows($review); ?>)
                                </h3>

                                <?php
                                if (mysqli_num_rows($review) > 0) {
                                    while ($rev = mysqli_fetch_assoc($review)) {
                                        $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $rev['user_id']));
                                ?>
                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">
                                                            <?php echo ucfirst($user['first_name']) . " " . ucfirst($user['last_name']) ?>
                                                        </a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <?php if ($rev['rate'] == 1) { ?>
                                                                <div class="ratings-val" style="width: 20%;"></div>
                                                            <?php } else if ($rev['rate'] == 2) { ?>
                                                                <div class="ratings-val" style="width: 40%;"></div>
                                                            <?php  } else if ($rev['rate'] == 3) { ?>
                                                                <div class="ratings-val" style="width: 60%;"></div>
                                                            <?php  } else if ($rev['rate'] == 4) { ?>
                                                                <div class="ratings-val" style="width: 80%;"></div>
                                                            <?php  } else if ($rev['rate'] == 5) { ?>
                                                                <div class="ratings-val" style="width: 100%;"></div>
                                                            <?php  } ?>



                                                        </div>
                                                    </div>

                                                </div><!-- End .col -->
                                                <div class="col">

                                                    <h4>
                                                        <?php if ($total == 1) { ?>
                                                            Very Bad
                                                        <?php } else if ($total == 2) { ?>
                                                            Bad
                                                        <?php } else if ($total == 3) { ?>
                                                            Not So Bad but Not So Good
                                                        <?php } else if ($total == 4) { ?>
                                                            Good
                                                        <?php } else if ($total == 5) { ?>
                                                            Very Good
                                                        <?php } ?>
                                                    </h4>

                                                    <div class="review-content">
                                                        <p>
                                                            <?php echo $rev['feedback'] ?>
                                                        </p>
                                                    </div><!-- End .review-content -->


                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->
                                        </div><!-- End .review -->
                                <?php }
                                } else {
                                    echo "No reviews...";
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="title text-center mb-4">You May Also Like</h2>
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
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
                                    "nav": true,
                                    "dots": false
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
                                    if (isset($_SESSION['id']) && $prod["user_id"] == $_SESSION['id']) {
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
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <form action="../Controller/CartsController.php" method="POST">
                                            <div class="product-action product-action-transparent">

                                                <?php if (isset($_SESSION['id'])) {
                                                    $check = usersCarts(
                                                        $_SESSION['id'],
                                                        $prod_det['product_id'],
                                                        "No"
                                                    );  ?>
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
                                                    <button type="submit" class="btn-product btn-cart border-0" name="addToCart" id="addToCart">
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
                                    <div class="product-price"> ₱
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
                            </div><!-- End .product -->

                    <?php }

                        $i++;
                    } ?>
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->

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


<!-- molla/product-centered.html  22 Nov 2019 10:03:20 GMT -->

</html>