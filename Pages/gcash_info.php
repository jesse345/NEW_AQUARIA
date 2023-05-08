<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
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
        $users = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
        ?>
        <main class="main">
            <div class="page-header text-center" style="background-image: url('../img/aq1.jpg')">
                <div class="container">
                    <h1 class="page-title text-white">My Account</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
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

                                    <li class="nav-item">
                                        <a class="nav-link active " href="gcash_info.php">Gcash Info
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="manageProducts.php">Manage My Products</a>
                                    </li>

                                    <li class="nav-item">
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
                                        <a class="nav-link" href="../includes/logout.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside>
                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-account-info" role="tabpanel" aria-labelledby="tab-account-info-link">
                                        <form action="../Controller/UsersController.php?user_id=<?php echo $user['user_id']?>" method="POST">
                                            <label>Gcash Name</label>
                                            <input type="text" name="gcash_name" class="form-control" value="<?php echo ucfirst($user['gcash_name']) ?>" required>

                                            <label>Gcash Number </label>
                                            <input type="number" name="gcash_number" class="form-control" value="<?php echo ucfirst($user['gcash_number']) ?>" required>
                                            
                                            <button type="submit" name="editGcash" class="btn btn-outline-primary-2">
                                                <span>EDIT GCASH INFO</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </form>
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