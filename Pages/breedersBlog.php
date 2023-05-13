<!DOCTYPE html>
<html lang="en">


<head>
    <?php include("../Includes/head.inc.php")
    ?>
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
        .purpose:hover{
            color:#0081c9;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <?php 
        include("../Includes/header.inc.php"); 
        if(!isset($_SESSION['id'])){
            echo"
                <script>
                    alert('Invalid Request! Login First');
                    window.location.href = 'index.php';
                </script>
            ";
        }
        $id = $_SESSION['id'];
       
       
        ?>
        
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('../assets/images/fish2.jpg')">
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
                         ?>
                        <article class="entry entry-list">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <figure class="entry-media">
                                        <a>
                                            <img src="../img/<?php echo $post['image']?>" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->
                                </div><!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <div class="entry-body">
                                        <div class="entry-meta">
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
                                            <?php
                                            if($id == $user["user_id"]){
                                                ?>
                                                <div class="dropdown">
                                                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:0;background-color:#fff;margin-left:465px;">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a href="#modal-editpost<?php echo $post['id']?>" class="dropdown-item" data-toggle="modal">Edit</a>
                                                        <a href="#deleteModal<?php echo $post['id']?>"  class="dropdown-item" data-toggle="modal">DELETE</a>
                                                    </div>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="dropdown">
                                                    <button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:0;background-color:#fff;margin-left:726px;">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a href="../Pages/chat.php?user=<?php echo $post['id']?>" class="dropdown-item">Chat Author</a>
                                                    </div>
                                                </div>


                                            <?php } ?>
                                            
                                        </div><!-- End .entry-meta -->

                                        <h2 class="entry-title mb-2">
                                            <h3 class="purpose"><?php echo $post['purpose']?></h3>
                                        </h2><!-- End .entry-title -->
                                        <div class="entry-content">
                                            <p class="mb-3"><?php echo $user1['description']?> ... </p>
                                            <a href="../Pages/comment.php?breedersblog_id=<?php echo $post['id']?>" class="read-more">View more details</a>
                                        <?php
                                        if($id != $user["user_id"]):
                                            ?>
                                            <a href="" data-toggle="modal" data-target="#modal-report"  class="read-more icon-font-awesome-flag text-danger float-right"> Report</a>
                                        <?php endif; ?>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-md-8 -->
                            </div><!-- End .row -->
                        </article><!-- End .entry -->
                        <!-- EDIT POST Modals -->
                        <div class="modal fade" id="modal-editpost<?php echo $post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="icon-close"></i></span>
                                        </button>
                                    </div>
                                    <form method="POST" action="../Controller/updateBreederController.php?blog_id=<?php echo $post['id']?>" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Purpose</label>
                                                <input type="purpose" class="form-control" name="purpose1" id="purpose" value="<?php echo $post['purpose']?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input class="form-control" name="description1" id="description" value="<?php echo $user1['description']?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Uploaded Image</label>
                                                <input class="form-control" type="input" name="img" value="<?php echo $post['image']?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Image</label>
                                                <input class="form-control" type="file" name="img1">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="editblog" id="postblog">EDIT POST</button>
                                        </div>
                                    </form>                                  
                                </div>
                            </div>
                        </div>
                        <!-- END OF EDIT POST -->
                        <div id="deleteModal<?php echo $post['id']?>" class="modal fade">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="../Pages/deleteBlog.php?id=<?php echo $post['id']?>" method="POST">
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this record?</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="No">
                                            <input type="submit" name="DELETE" class="btn btn-danger" value="Yes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    <!-- ADD POST Modals -->
    <div class="modal fade" id="modal-addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                </div>
                <form method="POST" action="../Controller/BreederController.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Purpose</label>
                            <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Enter your purpose">
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
