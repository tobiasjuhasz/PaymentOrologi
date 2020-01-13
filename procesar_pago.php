<?php 
    require_once __DIR__ . '/vendor/autoload.php';

    // Datos del envío 
    $nom = $_POST['Nombre'];
    $ape = $_POST['Apellido'];
    $cpo = $_POST['CPO'];
    $loc = $_POST['Localidad'];
    $dir = $_POST['Direccion'];
    $piso = $_POST['Piso'];
    $dpto = $_POST['Departamento'];
    

    // Datos del pago
    $email = $_POST['email'];
    $token = $_POST['token'];
    $installments = $_POST['installments'];
    $payment_method_id = $_POST['paymentMethodId'];
    $desc = $_POST['description'];
    $amount = $_POST['amount'];
    
    MercadoPago\SDK::setAccessToken("TEST-6540974822759376-011204-1f1514c4ee488176b1fed65bd4e0e79b-238754877");
    // //...
    // $payment = new MercadoPago\Payment();
    // $payment->transaction_amount = 110;
    // $payment->token = $token;
    // $payment->description = "OrologiFB - " . $desc;
    // $payment->installments = $installments;
    // $payment->payment_method_id = $payment_method_id;
    // $payment->payer = array(
    //     "email" => $email
    // );
    // // Save and posting the payment
    // $payment->save();
    // //...
    // // Print the payment status
    // echo $payment->status;
?>