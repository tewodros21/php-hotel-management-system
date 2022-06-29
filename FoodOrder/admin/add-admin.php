<?php include('partials/menu.php');  ?>


<div class="content">
  <div class="container-fluid  col-6">
    <h2 class="display-5"> Add Admin</h2> <br /> <br />

    <?php
    if (isset($_SESSION['add'])) { //checking the session is set or not
      echo $_SESSION['add']; // display session msg
      unset($_SESSION['add']); // removing session msg
    }
    ?>

    <form action="" method="POST" class="col-md-12">
      <label for="fname">&nbsp&nbspFull Name</label>
      <input type="text" class="form-control" id="fname" name="full_name" placeholder="Your Full name.." required><br />

      <label for="lname">User Name</label>
      <input type="text" class="form-control" id="lname" name="username" placeholder="Your User name.." required><br />

      <label for="lname">&nbsp&nbspPassword</label>
      <input type="password" class="form-control" id="lname" name="password" placeholder="Password" required>




      <input type="submit" name="submit" value="Add Admin">
    </form>

  </div>
</div>
<?php

if (isset($_POST['submit'])) {
  //get data from the form
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']); // passwordincription w md5

  //sql qury to save the data

  $sql = "INSERT INTO tbl_admin SET
      full_name = '$full_name',
      username = '$username', 
      password ='$password'
";

  //excute query and save data in to dB
  $res = mysqli_query($conn, $sql) or die(mysqli_error());


  //to check the data is wether inserted or not 

  if ($res == TRUE) {


    //create a session variabel to dispaly a msg
    $_SESSION['add'] = "<div class='success'> Admin Added Successfully</div>";
    //redirect page manage admin page
    header("location:" . SITEURL . "admin/manage-admin.php");
  } else {

    //create a session variabel to dispaly a msg
    $_SESSION['add'] = "  Added Admin Failed";
    //redirect page manage admin page
    header("location:" . SITEURL . "admin/add-admin.php");
  }
}

?>