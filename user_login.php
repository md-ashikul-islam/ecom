<?php
include('admin/class/admin.php');
$obj = new admin();
$ctg = $obj->p_displayCategory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}

if(isset($_POST['user_login_btn'])){
    $errmsg= $obj -> user_login($_POST);
}

?>

<?php include_once("includes/head.php"); ?>

<body class="cholokini-body">

    <?php include_once("includes/preloader.php"); ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-04">
        <?php include_once("includes/headertop.php"); ?>
        <?php include_once("includes/headermiddle.php"); ?>
    </header>


    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <?php 
                if(isset($errmsg)){
                    echo $errmsg;
                }
                ?>
            <h2>Login Now</h2>
                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="user_name">Username:<span class="requite">*</span></label>
                                    <input type="text" id="fid-username" name="username" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user_pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="user_pass" value="" class="txt-input">
                                </p>
                                <br>
                                <input name="user_login_btn" value="Login" class="btn btn-submit btn-bold" style="padding: 15px 30px;" type="submit">
                                    <a href="user_pass_recovery.php" class="link-to-help">Forgot your password</a>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="user_registration.php" class="btn btn-bold">Create an account</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <?php include_once("includes/footer.php"); ?>

    <!--Footer For Mobile-->
    <?php include_once("includes/footerforMobile.php"); ?>

    <?php include_once("includes/mobileGlobal.php"); ?>

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php include_once("includes/scripts.php"); ?>
</body>

</html>