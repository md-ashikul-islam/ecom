<?php
    $obj_admin=new admin();
    $ctg_info = $obj_admin -> displayCategory();
    if(isset($_POST['pd_btn'])){
        $returned_msg=$obj_admin -> add_product($_POST);
    }
    
?>

<h2>Add Product</h2>
<?php
    if(isset($returned_msg)){
        echo $returned_msg;
    }
?>
<form action="" class="form" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pd_name">Product Name</label>
        <input type="text" name="pd_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="pd_price">Product Price</label>
        <input type="number" name="pd_price" class="form-control">
    </div>
    <div class="form-group">
        <label for="pd_desc">Product Description</label>
        <textarea class="form-control" name="pd_desc" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="pd_ctg">Product Category</label>
        <select name="pd_ctg" class="form-control">
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
        <label for="pd_image">Product Image</label>
        <input type="file" name="pd_image" class="form-control">
    </div>
    <div class="form-group">
        <label for="pd_staus">Product Status</label>
        <select name="pd_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input name="pd_btn" type="submit" value="Add Product" class="btn btn-primary btn-block">
</form>