<?php 
    require __DIR__ . '/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("TEST-6540974822759376-011019-a1b37cdb577f60fd7858d07f3615607c-238754877");

    $method = $_POST['method'];
    $amount = $_POST['amount'];
    $icoded = $_POST['items'];
    $items = json_decode($icoded);
    
    $success = $_POST['success'];
    $uid = $_POST['uid'];
    $shipping = $_POST['shipping'];
    
    // Datos del envío. 
        $nom = $_POST['Nombre'];
        $ape = $_POST['Apellido'];

        // Datos del pago
        $email = $_POST['email'];
        $amount = $_POST['amount'];


    if($shipping == 'mail'){
        $cpo = $_POST['CPO'];
        $loc = $_POST['Localidad'];
        $dir = $_POST['Direccion'];
        $piso = $_POST['Piso'];
        $dpto = $_POST['Departamento'];
    }

    if($method == 'card'){
        $token = $_POST['token'];
        $installments = $_POST['installments'];
        $payment_method_id = $_POST['paymentMethodId'];
        $desc = $_POST['description'];
        
        //...
        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = floatval($amount);
        $payment->token = $token;
        $payment->description = "OrologiFB";
        $payment->installments = $installments;
        $payment->payment_method_id = $payment_method_id;
        $payment->payer = array(
            "email" => $email
        );
        // Save and posting the payment
        $payment->save();
        //...  
    }

    // if($method == 'mercadopago'){
    //     // Crea un objeto de preferencia
    //     $preference = new MercadoPago\Preference();

    //     // Crea un ítem en la preferencia
    //     // $item = new MercadoPago\Item();
    //     // $item->title = 'OrologiFB';
    //     // $item->quantity = 1;
    //     // $item->unit_price = $amount;

    //     $itemsmp = array();
    //     foreach($items as &$i){
    //         $item = new MercadoPago\Item();
    //         $item->title = "OrologiFB - ". $i->id;
    //         $item->quantity = $i->cant;
    //         $item->unit_price = $i->value;
    //         array_push($itemsmp, $item);
    //     }

    //     $preference->items = $itemsmp;
    //     $preference->save();
    // }

    if($method == 'cash'){
        $payment_method_id = $_POST['paymentMethod'];

        $payment = new MercadoPago\Payment();
        
        $payment->transaction_amount = floatval($amount);
        $payment->description = "OrologiFB";
        $payment->payment_method_id = $payment_method_id;
        $payment->payer = array(
          "email" => $email
        );
      
        $payment->save();
    }

    if($shipping == "retire"){
        $data = (object)array("method" => $method, "nombre" => $nom, "apellido" => $ape,"email" => $email, "shipping_method" => $shipping, "items" => $items, "total" => $amount);
    }
    else 
    {
        $data = (object)array(
            "method" => $method, 
            "nombre" => $nom, 
            "apellido" => $ape,
            "email" => $email,
            "cpo" => $cpo,
            "localidad" => $loc, 
            "direccion" => $dir,
            "piso" => $piso, 
            "departamento" => $dpto, 
            "shipping_method" => $shipping, 
            "items" => $items, 
            "total" => $amount
        );
    }

    $data = json_encode($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Global CSS -->
    <link rel="stylesheet" href="public/stylesheets/styles.css">
    <link rel="stylesheet" href="public/stylesheets/footer.css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.css">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/5e79f76e1b.js" crossorigin="anonymous"></script>

    <title>Payment - OrologiFB</title>
</head>
<body>
<div class="page-container">
        <!-- Nav component Beginning -->
        <div class="bg-dark sticky-top">
            <nav class="w-75 w-mb-100 m-auto navbar navbar-expand-lg navbar-dark bg-dark justify-content-between d-flex">
                <a class="navbar-brand" href="/">
                    <img src="public/images/orologifb.png" width="150" height="45" alt="" />
                </a>
                <a class="navbar-brand display-4 text-light">
                        Pagar
                </a>
            </nav>
        </div>
        <!-- Nav component End -->

        <!-- App Component Beginning -->
            <div class="content-wrap container">
                <div class="jumbotron jumbotron-fluid mt-4">
                    <?php if($method == 'card' || $success == 'true'){ ?> 
                    <?php if($payment->status = "approved") { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1 class="display-3">
                                    <span class="fa fa-check-circle text-success"></span>
                                </h1>
                                <h1 class="display-4" style="font-size:40px;">
                                    El pago se realizó con éxito.
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p class="lead">
                                    Para ver los detalles de la compra haga click <a href="">aquí</a>  
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1 class="display-3">
                                    <span class="fa fa-times-circle text-danger"></span>
                                </h1>
                                <h1 class="display-4" style="font-size:40px;">
                                    Hubo un error al realizar la compra.
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p class="lead">
                                    Intente nuevamente más tarde.
                                </p>
                                <p>
                                    Si el error persiste por favor contactenos.
                                    <a href="mailto:soporte@orologifb.com">Soporte OrologiFB</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>

                    <?php if($method == 'cash') {?>
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1 class="display-3">
                                    <span class="fa fa-check-circle text-success"></span>
                                </h1>
                                <h1 class="display-4" style="font-size:40px;">
                                    El ticket se emitió con éxito.
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p class="lead">
                                    El ticket fue enviado a su correo electrónico.
                                </p>
                                <p>
                                    Recuerde que el pago debe realizarse en un plazo de 72 horas. Si tiene alguna duda consulte a <a href="mailto:contactate@orologifb.com">Contactate OrologiFB</a>.  
                                </p>
                            </div>
                        </div>
                    </div>
                   
                    <?php } ?>

                    <input type="hidden" id="data" value="[<?php echo htmlspecialchars($data, ENT_COMPAT) ?>]">
                    <input type="hidden" id="uid" value="<?php echo $uid ?>">

                </div>
            </div>
        <!-- App Componet End -->


        <!-- Footer component Beginning -->
        <div class="footer bg-dark flex-column">
            <div class="col-md-12 copyright text-white-50">
                <img class="mastfoot-brand" width="125px" height="40px" src="public/images/orologifb.png" />
                <p>©OrologiFB - 2020. Desarrollado por <a href="http://cv.tobiasjuhasz.com">Tobias Juhasz</a></p>
                <p>Powered By <a href="https://www.mercadopago.com.ar/" target="_blank">MercadoPago</a> & <a href="#" target="_blank">Firebase</a> </p>
            </div>
        </div>
        <!-- Footer component End -->
    </div>

</body>
<!-- Scripts -->
<script src="src/jquery/jquery-3.4.1.min.js"></script>
<script src="src/bootstrap/js/bootstrap.js"></script>
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.6.2/firebase-firestore.js"></script>

  <script src="public/javascripts/procesar.js"></script>

</html>

