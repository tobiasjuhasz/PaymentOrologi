<?php 
    require_once 'vendor/autoload.php';

    

    MercadoPago\SDK::setAccessToken("ENV_ACCESS_TOKEN");
    //...
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 110;
    $payment->token = "ff8080814c11e237014c1ff593b57b4d";
    $payment->description = "Awesome Iron Gloves";
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
    "email" => "holden.kozey@gmail.com"
    );
    // Save and posting the payment
    $payment->save();
    //...
    // Print the payment status
    echo $payment->status;
    
?>