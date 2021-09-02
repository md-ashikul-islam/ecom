<?php
    $obj_admin = new admin();
    $ctg_data= $obj_admin -> displayCategory();

    if (isset($_GET['status'])){
        $get_id=$_GET['id'];
        if($_GET['status']== 'publish'){
            $obj_admin -> publish_category($get_id);
        } elseif($_GET['status']== 'unpublish'){
            $obj_admin -> unpublish_category($get_id);
        }
        elseif($_GET['status']== 'delete'){
            $obj_admin -> delete_category($get_id);
            $msg= $obj_admin->delete_category($get_id);
        }
    }
?>

<h2>Manage Category</h2>
<?php if(isset($msg)){
    echo $msg;
}
   ?>
<table class="table">
    <thead>
        <tr>
            <th>Category ID</th>
            <th>Category</th>
            <th>Description</th>
            <th>Status</th>
            <th>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($ctg=mysqli_fetch_assoc($ctg_data)){
             ?>          
             <tr>
                 <td><?php echo $ctg['ctg_id'];?></td>
                 <td><?php echo $ctg['ctg_name'];?></td>
                 <td><?php echo $ctg['ctg_desc'];?></td>
                 <td><?php 
                 if($ctg['ctg_status']==0){
                     echo "Unpublished";
                     ?>
                     <a class="btn btn-sm btn-success" href="?status=publish&&id=<?php echo $ctg['ctg_id'];?>">Publish it</a>
                     <?php
                 }else{
                     echo "Published";
                     ?>
                     <a class="btn btn-sm btn-danger" href="?status=unpublish&&id=<?php echo $ctg['ctg_id'];?>">Unpublish it</a>
                <?php
                 }
                 ?>                             
                </td>
                 <td>
                     <a href="">Update</a>
                     <a href="?status=delete&&id=<?php echo $ctg['ctg_id'] ?>">Delete</a>
                 </td>
             </tr>
             

        <?php
            }
        ?>
    </tbody>
</table>