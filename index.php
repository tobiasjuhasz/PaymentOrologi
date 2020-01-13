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

<body>
    <?php 
        require 'vendor/autoload.php';

        MercadoPago\SDK::setAccessToken("TEST-6540974822759376-011305-dff2cdc7ceb3b5ee8b14f0bdb61e6b1f-238754877");

    ?>
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
                    <h1 class="display-4">Pagar con tarjeta</h1>
                    <p class="lead">Complete todos los campos requeridos (<small class="text-danger">*</small>)</p>
                    <hr class="mb-4" />
                    <form action="procesar_pago.php" id="pay" method="post" name="pay">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label htmlFor="">Nombre</label> <small class="text-danger">*</small>
                                    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="" aria-describedby="helpId" required />

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label htmlFor="">Apellido</label> <small class="text-danger">*</small>
                                    <input type="text" name="Apellido" id="Apellido" class="form-control" placeholder="" aria-describedby="helpId" required />
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label htmlFor="">CPO</label> <small class="text-danger">*</small>
                                            <input type="text" name="CPO" id="CPO" class="form-control" placeholder="" aria-describedby="helpId" required />
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label htmlFor="">Localidad</label> <small class="text-danger">*</small>
                                            <input type="" name="Localidad" id="Localidad" class="form-control" placeholder="" aria-describedby="helpId" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label htmlFor="">Dirección</label> <small class="text-danger">*</small>
                                            <input type="" name="Direccion" id="Direccion" class="form-control" placeholder="" aria-describedby="helpId" required />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label htmlFor="">Piso</label>
                                            <input type="text" name="Piso" id="Piso" class="form-control" placeholder="" aria-describedby="helpId" />
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label htmlFor="">Dpto.</label>
                                            <input type="text" name="Departamento" id="Dpto" class="form-control" placeholder="" aria-describedby="helpId" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label htmlFor="email">Email</label> <small class="text-danger">*</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fa fa-envelope"></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <div class="form-group">
                                        <label htmlFor="docType">Documento</label> <small class="text-danger">*</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-id-card"></span>
                                            </div>
                                            <input type="hidden" value="DNI" id="docType" data-checkout="docType" class="form-control" />
                                            <input type="text" class="form-control" id="docNumber" data-checkout="docNumber" placeholder="12345678" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label htmlFor="cardNumber">Número de la tarjeta</label> <small class="text-danger">*</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fa fa-credit-card"></span>
                                        </div>
                                        <input type="text" id="cardNumber" data-checkout="cardNumber" class="form-control" placeholder="4509 9535 6623 3704" onPaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <div class="row col-lg-6">
                                <div class="form-group col-lg-6">
                                    <label htmlFor="securityCode">Código de seguridad</label> <small class="text-danger">*</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fa fa-key"></span>
                                        </div>
                                        <input type="text" id="securityCode" data-checkout="securityCode" class="form-control" placeholder="123" onPaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete="off" />

                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label htmlFor="cardExpirationMonth">Fecha de expiración</label> <small class="text-danger">*</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fa fa-calendar"></span>
                                        </div>
                                        <input type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" class="form-control" placeholder="mm" onPaste="return false" onCopy="return false" onCut="return false" maxlength="2" onDrag="return false" onDrop="return false" autocomplete="off"
                                        />
                                        <div class=" input-group-append">
                                            <span class=" input-group-text">/</span>
                                        </div>
                                        <input type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" class="form-control" placeholder="yyyy" onPaste="return false" onCopy="return false" onCut="return false" maxlength="4" onDrag="return false" onDrop="return false" autocomplete="off"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Titular de la tarjeta</label> <small class="text-danger">*</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-user"></span></span>
                                        </div>
                                        <input type="text" id="cardholderName" data-checkout="cardholderName" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="form-group">
                                    <label htmlFor="installments">Cuotas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <span class="fa fa-tags"></span></span>
                                        </div>
                                        <select id="installments" class="form-control" name="installments">
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="6">6</option>
                
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="amount" id="amount" />
                        <input type="hidden" name="description" />
                        <input type="hidden" name="paymentMethodId" />

                        <div class="btn-group btn-block mt-5">
                            <input type="button" value="Cancelar" class="btn btn-outline-danger border-0" />
                            <input type="submit" value="Confirmar Compra" class="btn btn-success" />
                        </div>
                    </form>
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