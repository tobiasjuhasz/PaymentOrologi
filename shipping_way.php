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
                        <h4 class="display-4">Métodos de Envío</h4>
                        <p class="lead">Seleccione un método para retirar su producto.</p>

                        <hr class="mb-4" />

                        <div class="d-flex row justify-content-center w-100 w-mb-100 m-auto">
                            <a class="btn btn-light btn-lg col-lg-3 col-sm-12 mr-1" href="/payment_methods.php?uid=<?php echo $uid ?>&shipping=retire" >
                                Retiro en OrologiFB
                            </a>
                            <a class="btn btn-light btn-lg col-lg-3 col-sm-12 ml-1"  href="/payment_methods.php?uid=<?php echo $uid ?>&shipping=mail">
                                Envío a domicilio
                            </a>
                        </div>
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
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js">
</script>
<script src="public/javascripts/mercadopago.js"></script>

</html>