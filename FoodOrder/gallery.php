<!-- gallery section starts  -->
<?php include('partials-front/menu.php') ?>

<section class="gallery" id="gallery">

    <h1 class="heading"> Our Food <span>Gallery</span> </h1>

    <?php
    //create the sql query
    $sql = "SELECT * FROM tbl_catagory WHERE active='Yes'";

    //excute the query
    $res = mysqli_query($conn, $sql);

    //check the data i savilable or not 
    $count = mysqli_num_rows($res);

    if ($count > 0) {

        //get the detail
        while ($row = mysqli_fetch_assoc($res)) {

            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];
    ?>

            <div class="box-container" style="float:left;">

                <div class="box" data-aos="fade-up">
                    <?php


                    if ($image_name == "") {
                        echo "<div class='error'>Image is not.</div>";
                    } else {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" style="g-responsive; border-radius: 15px;   alt="" width=100%>
                            <?php

                        }

                            ?>
                                
                                <h3><?php echo $title; ?></h3>
                            </div>

                        </div>
                     <?php
                    }
                } else {

                    echo "<div class='error'>Category not Found.</div>";
                }

                        ?>



</section>

<?php include('partials-front/footer.php') ?>
