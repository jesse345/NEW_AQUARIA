<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/head.inc.php") ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <style>
        .breadcrumb-nav{
            margin-bottom:0rem!important;
        }
        .form-group{
            margin-top:2rem;
            margin-left:5rem;
            margin-right:5rem;
        }
        .comment-reply{
            display:flex;
            align-items:center;
            position:absolute;
            right:0;
            top:0;
            
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <?php 
        include("../Includes/header.inc.php"); 
        $id = $_SESSION['id'];
        ?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('../img/aq1.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:#fff;font-weight:700">E-Aquaria Fish Manual<span style="color:#fff;">Your Ultimate Bible for Fish Keeping</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fish Manual</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-content">
                <div class="container">
                    <?php
                         ?>
                        <article class="entry entry-list">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <figure class="entry-media">
                                        <a href="single.html">
                                            <img src="../assets/images/fishmanual/bettafish.jpg" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->
                                </div><!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <div class="entry-body">
                                        
                                        <h2 class="entry-title mb-2">
                                            <a href="">BENEFITS OF BEING AN ORNAMENTAL FISH HOBBYIST</a>
                                        </h2><!-- End .entry-title -->
                                        <div class="entry-content">
                                            <p class="mb-3">Benefits of Keeping Ornamental Fishes at Home</p>
                                            <a href="fishManualContent.php" class="read-more">View more details</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-md-8 -->
                            </div><!-- End .row -->
                        </article><!-- End .entry -->

                        <article class="entry entry-list">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <figure class="entry-media">
                                        <a href="single.html">
                                            <img src="../assets/images/fishmanual/angelfish.jpg" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->
                                </div><!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <div class="entry-body">
                                        
                                        <h2 class="entry-title mb-2">
                                            <a href="">TIPS AND TRICKS IN CHOOSING YOUR FIRST ORNAMENTAL FISH</a>
                                        </h2><!-- End .entry-title -->
                                        <div class="entry-content">
                                            <p class="mb-3">Newbie Ornamental Fish Hobbyists - Compatability Chart Ultimate Guide</p>
                                            <a href="fishManualContent.php" class="read-more">View more details</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-md-8 -->
                            </div><!-- End .row -->
                        </article><!-- End .entry -->

                        <article class="entry entry-list">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <figure class="entry-media">
                                        <a href="single.html">
                                            <img src="../assets/images/fishmanual/colorenhancer.jpg" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->
                                </div><!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <div class="entry-body">
                                        
                                        <h2 class="entry-title mb-2">
                                            <a href="">SIMPLE GUIDE ON HOW TO GROOM YOUR FLOWERHORN</a>
                                        </h2><!-- End .entry-title -->
                                        <div class="entry-content">
                                            <p class="mb-3"> Flowerhorn Grooming - The Ultimate Guide </p>
                                            <a href="fishManualContent.php" class="read-more">View more details</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-md-8 -->
                            </div><!-- End .row -->
                        </article><!-- End .entry -->
    
                	<hr class="mb-5">
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php include("../Includes/footer1.inc.php"); ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
   
            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->
    
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>