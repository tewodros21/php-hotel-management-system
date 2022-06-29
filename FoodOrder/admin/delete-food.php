<?php 
//include constant.php file
include('../config/constants.php');

//check id and img value i set
if(isset($_GET['id']) && isset($_GET['image_name'])){
    
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the physical img file
    if($image_name != ""){
       
        //img is avilable so remove it
        $path = "../images/food/".$image_name; 
        $remove = unlink($path);
        
        //if faliled to remove
        if($remove==false){

            $_SESSION['upload']= "<div class='error'>Faile to remove Image.</div>";
            header('location:'.SITEURL."admin/manage-food.php");
            die();
        }

    }

$sql = "DELETE FROM tbl_food WHERE id=$id";

//excute the query
$res = mysqli_query($conn, $sql);

//check the query is succ or fail
if($res==true){

    //create session variable to display msg
    $_SESSION['delete']= "<div class='success'>Food Deleted Successfuly </div>";
    //redirect to manage admin page

    header('location:'.SITEURL."admin/manage-food.php");

}
else{
    $_SESSION['delete']="<div class='error'>Failed to Delete Food.</div>";
    header('location:'.SITEURL."admin/manage-food.php");

}
}
else{

    $_SESSION['unauthorize']="<div class='error'>Failed to Delete Food.</div>";
    header('location:'.SITEURL."admin/manage-food.php");
}
