<?php
session_start();
include("conectar_db.php");
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
                    <?php
                    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {

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

                    } else {
                        // Si no está autenticado, incluye el formulario de inicio de sesión
                    ?>
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="registro.php">Registrarse</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="login.php">Login</a>
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

      <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12">
                        <h2 class="text-center text-sm-start">Reserva ya tu cita</h2>
                    </div>
                    <div class="col-lg-12">
                      <form class="form-login" method="post" id="form-reserva" action="horariocita.php">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="categoria" class="text-center">Categoría:</label>
                                <select class="form-input" name="categoria" id="categoria" onchange="cargarServicios(this.value)">
                                    <option value="">Selecciona una categoría</option>
                                    <?php
                                    $con = new Conexion();
                                    $conexion = $con->conectar_db();
                                    $stmtCategorias = $conexion->prepare("SELECT * FROM categorias WHERE activo = 1");
                                    $stmtCategorias->execute();
                                    while ($categoria = $stmtCategorias->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option value="' . $categoria["codigo"] . '">' . $categoria["nombre"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="servicio" class="text-center">Servicio:</label>
                                <select class="form-input" name="servicio" id="servicio">
                                    <option value="">Selecciona un servicio</option>
                                </select>
                            </div>
                            
                            
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-12 col-lg-2 text-right">
                                <button class="button button-third" type="submit">Siguiente</button>
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
        <script src="js/scripts.js"></script>
    </body>
    </html>