<?php include('partials-front/menu.php') ?>
<section class="gallery" id="gallery">
    <div class="container">
        <h1 class="heading"> our delicious <span>menu</span> </h1>
        <?php
        //create the sql query
        $sql = "SELECT * FROM tbl_catagory WHERE active='Yes' AND featured='YES' LIMIT 3";

        //excute the query
        $res = mysqli_query($conn, $sql);

        //check the data i savilable or not 
        $count = mysqli_num_rows($res);

        if ($count > 1) {

            //get the detail
            while ($row = mysqli_fetch_assoc($res)) {

                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>
                <a href="category-foods.html">
                    <div class="box-3 " style="position: relative; " data-aos="fade-up">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image is not.</div>";
                        } else {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" style="g-responsive; border-radius: 15px; width:100%" alt="">
                        <?php

                        }

                        ?>

                        <h3 style="position: absolute;
                                 bottom: 50px;
                                 left: 40%;
                                 color: white;">
                            <?php echo $title; ?>
                        </h3>

                    </div>
                </a>
        <?php
            }
        } else {

            echo "<div class='error'>Category not Found.</div>";
        }

        ?>






        <div style="clear: both;
                         float: none;">

        </div>
    </div>
</section>
<?php include('partials-front/footer.php') ?>