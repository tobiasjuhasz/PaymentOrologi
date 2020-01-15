<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Comentar al terminar -->
    <!-- <meta http-equiv="refresh" content="5"> -->

    <!-- Global CSS -->
    <link rel="stylesheet" href="public/stylesheets/styles.css">
    <link rel="stylesheet" href="public/stylesheets/footer.css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.css">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/5e79f76e1b.js" crossorigin="anonymous"></script>

    <title>Payment - OrologiFB</title>
</head>
<?php 
    $uid = $_GET['uid'];
    $shipping = $_GET['shipping'];
?>
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
        <div class="container content-wrap mt-4" id="app">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h4 class="display-4">Métodos de pago</h4>
                        <p class="lead">Seleccione un método de pago.</p>

                        <hr class="mb-4" />

                        <div class="row w-mb-100 justify-content-center m-auto">
                            <div class="col-lg-3 col-sm-12">
                                <a class="btn btn-light btn-lg btn-block p-4 mr-2 " href="/pay.php?uid=<?php echo $uid ?>&shipping=<?php echo $shipping?>&payment_method=cash">
                                    <img src="/public/images/cash.png" width="50px" alt="" />
                                </a>
                            </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <a class="btn btn-light btn-lg btn-block" href="/pay.php?uid=<?php echo $uid ?>&shipping=<?php echo $shipping?>&payment_method=card">
                                            <img src="/public/images/credit-debit.png" alt="" width="200px" />
                                        </a>
                                    </div>
                                    <form action="procesar_pago.php" class="col-lg-3 col-sm-12" method="post">
                                        <input type="hidden" name="method" value="mercadopago">
                                        <button class="btn btn-light btn-lg btn-block p-lg-3" type="submit">
                                            <img src="/public/images/mercadopago.png" alt="" width="200px" />
                                        </button>
                                        <input type="hidden" name="amount" id="total">
                                        <input type="hidden" name="items" id="items" />

                                    </form>
                        </div>
                        <input type="hidden" name="uid" id="uid" value="<?php echo $uid ?>">

                    </div>
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

  <script src="public/javascripts/firebase.js"></script>
</html>