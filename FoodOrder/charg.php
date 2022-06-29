<?php
require_once ('paycon.php');

if(isset($_POST['submit'])){
    try {
        $response = $getway->purchase(array(
            'amount' => $_POST['price'],
            'currency'=> PAYPAL_CURRENCY,
            'returnUrl'=> PAYPAL_RETURN_URL,
            'cancelUrl'=> PAYPAL_CANCEL_URL, 
        ))->send();

        if ($response->isRedirect()) {
            //forward customer to paypal
            $response->redirect();
        }else{
            //not successful
            echo $response->getMessage();
        }

    } catch(Exception $e){
        echo $e->getMessage();
    }

}
?>