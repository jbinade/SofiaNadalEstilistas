<?php

include("seguridad.php");
include("conectar_db.php");

$rol = $_SESSION["rol"];

if ($rol == "usuario") {
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
    
    $con = new Conexion();

    //array para almacenar fallos
    $fallos = array();

    $nombre = $_REQUEST["nombre"];

    $activo = 1;

    // Verifico si la categoría del código existe en la base de datos
    if (empty($nombre)) {
        $fallos["nombre"] = "El nombre de la categoría es obligatorio";

    }

    try {

        $conexion = $con->conectar_db();
        $stmt = $conexion->prepare("SELECT * FROM categorias WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();

        $nombreCategoria = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($nombreCategoria) {
                $fallos["nombre"] = "Esta categoría ya se encuentra en la base de datos";
        }
        

    } catch(PDOException $e) {
            echo 'Error al insertar el nombre: ' . $e->getMessage();
    }

    //si hay fallos al introducir el fomulario se vuelve a mostrar indicando el error en color rojo
    if (count($fallos) > 0) {
        
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
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administracion</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Reservas</a>
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
                    <div class="row justify-content-left justify-content-lg-between row-2-columns-bordered row-50">
                        
                        
                        <h2 class="text-center text-sm-start">Nueva Categoría</h2>
                        <!-- RD Mailform-->
                            <form class="form-login" method="post" action="nuevacategoria.php">
                                    
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="nombre" type="text" name="nombre" value="<?php echo $nombre; ?>" required>
                                    <label class="form-label" for="nombre">Nombre</label>
                                    <?php 
                                        if (isset($fallos["nombre"])) { 
                                            echo "<span style='color: red;'>". $fallos["nombre"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                
                               
                                            
                                <div class="row justify-content-left">
                                    <div class="col-12 col-sm-7 col-lg-5">
                                        <button class="button button-third" type="submit">Enviar</button>
                                    </div>
                                </div> 
                            </form>
                    
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
        
<?php
        
            } else {

                try {
        
                    $conexion = $con->conectar_db();
                    $stmt = $conexion->prepare(
                        'INSERT INTO categorias (nombre, activo) VALUES (:nombre, :activo)');
        
                        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmt->bindParam(':activo', $activo, PDO::PARAM_STR);
                        
                    $stmt->execute();

                    header("Location: categorias.php?categoria=OK");
        
                } catch(PDOException $e) {
                    echo 'Error al insertar la categoria: ' . $e->getMessage();
                }
        
               
            }
}

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
                      <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administracion</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Reservas</a>
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
          <div class="row justify-content-left justify-content-lg-between row-2-columns-bordered row-50">
            
            
              <h2 class="text-center text-sm-start">Nueva Categoría</h2>
              <!-- RD Mailform-->
                <form class="form-login" method="post" action="nuevacategoria.php">
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="nombre" type="text" name="nombre" pattern="[A-Za-z]+" title="Solo se permiten letras" required>
                            <label class="form-label" for="nombre">Nombre</label>
                        </div>
                        
                        
                        <div class="row justify-content-left">
                            <div class="col-12 col-sm-7 col-lg-5">
                                <button class="button button-third" type="submit">Enviar</button>
                            </div>
                        </div> 
                        
                </form>
            
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