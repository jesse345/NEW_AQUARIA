
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../Includes/head.inc.php") ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
<?php 
        include("../Includes/header.inc.php"); 
        $id = $_SESSION['id'];
        ?>
        <div class="page-wrapper">
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
                	<div class="row">
                    <?php
                    $get = getManual('fish_manual',$_GET['manual_id']);
                    while($manual = mysqli_fetch_assoc($get)):
                        ?>
                		<div class="col-lg-12">
                            <article class="entry single-entry">
                                <figure class="entry-media">
                                    <img src="../admin/img/<?php echo $manual['manual_img']?>">
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">

                                    <h2 class="entry-title mb-5">
                                        <?php echo $manual['title']?>
                                    </h2><!-- End .entry-title -->
                                    
                                    <div class="entry-content editor-content">
                                        <?php echo $manual['description']?>
                                    </div>

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">
                                    </div><!-- End .entry-footer row no-gutters -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->

                            <nav class="pager-nav" aria-label="Page navigation">
                                <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                                    Previous Post
                                    <span class="pager-link-title">Cras iaculis ultricies nulla</span>
                                </a>

                                <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                                    Next Post
                                    <span class="pager-link-title">Praesent placerat risus</span>
                                </a>
                            </nav><!-- End .pager-nav -->
                		</div><!-- End .col-lg-9 -->
                    <?php endwhile; ?>
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
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