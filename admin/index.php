<?php 
    include("class/admin.php");

    $obj_admin = new admin();
    if(isset($_POST['admin_btn'])){
        $obj_admin ->admin_login($_POST);
    }
    session_start ();
    if(isset($_SESSION['uname'])){
    header('location:dashboard.php');
    }
?>


<?php

include("includes/header.php");

?>

<body>

    <body>
        <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
            <!-- Container-fluid starts -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Authentication card start -->
                        <div class="login-card card-block auth-body mr-auto ml-auto">
                            <form action="" method ="post" class="md-float-material">
                                <div class="text-center">
                                    <img src="assets/images/logo.png" alt="logo.png">
                                </div>
                                <div class="auth-box">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-left txt-primary">Sign In</h3>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="input-group">
                                        <input name="admin_uname" type="username" class="form-control" placeholder="Your Username">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input name="admin_pass" type="password" class="form-control" placeholder="Password">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-sm-7 col-xs-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                            <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <input type="submit" value="Login" name="admin_btn"class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                            <p class="text-inverse text-left"><b>Team Mudi Dokan</b></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!-- end of form -->
                        </div>
                        <!-- Authentication card end -->
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
        </section>
        <?php include("includes/footer.php"); ?>