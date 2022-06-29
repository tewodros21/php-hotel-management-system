<?php include('partials/menu.php');  ?>

<div class="content">
  <div class="container-fluid col-md-13">
    <h1> Manage Food </h1>
    <br /> <br />
    <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn btn-secondary">Add Food</a>

    <?php
    if (isset($_SESSION['add'])) { //checking the session is set or not
      echo $_SESSION['add']; // display session msg
      unset($_SESSION['add']); // removing session msg
    }

    if (isset($_SESSION['delete'])) { //checking the session is set or not
      echo $_SESSION['delete']; // display session msg
      unset($_SESSION['delete']); // removing session msg
    }
    if (isset($_SESSION['upload'])) { //checking the session is set or not
      echo $_SESSION['upload']; // display session msg
      unset($_SESSION['upload']); // removing session msg
    }

    if (isset($_SESSION['unauthorize'])) { //checking the session is set or not
      echo $_SESSION['unauthorize']; // display session msg
      unset($_SESSION['unauthorize']); // removing session msg
    }

    if (isset($_SESSION['update'])) { //checking the session is set or not
      echo $_SESSION['update']; // display session msg
      unset($_SESSION['update']); // removing session msg
    }
    ?>
    <br /> <br />


    <br /> <br /> <br />

    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
      <?php

      $sql = "SELECT * FROM tbl_food";

      $res = mysqli_query($conn, $sql);

      $count = mysqli_num_rows($res);

      $sn = 1;

      if ($count > 0) {
        //get the data and display
        while ($row = mysqli_fetch_assoc($res)) {

          $id = $row['id'];
          $title = $row['title'];
          $price = $row['price'];
          $image_name = $row['image_name'];
          $featured = $row['featured'];
          $active = $row['active'];

      ?>

          <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $price; ?></td>
            <td>
              <?php

              if ($image_name == "") {
                echo "<div class='error'>Image not Added.</div>";
              } else {

              ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
              <?php

              }
              ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <a href="<?php echo SITEURL; ?>admin/update-food.php? id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-success">Update Food</a>
              <a href="<?php echo SITEURL; ?>admin/delete-food.php? id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-danger">Delete Category</a>
          <?php
        }
      } else {
        echo "<div class='error'>Food not Added.</div>";
      }

          ?>



    </table>

  </div>
</div>

<?php //include('partials/footer.php')
?>