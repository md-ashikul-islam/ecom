<?php

class admin
{
    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
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

    function adminLogout()
    {
        unset($_SESSION['uname']);
        unset($_SESSION['adminEmail']);
        unset($_SESSION['adminPass']);
        header('location:index.php');
    }

    function addCategory($data)
    {
        $ctg_name = $data['ctg_name'];
        $ctg_desc = $data['ctg_desc'];
        $ctg_status = $data['ctg_status'];

        $query = "INSERT INTO category(ctg_name,ctg_desc,ctg_status)
        VALUE('$ctg_name','$ctg_desc',$ctg_status)";

        if (mysqli_query($this->conn, $query)) {
            $message = "Category Added Successfully.";
            return $message;
        } else {
            $message = "Category could not be added!";
            return $message;
        }
    }

    function displayCategory()
    {
        $query = "Select * from category";

        if (mysqli_query($this->conn, $query)) {
            $return_ctg = mysqli_query($this->conn, $query);
            return $return_ctg;
        }
    }

    function p_displayCategory()
    {
        $query = "SELECT * FROM category WHERE ctg_status=1";

        if (mysqli_query($this->conn, $query)) {
            $return_ctg = mysqli_query($this->conn, $query);
            return $return_ctg;
        }
    }

    function publish_category($id)
    {
        $query = "UPDATE category SET ctg_status = 1 WHERE ctg_id=$id";
        mysqli_query($this->conn, $query);
    }

    function unpublish_category($id)
    {
        $query = "UPDATE category SET ctg_status = 0 WHERE ctg_id=$id";
        mysqli_query($this->conn, $query);
    }

    function delete_category($id)
    {
        $query = "DELETE FROM category WHERE ctg_id=$id";
        if (mysqli_query($this->conn, $query)) {
            $msg = "Category Deleted Successfully";
            return $msg;
        }
    }

    function getcatinfo_toupdate($id)
    {
        $query = "SELECT * FROM category WHERE ctg_id=$id";
        if (mysqli_query($this->conn, $query)) {
            $category_info = mysqli_query($this->conn, $query);
            $ctg_info = mysqli_fetch_assoc($category_info);
            return $ctg_info;
        }
    }

    function update_category($recievedData)
    {
        $ctg_name = $recievedData['update_ctg_name'];
        $ctg_desc = $recievedData['update_ctg_desc'];
        $ctg_id = $recievedData['update_ctg_id'];

        $query = "UPDATE category SET ctg_name='$ctg_name', ctg_desc='$ctg_desc' WHERE ctg_id=$ctg_id";
        if (mysqli_query($this->conn, $query)) {
            $return_msg = "Category Updated Successfully!";
            return $return_msg;
        }
    }

    function add_product($data)
    {
        $pd_name = $data['pd_name'];
        $pd_price = $data['pd_price'];
        $pd_desc = $data['pd_desc'];
        $pd_ctg = $data['pd_ctg'];
        $pd_img_name = $_FILES['pd_image']['name'];
        $pd_img_size = $_FILES['pd_image']['size'];
        $pd_img_tmp_name = $_FILES['pd_image']['tmp_name'];
        $pd_extention = pathinfo($pd_img_name, PATHINFO_EXTENSION);
        $pd_status = $data['pd_status'];

        if ($pd_extention == 'jpg' or $pd_extention == 'png' or $pd_extention = 'jpeg') {
            if ($pd_img_size <= 10485760) {
                $query = "INSERT INTO product(pd_name,pd_price,pd_img,pd_desc,pd_status,pd_ctg) 
                VALUE('$pd_name',$pd_price,'$pd_img_name','$pd_desc',$pd_status,$pd_ctg)";

                if (mysqli_query($this->conn, $query)) {
                    move_uploaded_file($pd_img_tmp_name, 'upload/' . $pd_img_name);
                    $msg = "Product added succcessfully!";
                    return $msg;
                }
            } else {
                $msg = "Image Size is too large! It must be below 10 MB.";
                return $msg;
            }
        } else {
            $msg = "Wrong File Type! Please upload JPG/JPEG/PNG Files Only";
            return $msg;
        }
    }

    function display_product()
    {
        $query = "SELECT * FROM product_ctg_info";
        if (mysqli_query($this->conn, $query)) {
            $product = mysqli_query($this->conn, $query);
            return $product;
        }
    }
    

    function deleteProduct($id)
    {
        $query = "DELETE FROM product WHERE product_id=$id";
        if (mysqli_query($this->conn, $query)) {
            $msg = "Product Deleted Successfully!";
            return $msg;
        }
    }

    function getEditProduct_info($id)
    {
        $query = "SELECT * FROM product_ctg_info WHERE product_id=$id";
        if (mysqli_query($this->conn, $query)) {
           $productInfo =mysqli_query($this->conn, $query);
           $pd_data= mysqli_fetch_assoc($productInfo);
           return $pd_data;
        }
    }

    function updateProduct($data){
        $pd_id= $data['u_pd_id'];
        $pd_name = $data['u_pd_name'];
        $pd_price = $data['u_pd_price'];
        $pd_desc = $data['u_pd_desc'];
        $pd_ctg = $data['u_pd_ctg'];
        $pd_img_name = $_FILES['u_pd_image']['name'];
        $pd_img_size = $_FILES['u_pd_image']['size'];
        $pd_img_tmp_name = $_FILES['u_pd_image']['tmp_name'];
        $pd_extention = pathinfo($pd_img_name, PATHINFO_EXTENSION);
        $pd_status = $data['u_pd_status'];
        if ($pd_extention == 'jpg' or $pd_extention == 'png' or $pd_extention = 'jpeg') {
            if ($pd_img_size <= 10485760) {
                $query = "UPDATE product SET pd_name='$pd_name',pd_price=$pd_price, pd_desc='$pd_desc',
                pd_ctg=$pd_ctg,pd_img='$pd_img_name',pd_status='$pd_status' WHERE product_id=$pd_id";

                if (mysqli_query($this->conn, $query)) {
                    move_uploaded_file($pd_img_tmp_name, 'upload/' . $pd_img_name);
                    $msg = "Product Updated succcessfully!";
                    return $msg;
                }
            } else {
                $msg = "Image Size is too large! It must be below 10 MB.";
                return $msg;
            }
        } else {
            $msg = "Wrong File Type! Please upload JPG/JPEG/PNG Files Only";
            return $msg;
        }
    }
}
