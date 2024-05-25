<?php
include("seguridad.php");
include("conectar_db.php");

$rol = $_SESSION["rol"];

if ($rol == "usuario") {
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
            <div class="col-md-10 col-lg-10">
                   
                <div class="card text-center">
                    <div class="card-header">

                    <?php
                      if($rol == 'administrador') {
                      ?>
                        <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="true" href="#">Mis Datos</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="empleados.php">Empleados</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="clientes.php">Clientes</a>
                          </li>
                        </ul>
                    <?php
                      } else {
                    ?>
                      <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="true" href="#">Mis Datos</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="clientes.php">Clientes</a>
                          </li>
                        </ul>
                    <?php
                      }
                    ?>                        

                    </div>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $res->dni ?></th>
                            <td><?php echo $res->nombre ?></td>
                            <td><?php echo $res->apellidos ?></td>
                            <td><?php echo $res->telefono ?></td>
                            <td><?php echo $res->email ?></td>
                    <?php
                            echo "<td><a href='editardatosAdmin.php?dni=" . $res->dni . "'><img class='imagen-tabla' src='./images/editar.png' alt='Editar'></a></td>";
                            echo "<td><a href='eliminardatosAdmin.php?dni=" . $res->dni . "'><img class='imagen-tabla' src='./images/borrar.jpg' alt='Borrar'></a></td>";
                    ?>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div> 

                <div class="col-sm-4 d-none d-sm-block mt-3"> <!-- Se mostrará en la misma fila en md y lg -->
                    <a href="resetpassword.php" class="d-block"><button class="button button-third" type="submit">Actualizar Contraseña</button></a>
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
        <!-- coded by dyoma-->
        </script>
    </body>
    </html>