<?php
include('admin/class/admin.php');
$obj = new admin();
$ctg = $obj->p_displayCategory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}

if (isset($_POST['user_reg_btn'])) {
    $msg = $obj->user_registration($_POST);
}
?>

<?php include_once("includes/head.php"); ?>

<body class="cholokini-body">

    <?php include_once("includes/preloader.php"); ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-04">
        <?php include_once("includes/headertop.php"); ?>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="index.php" class="biolife-logo"><img src="assets/images/cholokini.png" alt="biolife logo"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-toggle">
            <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </header>


    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">
                <h2>User Registration</h2>
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="frm-register" method="post">
                                <p class="form-row">
                                    <label for="username">Username:<span class="requite">*</span></label>
                                    <input type="text" id="fid-uname" name="Username" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="Name">Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-uname" name="name" value="" class="txt-input">
                                </p>

                                <p class="form-row">
                                    <label for="useremail">Email:<span class="requite">*</span></label>
                                    <input type="email" id="fid-email" name="email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user_password">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="pass" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user-mobile">Phone no:<span class="requite">*</span></label>
                                    <input type="number" id="fid-phoneNo" name="number" value="" class="txt-input">
                                </p>
                                <input class="btn btn-submit btn-bold btn-block" value="Create an Account" type="submit" name="user_reg_btn">
                            </form>
                            <br>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Already have an account?</h4>
                                <p class="sub-title">Log in to access your profile:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                    <a href="user_login.php" class="btn btn-bold">Log in to your account</a>
                                </ul>
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