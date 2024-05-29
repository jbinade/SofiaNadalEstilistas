<?php
include("seguridad.php");

$servicio = $_POST["servicio"];
$precio = $_POST["precio"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$dni = $_SESSION["dni"];

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>SNEstilistas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
      .StripeElement {
        background-color: white;
        height: 40px;
        padding: 10px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
      }

      .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
      }

      .StripeElement--invalid {
        border-color: #fa755a;
      }

      .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
      }
    </style>
</head>
<body>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <div class="page">
        <header class="section page-header header-login">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-modern context-dark" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-panel">
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <div class="rd-navbar-brand">
                                    <a class="brand nuevo-brand" href="index.php">Sofía Nadal Estilistas</a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element"> 
                                <div class="rd-navbar-nav-wrap">
                                <?php

                                if (($_SESSION["rol"] == "usuario")) {
                                ?>
                                
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="micuenta.php">Mi Cuenta</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Mis Reservas</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                                    </li>
                                </ul>
                                <?php
                                } else if(($_SESSION["rol"] == "administrador")) {

                                ?>
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administración</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Reservas</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="menuservicios.php">Servicios</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                                    </li>
                                </ul>



                                <?php
                                } else {
                                ?>
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administración</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Reservas</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="menuservicios.php">Servicios</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                                    </li>
                                </ul>
                                <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <?php
      
        ?>
        <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-center row-2-columns-bordered row-50">
                    <div class="col-md-10 col-lg-8">
                        <h2 class="text-center text-sm-start mb-4">Pago de la reserva</h2>

                        <form action="CreateCharge.php" method="post" id="payment-form">
                            <div class="form-wrap rd-form-2-2">
                                <input class="form-input" id="dni" type="text" name="dni" value="<?php echo $dni; ?>" readonly>
                                <label class="form-label" for="dni">DNI</label>
                            </div>
                            <div class="form-wrap rd-form-2-2">
                                <input class="form-input" id="precio" type="number" name="precio" value="<?php echo $precio; ?>" readonly>
                            </div>
                            <input type="hidden" name="servicio" value="<?php echo $servicio; ?>">
                            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                            <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                            <div class="form-wrap rd-form-2-2 mt-4">
                                
                                <div  id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <div class="col-12 col-sm-9 col-lg-10">
                                 <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <button class="button button-third" type="submit">Pagar</button> 
                                <a href="reservarCita.php"><button class="button button-third" type="submit">Volver</button></a>
                            </div>
                        </form>

                       

                        
                    </div>
                </div>
            </div>
        </section>
      
        <footer class="section footer-minimal context-dark">
            <div class="container wow-outer">
            <div class="wow fadeIn">
                <div class="row row-50">
                <div class="col-12">
                    <!-- Brand<a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo-default-250x111.png" alt="" width="250" height="111"/><img class="brand-logo-light" src="images/logo-inverse-250x111.png" alt="" width="250" height="111"/></a> -->
                    <a class="nuevo-brand-2" href="index.php">Sofía Nadal Estilistas</a>
                </div>
                <div class="col-12">
                    <ul class="footer-minimal-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="reservarCita.php">Reservar Cita</a></li>
                    </ul>
                </div>
                <div class="col-12">
                    <ul class="social-list">
                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                    <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p" href="#"></a></li>
                    </ul>
                </div>
                </div>
                <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>Sofía Nadal Estilistas</span><span>.&nbsp;</span><span>Todos los derechos reservados.</span><span>&nbsp;</span></p>
            </div>
            </div>
        </footer>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
        <script>
            // Create a Stripe client.
            var stripe = Stripe('pk_test_51PLkGgP6f9KZ5XtHGI0mZCEZ7EufqRT5oLDFp7raIQMPeyaAnyJKujUj73ZQ2SNIdf46tAGmOZKMnegGpVfmGChV001Sp1KKFj');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
                },
                invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                displayError.textContent = event.error.message;
                } else {
                displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        </script>
            
            
    </body>
    </html>


