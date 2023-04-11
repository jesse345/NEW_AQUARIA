<!DOCTYPE html>
<html lang="en">


<!-- molla/elements-blog-posts.html  22 Nov 2019 10:05:18 GMT -->
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
        	<div class="page-header text-center" style="background-image: url('../img/Aquarium.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:#fff;font-weight:700">Breeders Blog<span style="color:#fff;">Find Co Breeders</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BreedersBlog</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <?php 
            if(isset($_SESSION['id'])):
                 ?>
                <div class="clearfix" style="margin-right:55px;">
                    <a href="#modal-addpost" class="btn btn-primary mb-2 float-right"  data-toggle="modal"><i class="fas fa-plus" style='font-size:15px'></i> Add Post</a>
                </div>
            <?php endif; ?>
            <div class="page-content">
                <div class="container">
                    <?php

                    $allpost = getAllPost('breedersblog');
                    while($post = mysqli_fetch_assoc($allpost)):
                        $user = mysqli_fetch_assoc(getUser('user_details', 'user_id', $post['user_id']));
                        $user1 = mysqli_fetch_assoc(getBreeders('breedersblog', $post['id']));
                        $user3 = mysqli_fetch_assoc(getCommentCount('comment', $post['id']));
                        $user2 = mysqli_fetch_assoc(forEditnDelete('breedersblog',$post['user_id']));
                        $user4 = implode(" ",$user2);

                       
                        
                         ?>
                        <article class="entry entry-list">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <figure class="entry-media">
                                        <a href="single.html">
                                            <img src="../img/<?php echo $post['image']?>" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->
                                </div><!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <div class="entry-body">
                                        <div class="entry-meta">
                                            <?php
                                            if($user4):
                                                ?>
                                                <a href="#" class="comment-reply;">Edit1</a>
                                            <?php else: ?>
                                                <a href="#" class="display:none;" id="'.$row['comment_id'].'">Edit2</a>
                                            <?php endif; ?>  
                                            <span class="entry-author">
                                                by <a href="#"><?php echo ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])?></a>
                                            </span>
                                            <span class="meta-separator">|</span>
                                            <a href="#">
                                                <?php echo $user1['date']?></a>
                                            <span class="meta-separator">|</span>
                                           <?php
                                           if ($user3['commentCount'] <= 1):
                                                ?>
                                                <a href="#"><?php echo $user3['commentCount']?> Comment</a>
                                            <?php else: ?>
                                                <a href="#"><?php echo $user3['commentCount']?> Comments</a>
                                            <?php endif; ?>

                                        </div><!-- End .entry-meta -->

                                        <h2 class="entry-title mb-2">
                                            <a href="single.html"><?php echo $post['purpose']?></a>
                                        </h2><!-- End .entry-title -->
                                        <div class="entry-content">
                                            <p class="mb-3"><?php echo $user1['description']?> ... </p>
                                            <a href="../Pages/comment.php?breedersblog_id=<?php echo $post['id']?>" class="read-more">View more details</a>
                                            <a href="" data-toggle="modal" data-target="#modal-report"  class="read-more icon-font-awesome-flag text-danger float-right"> Report</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-md-8 -->
                            </div><!-- End .row -->
                        </article><!-- End .entry -->
                    <?php endwhile;?>
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

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="modal-report">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select a Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="report_type" style="width:100%; padding: 3%;">
                                <option value="Reason1">Prohibited Items/Products</option>
                                <option value="Reason2">Offensive or Potential Offensive Items </option>
                                <option value="Reason3">Illegam Items/Products </option>
                                <option value="Reason4">Critically Extinct Species </option>
                                <option value="Reason5">Unrelated Items/Products </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="report" class="btn btn-danger">Send Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End .modal -->

    <!-- Modals Files -->
    <!-- The Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" modal-dialog-centered" role="document >
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <!--End of modal -->
    <div class="modal fade" id="modal-addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                        <form method="POST" action="../Controller/BreederController.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Purpose</label>
                                <input type="purpose" class="form-control" name="purpose" id="purpose" placeholder="Enter your purpose">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter description" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input class="form-control" type="file" name="img" id="img">
                            </div>
                    

                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="postblog" id="postblog">POST</button>
                            </div>
                        </form>                                  
            </div>
        </div>
    </div>







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
