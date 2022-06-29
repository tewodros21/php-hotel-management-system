<?php
  include("../config/constants.php");

  session_destroy();//unset session['user']

  header('location:'.SITEURL."admin/login.php");
 
?>