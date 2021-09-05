<?php 
    $obj_admin = new admin();
    $ctg_info = $obj_admin -> displayCategory();
    if(isset($_GET['pstatus'])){
        $id = $_GET['id'];
        if($_GET['pstatus']=='edit'){
           $pd_info = $obj_admin -> getEditProduct_info($id);
        }
    }
    if(isset($_POST['u_pd_btn'])){
        $updatemsg=$obj_admin -> updateProduct($_POST);
    }

?>

<h2>Update Product</h2>
<?php 
    if(isset($updatemsg)){
        echo $updatemsg;
    }
?>
<form action="" class="form" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <input hidden type="text" name="u_pd_id" class="form-control" value="<?php echo $pd_info['product_id'];?>">
    </div>
    <div class="form-group">
        <label for="u_pd_name">Product Name</label>
        <input type="text" name="u_pd_name" class="form-control" value="<?php echo $pd_info['pd_name']; ?>">
    </div>
    <div class="form-group">
        <label for="u_d_price">Product Price</label>
        <input type="number" name="u_pd_price" class="form-control" value="<?php echo $pd_info['pd_price']; ?>">
    </div>
    <div class="form-group">
        <label for="u_pd_desc">Product Description</label>
        <input type="text" class="form-control" name="u_pd_desc" value="<?php echo $pd_info['pd_desc']; ?>">
    </div>
    <div class="form-group">
        <label for="u_pd_ctg">Product Category</label>
        <select name="u_pd_ctg" class="form-control">
            <option>Please Select a category</option>
            <?php
                while($ctg= mysqli_fetch_assoc($ctg_info)){

                
            ?>
            <option value="<?php echo $ctg['ctg_id']; ?>"><?php echo $ctg['ctg_name'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="u_pd_image">Product Image</label>
        <input type="file" name="u_pd_image" class="form-control">
    </div>
    <div class="form-group">
        <label for="u_pd_staus">Product Status</label>
        <select name="u_pd_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input name="u_pd_btn" type="submit" value="Update Product" class="btn btn-primary btn-block">
</form>