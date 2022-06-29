<?php include('partials/menu.php');  ?>

<div class="content">
    <div class="container-fluid  col-6">
        <h1> Update Adimn</h1> <br /> <br />

        <?php
        //get the id
        $id = $_GET['id'];

        //create the sql query
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        //excute the query
        $res = mysqli_query($conn, $sql);

        //check the query is excute
        if ($res == true) {
            //check the data id savilable or not 
            $count = mysqli_num_rows($res);
            //check whether we have admin data or not
            if ($count == 1) {
                //get the detail
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                //rediret to manage admin
                header('location:' . SITEURL . "admin/manage-admin.php");
            }
        }


        ?>


        <form action="" method="POST" class="col-md-12">
            <label for="fname">First Name</label>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>"><br />

            <label for="lname">Last Name</label>
            <input type="text" name="username" value="<?php echo $username; ?>"><br />

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin">
        </form>
    </div>
</div>


<?php

//check the button is clicked or not
if (isset($_POST['submit'])) {
    //get all the value from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //sql query to update admin

    $sql = "UPDATE tbl_admin SET
       full_name = '$full_name',
       username ='$username'
       WHERE id='$id'
       ";

    //excute the query
    $res = mysqli_query($conn, $sql);

    //check it is excuted
    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>Admin Update Successfuly </div>";
        //redirect to manage admin page
        header('location:' . SITEURL . "admin/manage-admin.php");
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Admin Update.</div>";
        header('location:' . SITEURL . "admin/manage-admin.php");
    }
}

?>