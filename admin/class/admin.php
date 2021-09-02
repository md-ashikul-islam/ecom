<?php

class admin
{
    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass= "";
        $dbname = "cholokini";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Database Could not connect!");
        }
    }

    function admin_login($data)
    {
        $admin_uname = $data['admin_uname'];
        $admin_pass = $data['admin_pass'];

        $query = "SELECT * FROM admin WHERE 
        adminUser ='$admin_uname' AND adminPass= '$admin_pass'";

        if (mysqli_query($this->conn, $query)) {
            $result = mysqli_query($this->conn, $query);
            $admin_info = mysqli_fetch_assoc($result);

            if ($admin_info) {
                header('Location:dashboard.php');
                session_start();
                $_SESSION['uname'] = $admin_info['adminUser'];
                $_SESSION['adminEmail'] = $admin_info['admin_email'];
                $_SESSION['adminPass'] = $admin_info['adminPass'];

            } else {
                $errmsg = "Your Username or Password is incorrect!";
                return $errmsg;
            }
        }
    }

    function adminLogout(){
        unset ($_SESSION['uname']);
        unset ($_SESSION['adminEmail']);
        unset ($_SESSION['adminPass']);
        header('location:index.php');

    }

    function addCategory($data){
        $ctg_name = $data['ctg_name'];
        $ctg_desc = $data['ctg_desc'];
        $ctg_status = $data['ctg_status'];

        $query = "INSERT INTO category(ctg_name,ctg_desc,ctg_status)
        VALUE('$ctg_name','$ctg_desc',$ctg_status)";

        if(mysqli_query($this ->conn, $query)){
            $message = "Category Added Successfully.";
            return $message;
        }else{
            $message = "Category could not be added!";
            return $message;
        }
        
    }

    function displayCategory(){
        $query= "Select * from category";

        if(mysqli_query($this->conn,$query)){
            $return_ctg = mysqli_query($this->conn,$query);
            return $return_ctg;
        }
    }

    function publish_category($id){
        $query = "UPDATE category SET ctg_status = 1 WHERE ctg_id=$id";
        mysqli_query($this ->conn,$query);
    }

    function unpublish_category($id){
        $query = "UPDATE category SET ctg_status = 0 WHERE ctg_id=$id";
        mysqli_query($this ->conn,$query);
    }

    function delete_category($id){
        $query = "DELETE FROM category WHERE ctg_id=$id";
        if(mysqli_query($this->conn,$query)){
            $msg="Category Deleted Successfully";
            return $msg;
        }
    }

    function getcatinfo_toupdate($id){
        $query = "SELECT * FROM category WHERE ctg_id=$id";
        if(mysqli_query($this->conn,$query)){
            $category_info = mysqli_query($this->conn,$query);
            $ctg_info = mysqli_fetch_assoc($category_info);
            return $ctg_info;
        }
    }

    function update_category($recievedData){
        $ctg_name = $recievedData['update_ctg_name'];
        $ctg_desc = $recievedData['update_ctg_desc'];
        $ctg_id = $recievedData['update_ctg_id'];

        $query= "UPDATE category SET ctg_name='$ctg_name', ctg_desc='$ctg_desc' WHERE ctg_id=$ctg_id";
        if(mysqli_query($this->conn,$query)){
            $return_msg = "Category Updated Successfully!";
            return $return_msg;
        }

    }
}
