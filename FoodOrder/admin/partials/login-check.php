<?php
//autorization or access control
  
   if(!isset($_SESSION['user'])){//if user session is not set
    $_SESSION['no-login-message'] = "<div class='error'>Please Login to acssess Panel.</div>";
    //redirect to login page w msg
    header('location:'.SITEURL.'admin/login.php');

   }

?>