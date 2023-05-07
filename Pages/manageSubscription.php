<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <?php include("../Includes/head.inc.php") ?>
    <link rel="stylesheet" href="../css/manageSubscription.css">
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
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Manage Subscription</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Sybscription</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">

                        <div class="row">
                            <aside class="col-md-4 col-lg-2">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">

                                    <li class="nav-item">

                                        <a class="nav-link" href="myAccount.php">
                                            Account Details
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

                                    <li class="nav-item active">
                                        <a class="nav-link active" href="manageSubscription.php">Manage Subscription</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">

                                    <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">

                                        <?php
                                        $subscription = mysqli_fetch_assoc(getUserSubscription($_SESSION['id']));
                                        if ($users['isSubscribe'] == "Yes" && strtotime($subscription['date_end']) > time()) {
                                        ?>


                                            <div class="countdown-container">
                                                <div class="wrapper">
                                                    <h5>Your subscription will end in</h5>
                                                    <div class="countdown" data-date="<?php echo date('Y-m-d', strtotime($subscription['date_end'])) ?>" data-time="<?php echo date('h:i', strtotime($subscription['date_end'])) ?>">

                                                        <div class="day">
                                                            <span class="num"></span><span class="word"></span>
                                                        </div>
                                                        <div class="hour">
                                                            <span class="num"></span><span class="word"></span>
                                                        </div>
                                                        <div class="min">
                                                            <span class="num"></span><span class="word"></span>
                                                        </div>
                                                        <div class="sec">
                                                            <span class="num"></span><span class="word"></span>
                                                        </div>
                                                    </div>
                                                    <div>

                                                        <?php
                                                        if ($subscription['subscription_type'] == 1) {
                                                        ?>
                                                            <p>
                                                                <strong> Subscription Type</strong>: Standard
                                                            </p>

                                                            <p>
                                                                <strong>Benefits</strong>:
                                                                <i>3 months duration</i>,
                                                                <i>25 Product Post</i>,
                                                                <i>Browse Fish Manual</i>
                                                            </p>
                                                        <?php } else  if ($subscription['subscription_type'] == 2) { ?>

                                                            <p>
                                                                <strong> Subscription Type</strong>: Advanced
                                                            </p>

                                                            <p>
                                                                <strong>Benefits</strong>:
                                                                <i>6 months duration</i>,
                                                                <i>55 Product Post</i>,
                                                                <i>Browse Fish Manual</i>
                                                            </p>
                                                        <?php } else  if ($subscription['subscription_type'] == 3) { ?>

                                                            <p>
                                                                <strong> Subscription Type</strong>: Premium
                                                            </p>

                                                            <p>
                                                                <strong>Benefits</strong>:
                                                                <i>1 year duration</i>,
                                                                <i>Unlimited Product Post</i>,
                                                                <i>Browse Fish Manual</i>
                                                            </p>
                                                        <?php } ?>

                                                        <p><strong>Number of products left to post</strong>: <?php echo $subscription['number_of_products'] ?></p>
                                                        <?php if ($subscription['subscription_type'] != 3) { ?>
                                                            <button class="btn btn-outline-primary-2" data-toggle="modal" data-target="#extend">
                                                                <span>Extend</span>
                                                                <i class="icon-long-arrow-right"></i>
                                                            </button>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php } else {
                                            // expireSubscription($_SESSION['id']);
                                            $pending = mysqli_fetch_assoc(getUserSubscription($_SESSION['id']));
                                            if ($pending['status'] == 'Pending') {

                                                echo "<p class='text-danger'>
                                                Pending Subscription. Wait for the admin to approve your subscription
                                            </p>";
                                            } else {
                                            ?>

                                                <p class="text-danger">
                                                    You are not a subscribed user.
                                                </p>
                                                <a href="subscription.php" class="btn btn-outline-primary-2">
                                                    <span>Subscribe Now</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </a>


                                        <?php }
                                        } ?>

                                        <!-- Modal -->
                                        <div class="modal fade" id="extend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="../Controller/subscriptionController.php" method="POST">
                                                    <input type="hidden" name="subscription_id" value="<?php echo $subscription['subscription_id'] ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Extend Subscription</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body p-5">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="">Number of Products <i>(5 PHP each quantity)</i> </label>
                                                                    <input type="number" id="quantity" name="number_of_products" class="form-control" oninput="validateInput(event)">
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <label for="">Total Price</label>
                                                                    <input type="text" id="total" name="amount" class="form-control" value="0" readonly>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <label for="">Reference No.</label>
                                                                    <input type="number" class="form-control" name="reference_number" required>
                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <label for="">Receipt</label>
                                                                    <input type="file" class="form-control" name="receipt_img" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="extend" id="extend">Extend</button>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>

                                    </div><!-- .End .tab-pane -->



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
    <script>
        const $ = (elem) => document.querySelector(elem);

        const countdown = function(_config) {
            const tarDate = $(_config.target).getAttribute("data-date").split("-");
            const year = parseInt(tarDate[0]);
            const month = parseInt(tarDate[1]);
            const day = parseInt(tarDate[2]);
            let tarTime = $(_config.target).getAttribute("data-time");
            let tarhour, tarmin;

            if (tarTime != null) {
                tarTime = tarTime.split(":");
                tarhour = parseInt(tarTime[0]);
                tarmin = parseInt(tarTime[1]);
            }

            let months = [
                31,
                new Date().getFullYear() % 4 == 0 ? 29 : 28,
                31,
                30,
                31,
                30,
                31,
                31,
                30,
                31,
                30,
                31,
            ];
            let dateNow = new Date();
            let dayNow = dateNow.getDate();
            let monthNow = dateNow.getMonth() + 1;
            let yearNow = dateNow.getFullYear();
            let hourNow = dateNow.getHours();
            let minNow = dateNow.getMinutes();
            let count_day = 0,
                count_hour = 0,
                count_min = 0;
            let count_day_isSet = false;
            let isOver = false;

            // Set the date we're counting down to
            const countDownDate = new Date(
                year,
                month - 1,
                day,
                tarhour,
                tarmin,
                0,
                0
            ).getTime();

            $(_config.target + " .day .word").innerHTML = _config.dayWord;
            $(_config.target + " .hour .word").innerHTML = _config.hourWord;
            $(_config.target + " .min .word").innerHTML = _config.minWord;
            $(_config.target + " .sec .word").innerHTML = _config.secWord;

            const updateTime = () => {
                // Get todays date and time
                const now = new Date().getTime();

                // Find the distance between now an the count down date
                const distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                requestAnimationFrame(updateTime);

                $(_config.target + " .day .num").innerHTML = addZero(days);
                $(_config.target + " .hour .num").innerHTML = addZero(hours);
                $(_config.target + " .min .num").innerHTML = addZero(minutes);
                $(_config.target + " .sec .num").innerHTML = addZero(seconds);

                // If the count down is over, write some text
                if (distance < 0) {
                    window.location.reload();
                }
            };

            updateTime();
        };

        const addZero = (x) => (x < 10 && x >= 0 ? "0" + x : x);

        const efcc_countdown = new countdown({
            target: ".countdown",
            dayWord: " days",
            hourWord: " hours",
            minWord: " mins",
            secWord: " secs",
        });


        var quantityInput = document.getElementById("quantity");
        var totalInput = document.getElementById("total");

        quantityInput.addEventListener("input", function() {
            var quantity = Number(quantityInput.value);
            var total = quantity * 5;
            totalInput.value = total;



        });




        console.log(totalInput.value)

        function validateInput(event) {
            var input = event.target;
            if (input.value < 0) {
                input.value = 0;
            }

        }
    </script>
    <style>
        /* Remove up and down arrows */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>



    <?php
    include("../Includes/loginModal.inc.php");
    include("../Includes/mobileMenu.inc.php");
    include("../Includes/scripts.inc.php");
    ?>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>