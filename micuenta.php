<?php
include("seguridad.php");
include("conectar_db.php");

$rol = $_SESSION["rol"];

if ($rol !== "usuario") {
  header("Location: index.php");
}

try {

    $con = new Conexion();
    $conexion = $con->conectar_db();
    $dni = $_SESSION["dni"];

    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);

} catch (PDOException $e) {
    echo "Error al recuperar datos: " . $e->getMessage();

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
                      <li class="rd-nav-item"><a class="rd-nav-link" href="micuenta.php">Mi Cuenta</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Mis Reservas</a>
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
    
<?php

try {

    $con = new Conexion();
    $conexion = $con->conectar_db();
    $dni = $_SESSION["dni"];

    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);

    if ($res) {
    ?>
    <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
        <div class="container">
          <div class="row justify-content-center justify-content-lg-center row-2-columns-bordered row-50">
            <div class="col-md-10 col-lg-8">
                    <h2 class="text-center text-sm-start">MIS DATOS</h2>
              <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>DNI</th>
                            <td><?php echo $res->dni; ?></td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $res->nombre; ?></td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td><?php echo $res->apellidos; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $res->email; ?></td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td><?php echo $res->telefono; ?></td>
                        </tr>
                        <!-- Añade más filas para mostrar otros campos según lo necesites -->
                    </table>
                </div>
                <div class="row justify-content-between align-items-center">
                    <!-- Para tamaños de pantalla extra pequeños (xs) y pequeños (sm) -->
                    <div class="col-12 d-block d-sm-none"> <!-- Se mostrará en filas diferentes en xs y sm -->
                        <a href="editarmicuenta.php?dni='<?php $res->dni ?>'" class="d-block mb-3"><button class="button button-third" type="submit">Editar Cuenta</button></a>
                    </div>
                    <div class="col-12 d-block d-sm-none"> <!-- Se mostrará en filas diferentes en xs y sm -->
                        <a href="eliminarmicuenta.php" class="d-block mb-3"><button class="button button-third" type="submit">Eliminar Cuenta</button></a>
                    </div>
                    <div class="col-12 d-block d-sm-none"> <!-- Se mostrará en filas diferentes en xs y sm -->
                        <a href="resetpassword.php" class="d-block mb-3"><button class="button button-third" type="submit">Actualizar Contraseña</button></a>
                    </div>

                    <!-- Para tamaños de pantalla medianos (md) y grandes (lg) -->
                    <div class="col-sm-4 d-none d-sm-block"> <!-- Se mostrará en la misma fila en md y lg -->
                        <a href="editarmicuenta.php" class="d-block"><button class="button button-third" type="submit">Editar Cuenta</button></a>
                    </div>
                    <div class="col-sm-4 d-none d-sm-block"> <!-- Se mostrará en la misma fila en md y lg -->
                        <a href="eliminarmicuenta.php" class="d-block"><button class="button button-third" type="submit">Eliminar Cuenta</button></a>
                    </div>
                    <div class="col-sm-4 d-none d-sm-block"> <!-- Se mostrará en la misma fila en md y lg -->
                        <a href="resetpassword.php" class="d-block"><button class="button button-third" type="submit">Actualizar Contraseña</button></a>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>
    <?php
        
    }

} catch (PDOException $e) {
    echo "Error al recuperar datos: " . $e->getMessage();

}

?>
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