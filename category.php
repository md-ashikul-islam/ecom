<?php
include('admin/class/admin.php');
$obj = new admin();
$ctg = $obj->p_displayCategory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}
if(isset($_GET['status'])){
    $catID= $_GET['id'];
    if($_GET['status']=='catView'){
        $pdByCtg = $obj -> product_by_ctg($catID);
        $pros = array();
        while($pd_Datas = mysqli_fetch_assoc($pdByCtg)){
            $pros[]= $pd_Datas; 
        }            
    }
}
if(isset($_GET['status'])){
    $catID= $_GET['id'];
    if($_GET['status']=='catView'){
        $category_name = $obj -> ctg_by_id($catID);             
    }
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

            <!--Hero Section-->
            <div class="hero-section hero-background">
                <h1 class="page-title"><?php 
                echo $category_name['ctg_name'];
                ?></h1>
            </div>

            <!--Navigation section-->
            <div class="container">
                <nav class="biolife-nav">
                    <ul>
                        <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                        <li class="nav-item"><span class="current-page">
                        <?php  echo $category_name['ctg_name']; ?>
                        </span></li>
                    </ul>
                </nav>
            </div>
            <div class="container">
                <div class="page-contain category-page no-sidebar">
                    <div class="container">
                        <div class="row">

                            <!-- Main content -->
                            <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-category grid-style">
                                    <div class="row">
                                        <ul class="products-list">
                                        <?php  foreach($pros as $pro){  ?>
                                            <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                <div class="contain-product layout-default">
                                                    <div class="product-thumb">
                                                        <a href="soloProduct.php?status=soloproduct&&id=<?php echo $pro['product_id']?>" class="link-to-product">
                                                            <img src="admin/upload/<?php echo $pro['pd_img']?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <b class="categories"><?php echo $pro['pd_name']?></b>
                                                        <h4 class="product-title"><a href="soloProduct.php?status=soloproduct&&id=<?php echo $pro['product_id']?>" class="pr-name"><?php echo $pro['pd_name']?></a></h4>
                                                        <div class="price">
                                                            <ins><span class="price-amount"><span class="currencySymbol">৳</span><?php echo $pro['pd_price']?></span></ins>
                                                        </div>
                                                        <div class="shipping-info">
                                                            <p class="shipping-day">1-Day Shipping</p>
                                                            <p class="for-today">Free Pickup Today</p>
                                                        </div>
                                                        <div class="slide-down-box">
                                                            <p class="message">All products are carefully selected to ensure food safety.</p>
                                                            <div class="buttons">
                                                                <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                                <a href="soloProduct.php?status=soloproduct&&id=<?php echo $pro['product_id']?>" class="btn compare-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="biolife-panigations-block">
                                        <ul class="panigation-contain">
                                            <li><span class="current-page">1</span></li>
                                            <li><a href="#" class="link-page">2</a></li>
                                            <li><a href="#" class="link-page">3</a></li>
                                            <li><span class="sep">....</span></li>
                                            <li><a href="#" class="link-page">20</a></li>
                                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>

                                </div>

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