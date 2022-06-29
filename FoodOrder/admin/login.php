<?php include("../config/constants.php"); ?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">




</head>

<body>

  <div class="center">
    <h1>Login</h1>
    <br /><br />
    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }

    if (isset($_SESSION['no-login-message'])) {
      echo $_SESSION['no-login-message'];
      unset($_SESSION['no-login-message']);
    }
    ?>
    <br /><br />

    <form action="" method="POST">

      <div class="txt_field">
        <input input type="text" name="username" required>
        <span></span>
        <label>Username</label>
      </div>

      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>

      <div class="pass">Forgot Pssword ?</div>
      <input type="submit" name="submit" value="Login">


    </form>
  </div>

</body>

</html>
<?php


if (isset($_POST['submit'])) {
  //get data from the form

  $username = $_POST['username'];
  $password = md5($_POST['password']);

  //check the pw and un exit
  $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

  //excute the query
  $res = mysqli_query($conn, $sql);

  //count row to check the user exit or not
  $count = mysqli_num_rows($res);

  if ($count == 1) {

    $_SESSION['login'] = "<div class='alert alert-success'> Login Successful</div>";
    $_SESSION['user'] = $username; //to check user is looged in. this value is not unset bc we need to check wether the user is log or not itwill unset or destroyd in logout..
    //redirect page manage admin page
    header('location:' . SITEURL . 'admin/');
  } else {
    $_SESSION['login'] = "<div class='alert alert-danger text-center'> User Name Or Password is Didn't Match</div>";
    //redirect page manage admin page
    header('location:' . SITEURL . "admin/login.php");
  }
}
?>