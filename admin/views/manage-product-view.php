<?php
    $obj_admin= new admin();
    $productInfo = $obj_admin -> display_product();
    if(isset($_GET['pstatus'])){
        $pid= $_GET['id'];
        if($_GET['pstatus']=='delete'){
            $msg= $obj_admin -> deleteProduct($pid);
        }
    }

?>
<h2>Manage Product</h2>
<?php 
    if(isset($msg)){
        echo $msg;
    }
?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Status</th>
            <th>Update / Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php while($product = mysqli_fetch_assoc($productInfo)){

         ?>
        <tr>
            <td><?php echo $product['product_id']; ?></td>
            <td><?php echo $product['pd_name']; ?></td>
            <td><?php echo $product['pd_price']; ?></td>
            <td><?php echo $product['pd_desc']; ?></td>
            <td><img style="height: 50px;" src="upload/<?php echo $product['pd_img']; ?>" alt=""></td>
            <td><?php echo $product['ctg_name'];?></td>
            <td><?php 
                if($product['pd_status']==1){
                    echo "Published";
                }else{
                    echo "Unpublished";
                }
            ?></td>
            <td> 
                <a href="edit_product.php?pstatus=edit&&id=<?php echo $product['product_id']; ?>">Edit</a>
            <br>
            <a href="?pstatus=delete&&id=<?php echo $product['product_id']; ?>">Delete</a></td> 
        </tr>
        <?php } ?>
    </tbody>


</table>