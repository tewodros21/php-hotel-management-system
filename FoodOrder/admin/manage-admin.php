<?php include('partials/menu.php');  ?>
<style>

</style>
<div class="content">
  <div class="container-fluid col-md-13">
    <h1> Manage Admin </h1>
    <br />

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add']; // display session msg
      unset($_SESSION['add']); // removing session msg
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete']; // display session msg
      unset($_SESSION['delete']); // removing session msg
    }

    if (isset($_SESSION['update'])) {
      echo $_SESSION['update']; // display session msg
      unset($_SESSION['update']); // removing session msg
    }

    if (isset($_SESSION['user-not-found'])) {
      echo $_SESSION['user-not-found']; // display session msg
      unset($_SESSION['user-not-found']); // removing session msg
    }

    if (isset($_SESSION['pwd-not-match'])) {
      echo $_SESSION['pwd-not-match']; // display session msg
      unset($_SESSION['pwd-not-match']); // removing session msg
    }

    if (isset($_SESSION['change-pwd'])) {
      echo $_SESSION['change-pwd']; // display session msg
      unset($_SESSION['change-pwd']); // removing session msg
    }

    ?> <br /> <br />


    <a href="add-admin.php" class="btn btn-secondary">Add Admin</a>

    <br /> <br /> <br />

    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Action</th>
      </tr>

      <?php

      //query to get all admin
      $sql = "SELECT * FROM tbl_admin";
      //excute the query
      $res = mysqli_query($conn, $sql);

      //check the qury isexcuted

      if ($res == TRUE) {
        //count rows to check we have data in db
        $count = mysqli_num_rows($res); //function to get all the rows

        $sn = 1;
        // check the no of rows
        if ($count > 0) {

          while ($rows = mysqli_fetch_assoc($res)) {
            // get individual value
            $id = $rows['id'];
            $full_name = $rows['full_name'];
            $username = $rows['username'];

      ?>
            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $full_name; ?></td>
              <td><?php echo $username; ?></td>
              <td>
                <a href="<?php echo SITEURL; ?>admin/update-password.php? id=<?php echo $id; ?>" class="btn btn-primary">Change Password</a>
                <a href="<?php echo SITEURL; ?>admin/update-admin.php? id=<?php echo $id; ?>" class="btn btn-info">Update Admin</a>
                <a href="<?php echo SITEURL; ?>admin/delete-admin.php? id=<?php echo $id; ?>" class="btn btn-danger">Delete Admin</a>

              </td>
            </tr>


      <?php
          }
        } else {
        }
      }


      ?>



    </table>
  </div>
</div>