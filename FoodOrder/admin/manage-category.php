<?php include('partials/menu.php');  ?>

<div class="content">
  <div class="container-fluid col-md-13">
    <h1> Manage Category </h1>
    <br /> <br />
    <?php
    if (isset($_SESSION['add'])) { //checking the session is set or not
      echo $_SESSION['add']; // display session msg
      unset($_SESSION['add']); // removing session msg
    }

    if (isset($_SESSION['remove'])) { //checking the session is set or not
      echo $_SESSION['remove']; // display session msg
      unset($_SESSION['remove']); // removing session msg
    }

    if (isset($_SESSION['delete'])) { //checking the session is set or not
      echo $_SESSION['delete']; // display session msg
      unset($_SESSION['delete']); // removing session msg  '
    }

    if (isset($_SESSION['no-category-food'])) { //checking the session is set or not
      echo $_SESSION['no-category-food']; // display session msg
      unset($_SESSION['no-category-food']); // removing session msg  '
    }

    if (isset($_SESSION['update'])) { //checking the session is set or not
      echo $_SESSION['update']; // display session msg
      unset($_SESSION['update']); // removing session msg  '
    }
    if (isset($_SESSION['upload'])) { //checking the session is set or not
      echo $_SESSION['upload']; // display session msg
      unset($_SESSION['upload']); // removing session msg  '
    }
    ?>


    <a href="<?php echo SITEURL; ?>admin/add-catagory.php" class="btn btn-secondary ">Add Catagory</a><br />

    <br /> <br /> <br />

    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Image &emsp;</th>
        <th>Featured</th>
        <th>Active</th>
      </tr>

      <?php

      $sql = "SELECT * FROM tbl_catagory";

      $res = mysqli_query($conn, $sql);

      $count = mysqli_num_rows($res);

      $sn = 1;

      if ($count > 0) {
        //get the data and display
        while ($row = mysqli_fetch_assoc($res)) {

          $id = $row['id'];
          $title = $row['title'];
          $image_name = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];

      ?>

          <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>
            <td>
              <?php

              if ($image_name != "") {
              ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
              <?php

              } else {
                echo "<div class='error'>Image not Added.</div>";
              }

              ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>


              <a href="<?php echo SITEURL; ?>admin/update-category.php? id=<?php echo $id; ?>" class="btn btn-info">Update Category</a>
              <a href="<?php echo SITEURL; ?>admin/delete-category.php? id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Category</a>



            </td>
          </tr>


        <?php
        }
      } else {
        ?>

        <tr>
          <td colspan="6">
            <div class="error">No Category Added.</div>
          </td>
        </tr>
      <?php

      }


      ?>


    </table>

  </div>
</div>