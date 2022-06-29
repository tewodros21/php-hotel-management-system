<?php include('partials/menu.php');  ?>


<?php

//check the button is clicked or not
if (isset($_POST['submit'])) {
    //get all the value from form to update
    $id = $_POST['id'];
    // $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty;

    $status = $_POST['status'];

    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];



    //sql query to update admin

    $sql2 = "UPDATE tbl_order SET
         qty = '$qty',
         total = '$total',
         status = '$status',
         customer_name = '$customer_name',
         customer_contact = '$customer_contact',
         customer_email = '$customer_email',
         customer_address = '$customer_address'
         WHERE id=$id
       ";

    //excute the query
    $res2 = mysqli_query($conn, $sql2);

    //check it is excuted
    if ($res2 == true) {
        $_SESSION['update'] = "<div class='success'>Oreder Update Successfuly </div>";
        //redirect to manage admin page
        header('location:' . SITEURL . "admin/manage-order.php");
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Order Update.</div>";
        header('location:' . SITEURL . "admin/manage-order.php");
    }
}

?>

<div class="content">
    <div class="container-fluid col-md-13">
        <h1> Update Order </h1>

        <?php
        //get the id
        $id = $_GET['id'];

        //create the sql query
        $sql = "SELECT * FROM tbl_order WHERE id=$id";

        //excute the query
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);


        //check the data id savilable or not 

        //check whether we have admin data or not
        if ($count == 1) {
            //get the detail
            $row = mysqli_fetch_assoc($res);

            $food = $row['food'];
            $price = $row['price'];
            $qty = $row['qty'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];
        } else {
            //rediret to manage admin
            header('location:' . SITEURL . "admin/manage-order.php");
        }



        ?>


        <br />

        <br /><br />
        <form action="" method="POST" enctype="multipart/form-data" class="col-md-12">
            <label>Food Name:&emsp; &emsp; &emsp;</label>
            <td><?php echo $food; ?></td><br /><br />

            <label>Price:&emsp; &emsp; &emsp;&emsp;&emsp;</label>
            <td><?php echo $price; ?> ETB</td><br /><br />

            <label> Qty : &emsp; &emsp; &emsp; &emsp; &emsp; </label>
            <input name="qty" type="number" palceholder="qty of the food" value="<?php echo $qty; ?>"><br /><br />

            <label>Status: &emsp;&emsp;&emsp;&emsp;&emsp; </label>
            <select name="status">
                <option <?php if ($status == "Ordered") {
                            echo "selected";
                        } ?> value="Ordered">ordered</option>
                <option <?php if ($status == "On Delivery") {
                            echo "selected";
                        } ?>value="On Delivery">On Delivery</option>
                <option <?php if ($status == "Delivered") {
                            echo "selected";
                        } ?>value="Delivered">Delivered</option>
                <option <?php if ($status == "Canceled") {
                            echo "selected";
                        } ?>value="Canceled">Canceled</option>
            </select><br /> <br />

            <label>Custemor Name: &emsp;</label>
            <input type="text" name="customer_name" value="<?php echo $customer_name; ?>"><br /><br />

            <label>Custemor Contact: &emsp;</label>
            <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"><br /><br />

            <label>Custemor Address: &emsp;</label>
            <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea><br /><br />

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <input type="submit" name="submit" value="Update Food">
        </form>

    </div>
</div>