<?php 
    include("admin/class/admin.php");
    $obj_admin = new admin();
    $ctg=$obj_admin -> p_displayCategory();
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
            <?php include_once("includes/verticalmenu.php"); ?>

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