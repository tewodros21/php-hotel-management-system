<?php include('partials/menu.php');  ?>


<div class="content">
  <div class="container-fluid  col-6">
    <h2> Add Category</h2> <br /> <br />

    <?php
    if (isset($_SESSION['add'])) { //checking the session is set or not
      echo $_SESSION['add']; // display session msg
      unset($_SESSION['add']); // removing session msg
    }

    if (isset($_SESSION['upload'])) { //checking the session is set or not
      echo $_SESSION['upload']; // display session msg
      unset($_SESSION['upload']); // removing session msg
    }
    ?>


    <br />
    <form action="" method="POST" enctype="multipart/form-data" class="col-md-12">
      <label for="fname">Title:&emsp; &emsp;</label>
      <input type="text" class="form-control" name="title"><br /><br />

      <label for="lname">Select Image: </label>
      <input type="file" class="form-control" name="image"><br /><br />

      <label for="lname">Featured: </label>
      <input type="radio" name="featured" value="Yes">Yes
      <input type="radio" name="featured" value="No">No<br /><br />

      <label for="lname">Active: &emsp;</label>
      <input type="radio" name="active" value="Yes">Yes
      <input type="radio" name="active" value="No">No<br /><br />


      <input type="submit" name="submit" value="Add Catagory">
    </form>

  </div>
</div>
<?php

if (isset($_POST['submit'])) {
  //get data from the form
  $title = $_POST['title'];

  //for radio input ckeck whether buttom is select not
  if (isset($_POST['featured'])) {

    $featured = $_POST['featured'];
  } else {

    //set the default value
    $featured = "No";
  }

  if (isset($_POST['active'])) {

    $active = $_POST['active'];
  } else {

    $active = "No";
  }

  //check the image is select
  if (isset($_FILES['image']['name'])) {

    //uploade image 
    $image_name = $_FILES['image']['name'];

    //upload the image only if img is selected
    if ($image_name != "") {


      //auto rename img ovride endayadergew
      //get the extenshion of img jpg,png... eg special.jpg bihon be brake the extension and image name
      $ext = end(explode('.', $image_name));

      //rename the img
      $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;

      $source_path = $_FILES['image']['tmp_name'];

      $destination_path = "../images/category/" . $image_name;

      //upload the image
      $upload = move_uploaded_file($source_path, $destination_path);

      if ($upload == false) {
        $_SESSION['upload'] = "<div class='error'> Category Failed to Uploade</div>";
        //redirect page manage admin page
        header("location:" . SITEURL . "admin/add-catagory.php");
        //stop the process
        die();
      }
    }
  } else {

    $image_name = "";
  }


  //sql qury to save the data

  $sql = "INSERT INTO tbl_catagory SET
 title = '$title',
 image_name ='$image_name',
 featured = '$featured', 
 active ='$active'
";

  //excute query and save data in to dB
  $res = mysqli_query($conn, $sql);

  if ($res == true) {
    $_SESSION['add'] = "<div class='success'> Category Added Successfully</div>";
    //redirect page manage admin page
    header("location:" . SITEURL . "admin/manage-category.php");
  } else {

    //create a session variabel to dispaly a msg
    $_SESSION['add'] = "<div class='error'> Category Added Successfully</div>";
    //redirect page manage admin page
    header("location:" . SITEURL . "admin/add-catagory.php");
  }
}

?>