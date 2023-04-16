
<?php

$connect = new PDO('mysql:host=localhost;dbname=eaquaria', 'root', '');
$breedersblog_id = $_GET['breedersblog_id'];


$users =$connect->query("SELECT user_details.first_name, user_details.last_name,id description,image,date_created FROM user_details INNER JOIN breedersblog ON user_details.user_id = breedersblog.user_id WHERE breedersblog.id = $breedersblog_id");
$user = $users->fetch(PDO::FETCH_ASSOC);

$comment =$connect->query("SELECT * FROM `comment` WHERE breedersblog_id = $breedersblog_id");
$rowsComment = $comment->fetchAll();
$comment_count = count($rowsComment);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../Includes/head.inc.php") ?>
    <style>
        .page-content{
            padding-bottom:3rem!important;
        }
        @media screen and (max-width: 992px) {
            .page-content{
                margin-left:0!important;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <?php include("../Includes/header1.inc.php");?>
        
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('../img/Aquarium.jpg')">
        		<div class="container">
        			<h1 class="page-title" style="color:#fff;font-weight:700">View More Details<span style="color:#fff;">Single Post</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="../Pages/breedersblog.php">BreedersBlog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View More Details</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content" style="margin-left:20%;">
                <div class="container">
                	<div class="row">
                    <?php
                    
                    $allpost=$connect->query("SELECT * FROM `breedersblog` WHERE id = $breedersblog_id");
                    while($posts = $allpost->fetch(PDO::FETCH_ASSOC)):   
                        $users1 =$connect->query("SELECT * FROM user_details WHERE user_id = $session_id");
                        $user1 = $users1->fetch(PDO::FETCH_ASSOC);     
                        $dates = $connect->query("SELECT DATE_FORMAT(date_created, '%M %e %Y') AS date from breedersblog where id = $breedersblog_id");
                        $date = $dates->fetch(PDO::FETCH_ASSOC);  
                        $users5 =$connect->query("SELECT user_details.first_name as fname, user_details.last_name as lname FROM user_details where user_id = $session_id");
                        $user5 = $users5->fetch(PDO::FETCH_ASSOC);    
                        ?>
                		<div class="col-lg-8">
                            <article class="entry single-entry">
                                <figure class="entry-media">
                                    <img src="../img/<?php echo $posts['image']?>" alt="image desc" style="height:250px!important;">
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            <a href="#"><?php echo ucfirst($user['first_name']) .' '. ucfirst($user['last_name'])?></a>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a href="#"><?php echo $date['date']?></a>
                                        <span class="meta-separator">|</span>
                                <?php
                                if($comment_count <= 1):
                                    ?>
                                    <a href="#"><?php echo $comment_count ?> Comment</a>
                                     <?php else: ?>
                                    <a href="#"><?php echo $comment_count ?> Comments</a>
                                <?php endif; ?>
                                        
                                    </div>
                                    <h2 class="entry-title"><?php echo $posts['purpose']?></h2>
                                    <div class="entry-content editor-content">
                                        <p><?php echo $posts['description']?></p>
                                    </div>
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                    <?php endwhile; ?>
                            
                            <div class="comments">
                                <?php
                                if($comment_count <= 1):
                                    ?>
                                    <h3 class="title"><?php echo $comment_count; ?> Comment</h3>
                                <?php else: ?>
                                    <h3 class="title"><?php echo $comment_count; ?> Comments</h3>
                                <?php endif; ?>
                                
                                       
                                <ul>
                                    <span id="display_comment"></span>
                                </ul>
                            </div><!-- End .comments -->




                            <div class="reply">
                                <div class="heading">
                                    <h3 class="title">Leave A Comment</h3><!-- End .title -->
                                </div>

                                <form method="POST" id="comment_form">
                                    <label for="reply-message" class="sr-only">Comment</label>
                                    <textarea name="comment_content" id="comment_content" class="form-control" required placeholder="Comment *"></textarea>
                                    <input type="hidden" name="breedersblog_id" id="breedersblog_id" class="form-control" value="<?php echo $breedersblog_id ?>"/>
                                    <input type="hidden" name="comment_name" id="comment_name" class="form-control" value="<?php echo ucfirst($user5['fname']) .' '. ucfirst($user5['lname'])?>"/>
                                    <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                    <button type="submit" class="btn btn-outline-primary-2" name="submit" id="submit">
                                        <span>POST COMMENT</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                                <span id="comment_message"></span>
                            </div><!-- End .reply -->
                		</div><!-- End .col-lg-9 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php include("../Includes/footer1.inc.php"); ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.hoverIntent.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
    <script src="../assets/js/superfish.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
         
<script>
    $(document).ready(function(){
        
        var breedersblog_id = '<?php echo $_GET['breedersblog_id'] ?>';


        $('#comment_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"../Controller/addCommentController.php",
                method:"POST",
                data:form_data,
                dataType:"JSON",
                success:function(data){
                    if(data.error != ''){
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment()
                    }
                }
            })
        });
        load_comment()
        
        function load_comment(){
        $.ajax({
            url:"../Controller/fetchCommentController.php?id="+breedersblog_id,
            method:"POST",
            success:function(data){
                 $('#display_comment').html(data);
            }
        })
        }

        $(document).on('click', '.comment-reply', function(){
        var comment_id = $(this).attr("id");
        $('#comment_id').val(comment_id);
        $('#comment_content').focus();
        });

        setInterval(load_comment, 1000);
    });
</script>
</body>
</html>