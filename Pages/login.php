<!DOCTYPE html>
<html lang="en">


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->
<head>
    <?php include("../includes/head.inc.php"); ?>
</head>

<body>
    <div class="page-wrapper">
    <?php 
        include("../includes/header.inc.php");
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (mysqli_num_rows(login($username, $password)) > 0) {
                $auth = mysqli_fetch_assoc(login($username, $password));
              
                if ($auth['isVerified'] == "Yes") {
                    $_SESSION['id'] = $auth['id'];
                    $check = getUser('user_details', 'user_id', $_SESSION['id']);
                    if (mysqli_num_rows($check) > 0) {
                        echo "<script>
                                window.location.href = 'index.php'
                            </script>";
                    } else {
                        echo "incomplete";
                    }
                } else {
                    echo "notVerified";
                }
            } else {
                echo "error";
            }
        }
    ?>


        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
							    	<form action="login.php" method="POST">
							    		<div class="form-group">
							    			<label for="username">Username or email address</label>
							    			<input type="text" class="form-control" id="username" name="username" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="password">Password</label>
							    			<input type="password" class="form-control" id="password" name="password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" name="submit" class="btn btn-outline-primary-2">
			                					<span>LOG IN</span>
			            						<i class="icon-long-arrow-right"></i>
                                            </button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="signin-remember-2">
												<label class="custom-control-label" for="signin-remember-2">Remember Me</label>
											</div><!-- End .custom-checkbox -->

							    		</div><!-- End .form-footer -->
							    	</form>
							    	
							    </div><!-- .End .tab-pane -->
							    <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
							    	<form action="#">
							    		<div class="form-group">
							    			<label for="register-email-2">Your email address</label>
							    			<input type="email" class="form-control" id="register-email-2" name="register-email" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="register-password-2">Password </label>
							    			<input type="password" class="form-control" id="register-password-2" name="register-password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SIGN UP</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy-2" required>
												<label class="custom-control-label" for="register-policy-2">I agree to the <a href="privacy.php">privacy policy</a></label>
											</div><!-- End .custom-checkbox -->
							    		</div><!-- End .form-footer -->
							    	</form>
							    	
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

        <?php 
        include("../includes/footer.inc.php");
    ?>
    </div><!-- End .page-wrapper -->
    <?php
    include("../Layouts/mobileMenu.layout.php");
    include("../Layouts/loginModal.layout.php");
    include("../Layouts/scripts.layout.php")
        ?>

</body>

</html>