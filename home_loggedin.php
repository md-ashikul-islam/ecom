<?php 
    include('admin/class/admin.php');
    session_start();
    $userName=$_SESSION['username'];
    $userMail=$_SESSION['userEmail'];
    if($userName==null){
        header('location:index.php');
    }
    $obj = new admin();
    $ctg = $obj -> p_displayCategory();
    $ctgDatas= array();
    while($data=mysqli_fetch_assoc($ctg)){
        $ctgDatas[]=$data;
    }
?>

<?php include_once("includes/head.php"); ?>
<body class="cholokini-body">

    <?php include_once("includes/preloader.php"); ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-04">
    <!-- Header Top -->
    <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>cholokini@gmail.com</a></li>
                        <li><a href="#">Free Shipping for all Order above 1000 tk</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">                       
                    <ul class="horizontal-menu">                       
                        <li><a href="user_profile.php" class="login-link"><i class="biolife-icon icon-login"></i><?php echo $userName ?></a></li>
                    </ul>
                    </ul>
                </div>
            </div>
        </div>

    <!-- Header Middle -->
    <?php include_once("includes/headermiddle.php"); ?>
    </header>
    
    <!-- searchbar -->
    <?php include_once("includes/searchbar.php"); ?>
    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Vertical Menu And Main Slide-->
            <?php include_once('includes/verticalmenu.php'); ?>

            <?php include_once('includes/slider.php'); ?>

            <!--Block 02: Banners-->
            <?php include_once("includes/block1.php"); ?>

            <!--Block 03: Categories-->
            
            <?php include_once("includes/categories.php"); ?>

            <!--Block 04: Product Tab-->
            
            <?php include_once("includes/product_tab.php"); ?>

            <!--Block 05: Banner Promotion-->
            
            <?php include_once("includes/specialdiscount.php"); ?>

            <!--Block 06: Advance Box-->
            <?php include_once("includes/advancedbox.php"); ?> 

            <!--Block 08: Products-->
            <?php include_once("includes/products.php"); ?> 
            
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