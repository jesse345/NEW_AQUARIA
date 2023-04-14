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

                                    <li class="nav-item">
                                        <a class="nav-link " href="accountInfo.php">Account Info
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
                                        <a class="nav-link" href="#">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-10">
                                <div class="tab-content">

                                    <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">

                                        <?php
                                        $subscription = mysqli_fetch_assoc(getUserSubscription($_SESSION['id']));
                                        if ($users['isSubscribe'] == "Yes") {
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
                                                        <p>
                                                            <strong> Subscritption Type</strong>: Standard
                                                        </p>

                                                        <p>
                                                            <strong>Benefits</strong>:
                                                            <i>3 months duration</i>,
                                                            <i>Unlimited Product Post</i>,
                                                            <i>Browse Fish Manual</i>
                                                        </p>


                                                    </div>
                                                </div>

                                            </div>
                                        <?php } ?>

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
                    $(".countdown").innerHTML = "EXPIRED";
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
    </script>

    <?php
    include("../Includes/loginModal.inc.php");
    include("../Includes/mobileMenu.inc.php");
    include("../Includes/scripts.inc.php");
    ?>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>