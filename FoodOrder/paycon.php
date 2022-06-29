<?php 
require_once ('vendor/autoload.php');
//require_once "vendor/autoload.php";

//use Omnipay\Omnipay;
use Omnipay\Omnipay;

define('CLINET_ID','Ae3_soxbjxpqmUhdgW079WQYhQ4SyNlQVr2CQWL7yD472owmewMJEinYRUSs_Gyvm2VKiLIcDMUnubfD');
define('CLIENT_SECRATE','EI2FjedMWnxVtZbRtwp_LCzBSzfiqy2GvHP55Z9VJF1Pm6ukujr0Tz_E7l5M4xxPICNcGz4bHUHx0B2u');

define('PAYPAL_RETURN_URL', 'http://localhost/FinalPro/FoodOrder/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/FinalPro/FoodOrder/cancle.php');
define('PAYPAL_CURRENCY', 'USD');

//connect to the db
$db = new mysqli('localhost', 'root', '', 'paypal');
if ($db->connect_error){
    die('Connect failed:'.$db->connect_error);
}

$getway = Omnipay::create('PayPal_Rest');
$getway->setClientId(CLINET_ID);
$getway->setSecret(CLIENT_SECRATE);
$getway->setTestMode(true); //set it to 'false' when go live


?>