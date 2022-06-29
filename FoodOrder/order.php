<?php include('partials-front/menu.php') ?>
<?php


if (isset($_POST['submit'])) {

    //get data from the form
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty;

    $order_date = date("Y-m-d h:i:sa");

    $status = "Ordered";

    $customer_name = $_POST['full-name'];
    $customer_address = $_POST['address'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];



    //save order in db
    //crate sql to save data

    $sql2 = "INSERT INTO tbl_order SET
         food = '$food',  
         price = '$price',
         qty = '$qty',
         total = '$total',
         order_date = '$order_date',
         status = '$status',
         customer_name = '$customer_name',
         customer_contact = '$customer_contact',
         customer_email = '$customer_email',
         customer_address = '$customer_address'

        ";

    // echo $sql2; die();
    //excute the query
    $res2 = mysqli_query($conn, $sql2);

    if ($res2 == true) {
        $_SESSION['order'] = "<div class='success'> Food Ordered Successfully</div>";
        //redirect page manage admin page
        header('location:' . SITEURL);
        //header("location:".SITEURL."payment.php");
    } else {

        //create a session variabel to dispaly a msg
        $_SESSION['order'] = "<div class='error'> Food not Ordered Successfully</div>";
        //redirect page manage admin page
        header('location:' . SITEURL);
    }
}



?>

<style type="text/css">
    .food-menu-img {
        width: 29%;
        float: left;
        padding-bottom: 5%;
    }

    .food-menu-desc {
        width: 62.9%;
        float: left;
        margin-left: 8%;
    }

    .food-price {
        font-size: 1.2rem;
        margin: 2% 0;
    }

    .order-label {
        margin-bottom: 1%;
        font-weight: bold;
    }


    section {
        display: block;
    }


    .order-label {
        margin-bottom: 1%;
        font-weight: bold;
    }

    .img-curve {
        border-radius: 15px;
    }
</style>
<?php
if (isset($_GET['food_id'])) {
    //get the food id and details
    $food_id = $_GET['food_id'];

    //create the sql query
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";

    //excute the query
    $res = mysqli_query($conn, $sql);

    //check the data i savilable or not 
    $count = mysqli_num_rows($res);

    if ($count == 1) {

        //get the detail
        $row = mysqli_fetch_assoc($res);


        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        header('location:' . SITEURL);
    }
} else {
    header('location:' . SITEURL);
}

?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="order" id="order">
    <h1 class="heading"> ትዛዝዎ <span>ይፈጽሙ </span> </h1>

    <div class="row">


        <!-- <form action="charg.php" method="POST"> -->
        <form method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">

                    <?php


                    if ($image_name == "") {
                        echo "<div class='error'>Image is not.</div>";
                    } else {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" alt="" width=100% hight=30%>
                    <?php

                    }

                    ?>


                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price"><?php echo $price; ?>&nbspETB</p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="box" value="1" min="1" required>

                </div>

            </fieldset>

            <fieldset>
                <h1>Delivery Details</h1><br>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Your name" class="box" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Your Phone" class="box" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="Your Email" class="box" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="Your Street, City, Country" class="box" required></textarea>

                <input type="submit" name="submit" value="PayPal" class="btn btn-primary">

            </fieldset>

        </form>


    </div>
</section>



<?php include('partials-front/footer.php') ?>