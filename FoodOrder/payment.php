<?php include('partials-front/menu.php') ?>

<section class="food-menu">
  <div class="container" style="text-align: center; padding-top: 80px;">
    <div class="col-md-5 col-sm-12 p-4 text-center">

      <!--<p>You should receive a confirmation email soon.</p>-->
      <h4><a href="index.php" style="padding-button: 10;">Go to the homepage</a></h4>
    </div>

    <div class="row justify-content-center mt-5">
      <div class="col-md-5 col-sm-12  text-center">
        <h1>Order Summery</h1><br>
        <h2><?php echo $_POST['food']; ?>&emsp;<span class="pl-3"><?php echo $_POST['price']; ?></span></h2><br><br>


        <h2 class="font-weight-bold pt-4">Total:&emsp; <?php echo $_POST['price']; ?> </h2>

      </div>
    </div>

    <div class="row justify-content-center bp-5">
      <div class="col-md-5 text-center">
        <h3>Pay Now Or Pay With Cash At Deliver</h3><br>
        <div id="paypal-button"></div>


        <!-- Include the PayPal JavaScript SDK -->

      </div>
    </div>

  </div>
</section>
<script src="https://www.paypalobjects.com/api/checkout.js?client-id=AdmP5XRctWjvFfOJWu9qeRA6_nnwgjeCY7vnHY886n2WJ9SMXkbfW996DRqds_3IP8JWQ4X2VJX7oyWr&currency=USD"></script>

<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'blue',
      shape: 'rect',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '350',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');
</script>



<?php include('partials-front/footer.php') ?>