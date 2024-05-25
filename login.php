<?php

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
      <!-- Page Header-->
      <header class="section page-header header-login">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern context-dark" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!-- Brand<a class="brand" href="index.php"><img class="brand-logo-dark" src="images/mujer-con-pelo-largo(1).png" alt="" width="250" height="111"/><img class="brand-logo-light" src="images/mujer-con-pelo-largo(1).png" alt="" width="250" height="111"/></a> -->
                    <a class="brand nuevo-brand" href="index.php">Sofía Nadal Estilistas</a>
                  </div>
                </div>
                <div class="rd-navbar-main-element"> 
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="registro.php">Registrarse</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="login.php">Login</a>
                      </li>
                    </ul>
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
    
 
      <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
        <div class="container">
          <div class="row justify-content-left justify-content-lg-between row-2-columns-bordered row-50">
            <div class="col-md-10 col-lg-4">
              <h2 class="text-center text-sm-start">CONTACTO</h2>
              <div class="row-md-6 row-lg-4">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-triangle decorate-color-primary-light"><span class="icon-xl linearicons-phone-incoming icon-gray-800"></span></div>
                  <div class="box-icon-caption">
                    <h4><a href="#">633 444 111</a></h4>
                    <p>Contacta con nosotros en nuestro horario de 10:00 a 19:00</p>
                  </div>
                </div>
              </div>
              <div class="row-md-6 row-lg-4">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-circle decorate-color-primary-light"><span class="icon-xl linearicons-map2 icon-gray-800"></span></div>
                  <div class="box-icon-caption">
                    <h4><a href="#">C/ Mayor 35, 03160 Almoradí, Alicante</a></h4>
                  </div>
                </div>
              </div>
              <div class="row-md-6 row-lg-4">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-rectangle decorate-color-primary-light"><span class="icon-xl linearicons-paper-plane icon-gray-800"></span></div>
                  <div class="box-icon-caption">
                    <h4><a href="#">snestilistas@correo.com</a></h4>
                    <p>Email de contacto para cualquier duda o sugerencia</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-10 col-lg-7">
              <h2 class="text-center text-sm-start">INICIAR SESIÓN</h2>
              <!-- RD Mailform-->
                <form class="form-login" method="post" action="conexion.php">
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="email" type="email" name="email" data-constraints="@Email @Required">
                            <label class="form-label" for="email">Email</label>
                            </div>
                            <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="contrasena" type="password" name="contrasena" data-constraints="@Required">
                            <label class="form-label" for="contrasena">Contraseña</label>
                            </div>
                        
                        <!-- <div class="row justify-content-left">
                        <div class="col-12 col-sm-7 col-lg-5">
                            <button class="button button-third" type="submit">Enviar</button>
                            <button class="button button-third" type="submit">Registrarse</button>
                        </div>
                        </div> -->
                        <?php
                            if (isset($_GET['error']) && $_GET['error'] == 1) {
                                echo '<p class="mensaje-login">Datos Incorrectos</p>';
                            }
                        ?>
                        <div class="row justify-content-between align-items-center">
                            <!-- Los botones estarán en fila con espacio entre ellos en escritorio y tablet -->
                            <div class="col-12 col-sm-3"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <input class="button button-third mb-2 mb-sm-0 boton-login" type="submit">
                            </div>
                            <div class="col-12 col-sm-4"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <a href="registro.php"><button class="button button-third" type="submit">Registrarse</button></a>
                            </div>
                            <div class="col-12 col-sm-5"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <a href="cambiocontraseña.php"><button class="button button-third" type="submit">Actualizar Contraseña</button></a>
                            </div>
                        </div>
                </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
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
        <script src="js/script.js">
        
        </script>
    </body>
    </html>