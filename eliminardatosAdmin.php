<?php

include("seguridad.php");

$rol = $_SESSION["rol"];

if ($rol == "usuario") {
  header("Location: index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conectar_db.php");

    $dni = $_SESSION["dni"];
    
   

    try {

        $con = new Conexion();
        $conexion = $con->conectar_db();
        $stmt = $conexion->prepare('UPDATE clientes SET activo = 0 WHERE dni = :dni');
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: salir.php");
        
    } catch(PDOException $e) {
            echo 'Error al eliminar el cliente: ' . $e->getMessage();
    }
        
      
}

?>



<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
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
                      <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administración</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="reservascliente.php">Reservas</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="menuservicios.php">Servicios</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
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
              <h2 class="text-center text-sm-start">¿Desea eliminar la cuenta?</h2>
              <!-- RD Mailform-->
              <form class="form-login" method="post" action="eliminardatosAdmin.php">
                <div class="row justify-content-between align-items-center">
                    
                            <!-- Los botones estarán en fila con espacio entre ellos en escritorio y tablet -->
                            <div class="col-12 col-sm-3 col-lg-2"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                            <input class="button button-third mb-2 mb-sm-0 boton-login" type="submit">
                            </div>
                            <div class="col-12 col-sm-9 col-lg-10"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <a href="administracion.php"><button class="button button-third" type="submit">No, volver atrás</button></a>
                            </div>
                    
                </div>
            </form>
        </div>
      </section>
      <!-- Page Footer-->
      <?php
        include("footer.php");
      ?>