<?php include('partials/menu.php');  ?>

<div class="content">
    <div class="container-fluid  col-6">
        <h1> Update Catagory</h1> <br /> <br />

        <?php

        if (isset($_GET['id'])) {

            //get the id
            $id = $_GET['id'];

            //create the sql query
            $sql = "SELECT * FROM tbl_catagory WHERE id=$id";

            //excute the query
            $res = mysqli_query($conn, $sql);

            //check the data i savilable or not 
            $count = mysqli_num_rows($res);

            if ($count == 1) {

                //get the detail
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                //rediret to manage admin
                $_SESSION['no-category-food'] = "<div class='error'>Category not Found.</div>";
                header('location:' . SITEURL . "admin/manage-catagory.php");
            }
        } else {
            header('location:' . SITEURL . "admin/manage-category.php");
        }


        ?>


        <form action="" method="POST" enctype="multipart/form-data" class="col-md-12">
            <label for="fname">Title: </label>
            <input type="text" name="title" value="<?php echo $title; ?>"><br />

            <label for="fname">Curent Image: </label>
            <td>
                <?php
                if ($current_image != "") {

                ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
                <?php
                } else {
                    echo "<div class='error'>Image is Not Added.</div>";
                }

                ?>
            </td>
            <br /><br />

            <label>New Image: </label>
            <input type="file" name="image"><br /><br />

            <label>Featured: </label>

            <input <?php if ($featured == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="featured" value="Yes">Yes
            <input <?php if ($featured == "No") {
                        echo "checked";
                    } ?> type="radio" name="featured" value="NO">No <br /><br />

            <label>Active: </label>
            <input <?php if ($active == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="active" value="Yes">Yes
            <input <?php if ($active == "No") {
                        echo "checked";
                    } ?> type="radio" name="active" value="NO">No <br />


            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Catagory">




        </form>
        <?php


        //check the button is clicked or not
        if (isset($_POST['submit'])) {
            //get all the value from form to update
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            // check the image is selected
            if (isset($_FILES['image']['name'])) {
                //get the img detail
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    //img is avliable
                    //uploade the img

                    //auto rename img ovride endayadergew
                    //get the extenshion og img 
                    $ext = end(explode('.', $image_name));

                    $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/" . $image_name;

                    //upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'> Category Failed to Uploade</div>";
                        //redirect page manage admin page
                        header('location:' . SITEURL . "admin/manage-category.php");             //stop the process
                        die();
                    }

                    $rmove_path = "../images/category/" . $current_image;
                    $remove = unlink($rmove_path);

                    if ($remove == false) {
                        $_SESSION['failed-remove'] = "<div class='error'>  Failed to remove Curent Image</div>";
                        //redirect page manage admin page
                        header('location:' . SITEURL . "admin/manage-category.php");                                       //stop the process
                        die();
                    }
                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }


            //sql query to update cat

            $sql2 = "UPDATE tbl_catagory SET
                    title = '$title',
                    image_name = '$image_name',
                    featured ='$featured',
                    active ='$active'
                    WHERE id='$id'
                    ";


            $res2 = mysqli_query($conn, $sql2);

            //check it is excuted
            if ($res2 == true) {
                $_SESSION['update'] = "<div class='success'>Category Update Successfuly </div>";
                //redirect to manage admin page
                header('location:' . SITEURL . "admin/manage-category.php");
            } else {
                $_SESSION['update'] = "<div class='error'>Failed to Category Update.</div>";
                header('location:' . SITEURL . "admin/manage-category.php");
            }
        }


        ?>
    </div>
</div>