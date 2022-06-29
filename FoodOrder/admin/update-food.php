<?php include('partials/menu.php');  ?>

<?php

if (isset($_GET['id'])) {

    //get the id
    $id = $_GET['id'];

    //create the sql query
    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";

    //excute the query
    $res2 = mysqli_query($conn, $sql2);

    //get the detail
    $row2 = mysqli_fetch_assoc($res2);

    //check the data i savilable or not 
    // $count = mysqli_num_rows($res);


    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];
} else {
    header('location:' . SITEURL . "admin/manage-food.php");
}


?>



<div class="content">
    <div class="container-fluid col-md-13">
        <h1>Update Food</h1><br />

        <br /><br />
        <form action="" method="POST" enctype="multipart/form-data" class="col-md-12">
            <label>Title:&emsp; &emsp; &emsp;</label>
            <input type="text" name="title" value="<?php echo $title; ?>"><br /><br />

            <label>Descriptions: </label>
            <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea><br /><br />

            <label>Price: &emsp;&emsp;&emsp; </label>
            <input type="number" name="price" value="<?php echo $price; ?>"><br /><br />

            <label>Current Image:&emsp; </label>
            <?php
            if ($current_image != "") {

            ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
            <?php
            } else {
                echo "<div class='error'>Image is Not Avilabel.</div>";
            }

            ?>
            <br /><br />
            <label>New Image: &emsp; </label>
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
                        $category_title = $row['title'];
                        $category_id = $row['id'];
                ?>

                        <option <?php if ($current_category == $category_id) {
                                    echo "selected";
                                } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

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

            <label>Featured:&emsp; </label>
            <input <?php if ($featured == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="featured" value="Yes">Yes
            <input <?php if ($featured == "No") {
                        echo "checked";
                    } ?> type="radio" name="featured" value="NO">No <br /><br />

            <label>Active: &emsp;&emsp;</label>
            <input <?php if ($active == "Yes") {
                        echo "checked";
                    } ?> type="radio" name="active" value="Yes">Yes
            <input <?php if ($active == "No") {
                        echo "checked";
                    } ?> type="radio" name="active" value="NO">No <br />



            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Food">
        </form>

        <?php


        //check the button is clicked or not
        if (isset($_POST['submit'])) {
            //get all the value from form to update
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];

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

                    $image_name = "Food-Name-" . rand(000, 99999) . '.' . $ext;

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/food/" . $image_name;

                    //upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'> Failed to Uploade new Image</div>";
                        //redirect page manage admin page
                        header('location:' . SITEURL . "admin/manage-food.php");             //stop the process
                        die();
                    }



                    if ($current_image != "") {

                        $rmove_path = "../images/food/" . $current_image;
                        $remove = unlink($rmove_path);

                        if ($remove == false) {
                            $_SESSION['failed-remove'] = "<div class='error'>  Failed to remove Curent Image</div>";
                            header('location:' . SITEURL . "admin/manage-food.php");   //redirect page manage admin page                                   
                            die();  //stop the process
                        }
                    }
                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }


            //sql query to update cat

            $sql3 = "UPDATE tbl_food SET
                title = '$title',
                description = '$description',
                price = '$price',
                image_name = '$image_name',
                category_id ='$category',
                featured = '$featured',
                active = '$active'
                WHERE id='$id'
            ";


            $res3 = mysqli_query($conn, $sql3);

            //check it is excuted
            if ($res3 == true) {
                $_SESSION['update'] = "<div class='success'>Food Update Successfuly </div>";
                //redirect to manage admin page
                header('location:' . SITEURL . "admin/manage-food.php");
            } else {
                $_SESSION['update'] = "<div class='error'>Failed to Food Update.</div>";
                header('location:' . SITEURL . "admin/manage-food.php");
            }
        }


        ?>
    </div>
</div>