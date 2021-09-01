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
}
