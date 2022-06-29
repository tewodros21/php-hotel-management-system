<?php include('partials/menu.php');  ?>

<div class="content">
    <div class="container-fluid col-md-13">
        <h1>Add Food</h1><br /> <br />

        <?php
        if (isset($_SESSION['upload'])) { //checking the session is set or not
            echo $_SESSION['upload']; // display session msg
            unset($_SESSION['upload']); // removing session msg
        }

        ?>
        <br /><br />
        <form action="" method="POST" enctype="multipart/form-data" class="col-md-12">
            <label>Title:&emsp; &emsp; &emsp;</label>
            <input type="text" name="title"><br /><br />

            <label>Descriptions: </label>
            <textarea name="description" cols="30" rows="5" palceholder="Description of the food"></textarea><br /><br />

            <label>Price: &emsp;&emsp;&emsp; </label>
            <input type="number" name="price"><br /><br />

            <label>Image : &emsp;&emsp; </label>
            <input type="file" name="image"><br /><br />

            <label>Category: &emsp;</label>
            <select name="category">

                <?php

                //display cata from db
                $sql = "SELECT * FROM tbl_catagory WHERE active='yes' ";

                //excute query
                $res = mysqli_query($conn, $sql);

                //check the catago have a value or mot
                $count = mysqli_num_rows($res);

                //if counn > 0 we have data
                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($res)) {
                        //get  catagory detali
                        $id = $row['id'];
                        $title = $row['title'];
                ?>

                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                    <?php
                    }
                } else {
                    // 
                    ?>
                    <option value="0">No Category Found</option>
                <?php

                }

                ?>



            </select> <br /><br />

            <label for="lname">Featured:&emsp; </label>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="No">No<br /><br />

            <label for="lname">Active: &emsp;&emsp;</label>
            <input type="radio" name="active" value="Yes">Yes
            <input type="radio" name="active" value="No">No<br /><br />




            <input type="submit" name="submit" value="Add Food">

            <?php

            if (isset($_POST['submit'])) {

                //get data from the form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if (isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = "NO";
                }
                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "NO";
                }
                if (isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if ($image_name != "") {
                        //get the extenshion og img 
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name" . rand(000, 999) . '.' . $ext;

                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../images/food/" . $image_name;

                        //upload the image
                        $upload = move_uploaded_file($src, $dst);

                        if ($upload == false) {
                            $_SESSION['upload'] = "<div class='error'> Food Failed to Uploade</div>";
                            //redirect page manage admin page
                            header("location:" . SITEURL . "admin/add-food.php");
                            //stop the process
                            die();
                        }
                    }
                } else {
                    $image_name = "";
                }

                $sql2 = "INSERT INTO tbl_food SET
            title = '$title',
            description ='$description',
            price = '$price', 
            image_name ='$image_name',
            category_id ='$category',
            featured = '$featured',
            active = '$active'
            ";

                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['add'] = "<div class='success'> Food Added Successfully</div>";
                    //redirect page manage admin page
                    header("location:" . SITEURL . "admin/manage-food.php");
                } else {

                    //create a session variabel to dispaly a msg
                    $_SESSION['add'] = "<div class='error'> Food not add Successfully</div>";
                    //redirect page manage admin page
                    header("location:" . SITEURL . "admin/manage-food.php");
                }
            }

            ?>
        </form>
    </div>
</div>