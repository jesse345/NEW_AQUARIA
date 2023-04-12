<!DOCTYPE html>
<html lang="en">

<head>


    <?php include("../Layouts/head.layout.php") ?>
    <link href="../css/verify.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <?php

    session_start();
    include("../Model/db.php");
    date_default_timezone_set('Asia/Manila');
    $date = date('y-m-d h:i:s');

    if (!empty($_SESSION['id'])) {
        $user = mysqli_fetch_assoc(getUser('users', 'id', $_SESSION['id']));
        $email = $user['email_address'];

        $check = mysqli_fetch_assoc(checkCode($_SESSION['id']));
        $date_created = $check['date_send'];
        $expiration_date = new DateTime($date_created);
        $expiration_date->add(new DateInterval('PT3M'));
        $expire = $expiration_date->format('Y-m-d H:i:s');
        $total = strtotime($expire) - strtotime($date);
        $minutes = floor($total / 60);
        $seconds = $total % 60;


        $em = explode("@", $email);
        $n = implode(array_slice($em, 0, count($em) - 1));
        $length = floor(strlen($n) / 2);
        $e = substr($n, 0, $length) . str_repeat('*', $length) . "@" . end($em);
        // if ($user['isVerified'] != "No") {
        //     header("Location: ../");
        // }
    } else {
        header("Location: ../Pages/login.php");
    }


    ?>

    <input type="hidden" name="time" id="time" value="<?php echo $total ?>">

    <div class="page-wrapper-layout">
        <header class="header-layout">
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
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right-layout">

                        <form action="../Controller/UsersController.php" method="POST">
                            <input type="submit" value="LOGOUT" name="logout">
                        </form>


                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->
        </header>



        <main class="main">
            <div class="page-content-layout">
                <div class="d-flex justify-content-center mt-5">
                    <div class="card py-5 px-3 border-0">
                        <h5 class="m-0">Email verification</h5>
                        <span class="">Enter the code we just send on your
                            email <br>
                            <b>
                                <?php echo $e; ?>
                            </b>
                        </span>



                        <?php

                        ?>
                        <div>
                            <?php if ($total > 0) { ?>
                                <p>The code will expire in

                                    <span id="timer" class="text-danger">
                                        <?php echo $minutes . ":" . $seconds ?>
                                    </span>
                                </p>
                            <?php } else { ?>
                                <p>
                                    The code expired.
                                </p>
                            <?php } ?>


                        </div>


                        <?php if ($total > 0) { ?>
                            <form id="verification">
                                <div class="not-expire">

                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                        <input class="m-2 text-center form-control rounded" type="text" id="first" name="first" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded" type="text" id="second" name="second" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded" type="text" id="third" name="third" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded" type="text" id="fourth" name="fourth" maxlength="1" />
                                        <input class="m-2 text-center form-control rounded" type="text" id="fifth" name="fifth" maxlength="1" />
                                    </div>
                                    <div class="text-center mt-2">
                                        <input type="submit" class=" font-weight-bold text-danger cursor" class="font-weight-bold text-danger border-0 bg-white" name="verify" id="verify">

                                    </div>
                            </form>
                            <form action="../Controller/UsersController.php" method="POST">
                                <input type="hidden" name="reg_email" id="reg_email" value="<?php echo $email ?>">
                                <div class="text-center mt-3"><span class="d-block mobile-text">Don't receive the code?</span>

                                    <input type="submit" class=" font-weight-bold text-danger cursor" class="font-weight-bold text-danger" value="Resend Code" name="resend" id="resend">

                                </div>
                            </form>
                    </div>

                <?php } else { ?>
                    <form action="../Controller/UsersController.php" method="POST">
                        <div class="expire">
                            <input type="hidden" name="reg_email" id="reg_email" value="<?php echo $email ?>">
                            <input type="submit" class=" font-weight-bold text-danger cursor" value="Resend Code" name="resend" id="resend">
                        </div>
                    </form>
                <?php } ?>

                </div>


            </div>
    </div>
    </main>
    <?php include("../Layouts/footer.layout.php"); ?>
    </div>



    <script>
        $(document).ready(function() {
            $("#verification").submit(function(e) {
                e.preventDefault();
                var first = $('input[name="first"]').val();
                var second = $('input[name="second"]').val();
                var third = $('input[name="third"]').val();
                var fourth = $('input[name="fourth"]').val();
                var fifth = $('input[name="fifth"]').val();
                var verify = $('input[name="verify"]').val();

                $.ajax({
                    type: "POST",
                    url: "../Controller/UsersController.php",
                    data: {
                        first: first,
                        second: second,
                        third: third,
                        fourth: fourth,
                        fifth: fifth,
                        verify: verify
                    },
                    success: function(response) {
                        if (response === "success") {
                            alert("Account Verified!");
                            window.location.href = "../Pages/accountDetailsForm.php";

                        } else if (response === "expire") {
                            alert("Expire");
                        } else {
                            alert("Invalid Code");
                        }
                    },
                    error: function() {
                        alert("Error logging in");
                    },
                });
            });
        });
    </script>

    <script src="../JS/verify.js"></script>




</body>

</html>