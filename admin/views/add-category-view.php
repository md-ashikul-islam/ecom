<?php
    $obj_admin = new admin();
    if(isset($_POST['ctg-btn'])){
        $return_msg= $obj_admin -> addCategory($_POST); 
    }
?>

<h1>Add Category</h1><br>
<form action="" method="post">
    <div class="form-group">
        <label for="ctg_name">Category Name</label>
        <input type="text" name="ctg_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="ctg_desc">Category Description</label>
        <input type="text" name="ctg_desc" class="form-control">
    </div>
    <div class="form-group">
        <label for="ctg_staus">Category Status</label>
        <select name="ctg_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input type="submit" value="Add Category" name="ctg-btn" class="btn btn-primary">
    <br>
    <?php
        if(isset($return_msg)){
            echo $return_msg;
        }
    ?>
</form>