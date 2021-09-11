<?php
session_start();
include('admin/class/admin.php');
$obj = new admin();
$ctg = $obj->p_displayCategory();
$ctgDatas = array();
while ($data = mysqli_fetch_assoc($ctg)) {
    $ctgDatas[] = $data;
}

if(isset($_POST['addtocart'])){
    if(isset($_SESSION['cart'])){
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count]=array(
            'pd_name' =>$_POST['pd_name'],
            'pd_price' =>$_POST['pd_price'],
            'pd_img' =>$_POST['pd_img'],
            'quantity'=>1,);

    } else{
        $_SESSION['cart'][0]=array(
        'pd_name' =>$_POST['pd_name'],
        'pd_price' =>$_POST['pd_price'],
        'pd_img' =>$_POST['pd_img'],
        'quantity'=>1,

        );
        print_r($_SESSION['cart']);
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
            <div class="container">
                <!--Cart Table-->
                <br>
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product Name</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img width="113" height="113" src="assets/images/shippingcart/pr-01.jpg" alt="shipping cart"></figure>
                                                </a>
                                                <a class="prd-name" href="#">National Fresh Fruit</a>
                                                <div class="action">
                                                    <a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a href="#" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity-box type1">
                                                    <div class="qty-input">
                                                        <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1" data-step="1">
                                                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(2ittems)</span></b>
                                    <span class="stt-price">£170.00</span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                                <div class="tax-fee">
                                    <p class="title">Est. Taxes & Fees</p>
                                    <p class="desc">Based on 56789</p>
                                </div>
                                <div class="btn-checkout">
                                    <a href="#" class="btn checkout">Check out</a>
                                </div>
                                <div class="biolife-progress-bar">
                                    <table>
                                        <tr>
                                            <td class="first-position">
                                                <span class="index">$0</span>
                                            </td>
                                            <td class="mid-position">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="last-position">
                                                <span class="index">$99</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
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
                                            <?php foreach ($pros as $pro) {  ?>
                                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                    <div class="contain-product layout-default">
                                                        <div class="product-thumb">
                                                            <a href="soloProduct.php?status=soloproduct&&id=<?php echo $pro['product_id'] ?>" class="link-to-product">
                                                                <img src="admin/upload/<?php echo $pro['pd_img'] ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                            </a>
                                                        </div>
                                                        <div class="info">
                                                            <b class="categories"><?php echo $pro['pd_name'] ?></b>
                                                            <h4 class="product-title"><a href="soloProduct.php?status=soloproduct&&id=<?php echo $pro['product_id'] ?>" class="pr-name"><?php echo $pro['pd_name'] ?></a></h4>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol">৳</span><?php echo $pro['pd_price'] ?></span></ins>
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
                                                                    <a href="soloProduct.php?status=soloproduct&&id=<?php echo $pro['product_id'] ?>" class="btn compare-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
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