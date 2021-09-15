<?php 
    include('admin/class/admin.php');
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
    <?php include_once("includes/headertop.php"); ?>
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
            

            <!--Block 03: Categories-->
            
            <?php include_once("includes/categories.php"); ?>

            <!--Block 04: Product Tab-->
            
            <?php include_once("includes/product_tab.php"); ?>

            <!--Block 05: Banner Promotion-->
            
            <?php include_once("includes/specialdiscount.php"); ?>

            <!--Block 06: Advance Box-->
            <?php include_once("includes/advancedbox.php"); ?> 
            
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