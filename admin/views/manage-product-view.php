<?php
    $obj_admin= new admin();
    $productInfo = $obj_admin -> display_product();


?>
<h2>Manage Product</h2>
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
            <td><?php echo $product['pd_status']; ?></td>
            <td>Update / Delete</td>
        </tr>
        <?php } ?>
    </tbody>


</table>