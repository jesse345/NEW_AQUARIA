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
                                <form id="loginForm">
                                    <div class="username">
                                        <label for="singin-email">Username or email address</label>
                                        <input type="text" class="form-control" id="usermae" name="username" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required />
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" id="login" name="login" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember" />
                                            <label class="custom-control-label" for="signin-remember">Remember
                                                Me</label>
                                        </div>
                                        <!-- End .custom-checkbox -->

                                        <!-- <a href="#" class="forgot-link">Forgot Your Password?</a> -->
                                    </div>
                                    <!-- End .form-footer -->
                                </form>
                            </div>

                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form id="registrationForm">
                                    <div class="form-group">
                                        <label for="username">Username<span class="text-danger"> <i id="un-err"></i> </span> </label>
                                        <input type="text" class="form-control" name="reg_username" id="reg_username" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="email_address">Your email address<span class="text-danger"> <i id="em-err"></i> </span></label>
                                        <input type="email" class="form-control" name="email_address" id="email_address" required />
                                    </div>


                                    <div class="form-group">
                                        <label for="password">Password<span class="text-danger"> <i id="pw-err"></i> </span></label>
                                        <input type="password" class="form-control" name="reg_password" id="reg_password" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm">Confirm Password</label>
                                        <input type="password" class="form-control" name="reg_confirm" id="reg_confirm" required />
                                    </div>


                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2 submit" name="register" id="register-button">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="btn bg-primary text-white loading" id="loading" disabled>
                                            <div class="spinner-border text-white mr-2" role="status">
                                            </div>
                                            <span>Loading ...</span>
                                        </div>





                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required />
                                            <label class="custom-control-label" for="register-policy">I agree to the
                                                <a href="../Pages/privacy.php" target="_blank">Privacy Policy</a>



                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../JS/loginModalScript.js">

</script>