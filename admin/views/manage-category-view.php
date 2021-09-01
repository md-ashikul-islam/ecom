<?php
    $obj_admin = new admin();
    $ctg_data= $obj_admin -> displayCategory();
?>

<h2>Manage Category</h2>

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
                     <a class="btn btn-sm btn-success" href="">Publish it</a>
                     <?php
                 }else{
                     echo "Published";
                     ?>
                     <a class="btn btn-sm btn-danger" href="">Unpublish it</a>
                <?php
                 }
                 ?>                             
                </td>
                 <td>
                     <a href="">Update</a>
                     <a href="">Delete</a>
                 </td>
             </tr>
             

        <?php
            }
        ?>
    </tbody>
</table>