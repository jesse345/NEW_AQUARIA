<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
    <link rel="stylesheet" href="../css/acc.css">
   
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

                                    <li class="nav-item active">

                                        <a class="nav-link active" href="myAccount.php">
                                            Account Details
                                        </a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a class="nav-link " href="accountInfo.php">Account Info
                                        </a>
                                    </li> -->

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

                                    <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                        <form action="../Controller/UsersController.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-element">
                                                        <input type="file" id="file-3" name="image" accept="image/*" required>
                                                        <label for="file-3" id="file-3-preview">
                                                            <img src="<?php echo $user['user_img']?>" >
                                                            <div>
                                                                <span>+</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" class="form-control" value="<?php echo ucfirst($user['first_name']) ?>" onkeypress="return isNotNumber(event)">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" value="<?php echo ucfirst($user['last_name']) ?>" onkeypress="return isNotNumber(event)">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Middle Initial</label>
                                                    <input type="text" name="mi" class="form-control" value="<?php echo ucfirst($user['mi']) ?>" onkeypress="return isNotNumber(event)">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo ucfirst($users['email_address']) ?>" disabled>
                                                </div>
                                               
                                                <?php


                                                ?>
                                                <div class="col-sm-6">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" value="<?php echo $users['username'] ?>" disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Password</label>
                                                    <br>
                                                    <button type="button" class="btn btn-outline-primary-2" data-toggle="modal" data-target="#changePass">
                                                        <span>Change Password</span>

                                                    </button>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-outline-primary-2" name="editAccount">
                                                <span>UPDATE</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </form>
                                    </div><!-- .End .tab-pane -->



                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </main><!-- End .main -->

        <!-- Modal -->
        <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="cp" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-5">

                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" name="current">
                                </div>

                                <div class="col-sm-12">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="newPassword">
                                </div>

                                <div class="col-sm-12">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPassword">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="change">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
        <?php


        include("../Includes/footer.inc.php");
        ?>
    </div>

    <?php
    include("../Includes/loginModal.inc.php");
    include("../Includes/mobileMenu.inc.php");
    include("../Includes/scripts.inc.php");
    ?>

    <script>
        function isNotNumber(event) {
            // get the code of the pressed key
            var charCode = (event.which) ? event.which : event.keyCode;
            // if the pressed key is a number, prevent it from being entered
            if (charCode >= 48 && charCode <= 57) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
    <script src="../JS/changePassword.js"></script>
    <script src="../js/acc.js"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>