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

        $user = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
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
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="accountInfo.php">Account Info
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
                                        <a class="nav-link" href="#">Sign Out</a>
                                    </li>
                                </ul>
                            </aside>
                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-account-info" role="tabpanel" aria-labelledby="tab-account-info-link">
                                        <form action="../Controller/accountInfoController.php" method="POST">
                                            <label>Username *</label>
                                            <input type="hidden" name="id" value="<?php echo $user['id']?>">
                                            <input type="email" class="form-control" value="<?php echo ucfirst($user['username']) ?>" readonly>
                                            <label>Current Password</label>
                                            <input type="password" name="current_pass" class="form-control" required>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>New Password</label>
                                                    <input type="password" name="new_pass" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="confirm_pass" class="form-control">
                                                </div><!-- End .col-sm-6 -->

                                            </div><!-- End .row -->
                                            <button type="submit" class="btn btn-outline-primary-2" name="CHANGEPASS">
                                                <span>CHANGE PASSWORD</span>
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