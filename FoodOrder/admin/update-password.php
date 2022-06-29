<?php include('partials/menu.php');  ?>

<div class="content">
    <div class="container-fluid  col-6">
        <h1> Change Password</h1> <br /> <br />
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST" class="col-md-12">
            <label for="lname">Current Password </label>
            <input type="password" name="current_password" placeholder="Curent Password"><br />
            <label for="lname">New Password &emsp;</label>
            <input type="password" name="new_password" placeholder="New Password"><br />
            <label for="lname">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password">

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Change Pawssword">


        </form>

    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    //get the data
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //check the user w current id and current password exit or not
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password ='$current_password'";

    //exuute tthe query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        //check the data is avilable
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //user exists and password can be change
            if ($new_password == $confirm_password) {

                $sql2 = "UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id=$id
                        ";
                //excute query
                $res2 = mysqli_query($conn, $sql2);

                //check the query excute

                if ($res2 == true) {
                    $_SESSION['change-pwd'] = "<div class='success'>Passwrd Change Successfully</div>";
                    //redirect page manage admin page
                    header('location:' . SITEURL . "admin/manage-admin.php");
                } else {
                    $_SESSION['change-pwd'] = "<div class='error'>Passwrd Did Not Change </div>";
                    //redirect page manage admin page
                    header('location:' . SITEURL . "admin/manage-admin.php");
                }
            } else {
                $_SESSION['pwd-not-match'] = "<div class='error'>Passwrd Did Not Match </div>";
                //redirect page manage admin page
                header('location:' . SITEURL . "admin/manage-admin.php");
            }
        } else {
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
            //redirect page manage admin page
            header('location:' . SITEURL . "admin/manage-admin.php");
        }
    }
}

?>