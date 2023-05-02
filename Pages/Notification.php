<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Layouts/head.layout.php") ?>
    <link rel="stylesheet" href="../css/notification.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>


    <div class="page-wrapper-layout">
        <?php include("../Layouts/header.layout.php");
        markAsRead($_SESSION['id']);
        ?>

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Notifications</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-5">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Notifications</a></li>

                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content-layout">

                <div class="notification-ui_dd-content container">

                    <?php $notifications = viewAllNotif('notification', 'user_id', $_SESSION['id']);
                    while ($notification = mysqli_fetch_assoc($notifications)) {
                        $notif = mysqli_fetch_assoc(viewAllNotif('notification_details', 'notification_id', $notification['id']));
                    ?>
                        <a href="<?php echo $notification['redirect'] ?>">
                            <div class="notification-list">
                                <div class="notification-list_content">

                                    <div class="notification-list_detail">
                                        <p><b><?php echo $notif['title'] ?></b> </p>
                                        <p class="text-muted"><?php echo $notif['Description'] ?></p>
                                        <?php
                                        $time = strtotime($notification['date_send']);
                                        $minutes_ago = floor((time() - $time) / 60);

                                        ?>
                                        <p class="text-muted">
                                            <small>
                                                <?php if ($minutes_ago >= 60) {

                                                    $hours_ago = floor($minutes_ago / 60);
                                                    if ($hours_ago < 24) {
                                                        echo $hours_ago;
                                                ?>
                                                        hours ago
                                                    <?php } else {
                                                        $days_ago = floor($hours_ago / 24);
                                                        echo $days_ago;
                                                    ?>
                                                        days ago
                                                    <?php }
                                                } else {
                                                    echo $minutes_ago; ?>
                                                    minutes ago
                                                <?php } ?>
                                            </small>
                                        </p>

                                    </div>


                                </div>
                                <div class="dropdown">
                                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:0;background-color:#fff;margin-left:360px;">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <form action="../Controller/NotificationController.php?notif_id=<?php echo $notification['id'] ?>" method="POST">
                                            <input type="submit" name="delete" class="dropdown-item" value="Delete" style="font-size: 1.3rem;">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>


                </div>

                <!-- <div class="text-center">
                    <a href="#!" class="dark-link">Load more activity</a>
                </div> -->


            </div>

        </main>
        <?php include("../Layouts/footer.layout.php"); ?>
    </div>

    <?php
    include("../Layouts/mobileMenu.layout.php");
    include("../Layouts/scripts.layout.php")
    ?>

</body>


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->

</html>