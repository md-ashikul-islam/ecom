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
        $pdName=array_column($_SESSION['cart'],'pd_name');
        if(in_array($_POST['pd_name'],$pdName)){
            echo "<script> alert('This product is already in your cart') </script>";
        }else{
            $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count]=array(
            'pd_name' =>$_POST['pd_name'],
            'pd_price' =>$_POST['pd_price'],
            'pd_img' =>$_POST['pd_img'],
            'quantity'=>1,);
    }
        }
         else{
        $_SESSION['cart'][0]=array(
        'pd_name' =>$_POST['pd_name'],
        'pd_price' =>$_POST['pd_price'],
        'pd_img' =>$_POST['pd_img'],
        'quantity'=>1,
        );
    }
}

if(isset($_POST['removeItemName'])){
    foreach($_SESSION['cart'] as $key=>$value){
        if($value['pd_name']=$_POST['removeItemName']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
        }
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
                                            <th class="product-quantity">Remove</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       if(isset($_SESSION['cart'])){
                                           $subtotal=0;
                                           $totalProduct=0;
                                        foreach($_SESSION['cart'] as $key=>$value){
                                            $subtotal = $subtotal+ $value['pd_price'];
                                            $totalProduct++;
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img width="113" height="113" src="admin/upload/<?php echo $value['pd_img']?>" alt="shipping cart"></figure>
                                                </a>
                                                <a class="prd-name" href="#"><?php echo $value['pd_name']?></a>                                   
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol">৳</span><?php echo $value['pd_price']?></span></ins>
                                                </div>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <form action="" method="POST">
                                                    <input type="hidden" value="<?php echo $value['pd_name']?>" name="removeItemName">
                                                    <input class="btn btn-warning" type="submit" value="Remove Item" name="removeItem">
                                                </form>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }}else{
                                            echo "Your cart is now empty!";
                                        } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(<?php echo $totalProduct.' items'; ?>)</span></b>
                                    <span class="stt-price"><?php echo $subtotal; ?></span>
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