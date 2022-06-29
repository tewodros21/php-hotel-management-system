<?php include('partials/menu.php');  ?>


<div class="content">
  <div class="container-fluid col-md-13">
    <div class="row">
      <h2 style="margin-left: 20px;margin-top: 5px; navbar-expand: navbar-white navbar-light; font:small" Luacida Grande,Arial,sans-serif;> DASHBORD</h2>
      <br /><br />
      <?php
      if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }
      ?>
      <br /><br />

      <div class="col-4 text-center">

        <?php
        //sql query
        $sql = "SELECT * FROM tbl_catagory";
        //excute query
        $res = mysqli_query($conn, $sql);
        //count row
        $count = mysqli_num_rows($res);
        ?>
        <h1><?php echo $count; ?></h1>
        <br />
        Catagory
      </div>


      <div class="col-4 text-center">

        <?php
        //sql query
        $sql2 = "SELECT * FROM tbl_food";
        //excute query
        $res2 = mysqli_query($conn, $sql2);
        //count row
        $count2 = mysqli_num_rows($res2);
        ?>
        <h1><?php echo $count2; ?></h1>
        <br />
        Foods
      </div>

      <div class="col-4 text-center">
        <?php
        //sql query
        $sql3 = "SELECT * FROM tbl_order";
        //excute query
        $res3 = mysqli_query($conn, $sql3);
        //count row
        $count3 = mysqli_num_rows($res3);
        ?>
        <h1><?php echo $count3; ?></h1>
        <br />
        total Order
      </div>

      <div class="col-4 text-center">
        <?php
        //create sql query to get total generated
        //aggregate fun in sql
        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

        //excute query
        $res4 = mysqli_query($conn, $sql4);

        //get the value
        $row4 = mysqli_fetch_assoc($res4);

        //get total revenu
        $total_revenue = $row4['Total'];

        ?>
        <h1><?php echo $total_revenue; ?> ETB</h1>
        <br />
        Revenu Generated
      </div>
      <div class="row">
        <div class="" id="piechart" style="width: 700.5px; height: 450px;"></div>

      </div>
    </div>

  </div>





</div>



<div class="clearfix"></div>



</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Catagory', 11],
      ['Foods', 2],
      ['total Order', 2],
      ['Watch TV', 2],
      ['Sleep', 7]
    ]);

    var options = {
      title: 'Admin'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Work', 11],
      ['Eat', 2],
      ['Commute', 2],
      ['Watch TV', 2],
      ['Sleep', 7]
    ]);

    var options = {
      title: 'Student',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>