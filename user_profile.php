<?php
session_start();
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
$userid = $_SESSION['id'];
$userName = $_SESSION['username'];
if($userName == null){
    header("location: user_login.php");
}
if(isset($_GET['logoutuser'])){
    if($_GET['logoutuser']='logout'){
        $obj->user_logout();
    }
}

?>

<?php include_once("includes/head.php"); ?>

<body class="cholokini-body">

    <?php include_once("includes/preloader.php"); ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-04">
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
        <?php include_once("includes/headermiddle.php"); ?>
    </header>


    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div class="container">
            <h2>User Profile</h2>
            <div class="user_info">
                <div class="user_details">
                    <h3>Hello <?php if(isset($userName)){echo strtoupper($userName);} ?>!</h3>                  
                    <a href="?logoutuser=logout">Logout</a>             
                </div>
                <br>
                <div class="history">
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Order History</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Total Paid</th>
                                        <th class="product-subtotal">Order Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="assets/images/shippingcart/pr-01.jpg" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#">National Fresh Fruit</a>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            Pending
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
        <div class="header-text-content text-center">
            <div class="header-text wow bounceIn" data-wow-delay="0.6s">Welcome to <span>Biolife HTML</span></div>
            <div class="header-text-2 wow fadeInUp" data-wow-delay="0.6s">The best templates for ecommerce websites!</div>
            <a target="_blank" href="https://1.envato.market/qvr1O" class="btn-header purchase">Purchase</a>
            <a href="#section-demo" class="btn-header">View Demos</a>
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