<?php include('partials-front/menu.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- footer section ends -->
    <style>
        /* CSS for Food Menu */
        .food-menu {
            background-color: #ececec;
            padding: 4% 0;
        }

        .food-menu-box {
            width: 43%;
            margin: 1%;
            padding: 2%;
            float: left;
            background-color: white;
            border-radius: 15px;
        }

        .food-menu-img {
            width: 20%;
            float: left;
        }

        .food-menu-desc {
            width: 70%;
            float: left;
            margin-left: 8%;
        }

        .food-price {
            font-size: 1.2rem;
            margin: 2% 0;
        }

        .food-detail {
            font-size: 110%;
            color: #747d8c;
        }
    </style>

<body>

    <!-- header section starts  -->



    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">


        <div class="content" data-aos="fade-right">
            <h3>We Belive Good Food Offer Great Smile</h3>
            <a href="popular.php"><button class="btn">get started</button></a>
            <?php
            if (isset($_SESSION['order'])) { //checking the session is set or not
                echo $_SESSION['order']; // display session msg
                unset($_SESSION['order']); // removing session msg
            }
            ?>
        </div>

        <div class="image" data-aos="fade-up">
            <img src="images/home1.jpg" alt="">
        </div>

    </section>



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h1 class="heading" style=" padding-top: 3%;"> Most <span>Popular</span> Foods </h1>
            <?php
            //create the sql query
            $sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //excute the query
            $res = mysqli_query($conn, $sql);

            //check the data i savilable or not 
            $count = mysqli_num_rows($res);

            if ($count > 0) {

                //get the detail
                while ($row = mysqli_fetch_assoc($res)) {

                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
            ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php


                            if ($image_name == "") {
                                echo "<div class='error'>Image is not.</div>";
                            } else {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" style="g-responsive; border-radius: 15px;" alt="" width=100%>
                            <?php

                            }

                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"><?php echo $price; ?> ETB</p>
                            <p class="food-detail"><?php echo $description; ?></p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

            <?php
                }
            } else {

                echo "<div class='error'>Category not Found.</div>";
            }

            ?>
            <div class="clearfix"></div>



        </div>


    </section>

    <?php include('partials-front/footer.php') ?>











    <!-- aos js cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    <!-- initializing aos  -->

    <script>
        AOS.init({
            delay: 400,
            duration: 1000
        })
    </script>

</body>

</html>