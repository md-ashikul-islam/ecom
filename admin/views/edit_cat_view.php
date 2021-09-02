<?php
    $obj_admin= new admin();
    if (isset($_GET['status'])){
        $get_id= $_GET['id'];
        if($_GET['status']=='edit'){
            $returned_data = $obj_admin -> getcatinfo_toupdate($get_id);
        }
    }

    if (isset($_POST['u_ctg_btn'])){ 
        $returned_msg = $obj_admin -> update_category($_POST);    
    }
?>

<form action="" method="POST">
    <?php
    if (isset($returned_msg)){
        echo $returned_msg;
    }  
    ?>
<div class="form-group">
        <input hidden type="text" name="update_ctg_id" class="form-control" value="<?php echo $returned_data['ctg_id'];?>">
    </div>
<div class="form-group">
        <label for="update_ctg_name">Category Name</label>
        <input type="text" name="update_ctg_name" class="form-control" value="<?php echo $returned_data['ctg_name'];?>">
    </div>
    <div class="form-group">
        <label for="update_ctg_desc">Category Description</label>
        <input type="text" name="update_ctg_desc" class="form-control" value="<?php echo $returned_data['ctg_desc'];?>">
    </div>
    <input type="submit" value="Update Category" name="u_ctg_btn" class="btn btn-primary">
</form>
