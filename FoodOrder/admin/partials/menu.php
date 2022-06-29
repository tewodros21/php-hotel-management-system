<?php 
   include('../config/constants.php'); 
   include('login-check.php');

?>    
<html>
  <head>
    
    
    <meta charset="utf-8">
    <title> Food website - Home Page </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    <script src="/js/bootstrap.bundle.min.js" ></script>

    
    
 
    
  </head> 

  <body>
     
      <div class="navigation">
              <ul>
            <li>
             <a href="index.php">
             <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
             <span class="title">Home</span>
             </a>
            </li>
            
            <li>
             <a href="manage-admin.php">
             <span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
             <span class="title">Admin</span>
             </a>
            </li>
            
            <li>
             <a href="manage-category.php">
             <span class="icon"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
             <span class="title">Catacory</span>
             </a>
            </li>
            
            <li>
             <a href="manage-food.php">

             <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
             <span class="title">Food</span>
             </a>
            </li>
            
            <li>
              <a href="manage-order.php">
             <span class="icon"><i class="fa fa-address-book-o" aria-hidden="true"></i></span>
             <span class="title">Order</span>
             </a>
            </li>

            <li>
              <a href="logout.php">
             <span class="icon"><i class="fa fa-address-book-o" aria-hidden="true"></i></span>
             <span class="title">Logout</span>
             </a>
            </li>
         
            </ul>

           
            


         </div>  
   
    

