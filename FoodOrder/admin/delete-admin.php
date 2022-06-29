<?php 
//include constant.php file
include('../config/constants.php');

//get the admin id
$id = $_GET['id'];

// create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//excute the query
$res = mysqli_query($conn, $sql);

//check the query is succ or fail
if($res==true){

    //create session variable to display msg
    $_SESSION['delete']= "<div class='success'>Admin Deleted Successfuly </div>";
    //redirect to manage admin page

    header('location:'.SITEURL."admin/manage-admin.php");

}else{
    $_SESSION['delete']="<div class='error'>Failed to Admin Delete.</div>";
    header('location:'.SITEURL."admin/manage-admin.php");

}
