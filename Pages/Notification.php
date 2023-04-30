<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Layouts/head.layout.php") ?>
    <link rel="stylesheet" href="../css/notification.css">
</head>

<body>


    <div class="page-wrapper-layout">
        <?php include("../Layouts/header.layout.php") ?>

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
                    <div class="notification-list notification-list">

                        <div class="notification-list_content">
                            <input type="checkbox" name="" id="" class="mr-5">
                            <div class="notification-list_img">
                                <img src="https://i.imgur.com/zYxDCQT.jpg" alt="user">
                            </div>
                            <div class="notification-list_detail">
                                <p><b>John Doe</b> reacted to your post</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
                                <p class="text-muted"><small>10 mins ago</small></p>
                            </div>
                        </div>
                        <div class="notification-list_feature-img">
                            <img src="https://i.imgur.com/AbZqFnR.jpg" alt="Feature image">
                        </div>
                    </div>



                </div>

                <div class="text-center">
                    <a href="#!" class="dark-link">Load more activity</a>
                </div>


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