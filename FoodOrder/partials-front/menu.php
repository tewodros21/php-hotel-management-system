<?php include('config/constants.php') ?>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive FOOD Website Design Tutorial</title>

    <!-- aos css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- google fonts cdn link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;500&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
   

</head>

<header>


    <a href="../index.php" class="logo"><img src="images/logo-img.png" alt=""></a>

    <div id="menu-bar" class="fas fa-hamburger"></div>

    <nav class="navbar">
        <ul style="padding-right: 150px;">
            <li>  <a class="active" href="<?php echo SITEURL; ?>index.php">home</a></li>
            <li><a href="<?php echo SITEURL; ?>foodmenu.php">menu</a></li>
            <li><a href="<?php echo SITEURL; ?>popular.php">popular</a></li>
            <li><a href="<?php echo SITEURL; ?>gallery.php">gallery</a></li>
            <li><a href="<?php echo SITEURL; ?>about.php">about</a></li>
            
        </ul>
    </nav>

</header>