<?php
require_once ('paycon.php');
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $getway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
 
        $db->query("INSERT INTO payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
 
        //echo "Payment is successful. Your transaction id is: ". $payment_id; //</a>
        echo'<div> <img src="images/cheked.jpg" alt="" style="
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;"></div>';
        echo'<div style="
        text-align: center; 
        font-weight: bold; 
        font-size: 30px;
        font-family: "monospace;"> Payment is successful.</div>';//.$payment_id;
        echo'<h4 style="text-align: center; 
        font-weight: bold; 
        font-size: 20px"><a href="index.php" style="padding-button: 10;">Go to the homepage</a></h4>';
    } else {
        echo $response->getMessage();
    }
} else {
    echo 'Transaction is declined';
}
?>