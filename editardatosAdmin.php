<?php

include("seguridad.php");
include("conectar_db.php");

$rol = $_SESSION["rol"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //array para almacenar fallos
    $fallos = array();

    $dni = $_SESSION["dni"];
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $telefono = $_REQUEST["telefono"];

    //verificar los campos

    if (empty($nombre)) {
        $fallos["nombre"] = "El nombre es obligatorio";
    }

    if (empty($apellidos)) {
        $fallos["apellidos"] = "Por favor, introduce el nombre completo";
    }

    if (!empty($telefono)) {

        if (strlen($telefono) != 9 || !is_numeric($telefono)) {
            $fallos["telefono"] = "Teléfono incorrecto";
        }
    }

    //se busca el cliente a partir del dni
    $con = new Conexion();
    $datos = $con->buscarCliente($dni);

    //si hay fallos al introducir el fomulario se vuelve a mostrar indicando el error en color rojo
    if (count($fallos) > 0) {
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
                    <h2 class="text-center text-sm-start">Editar Cuenta</h2>
                    <!-- RD Mailform-->
                        <form class="form-login" method="post" action="editardatosAdmin.php">
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="dni" type="text" name="dni" value="<?php echo $datos->dni; ?>" disabled>
                                    <label class="form-label" for="dni">DNI</label>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="nombre" type="text" name="nombre" value="<?php echo $datos->nombre; ?>" data-constraints="@Required">
                                    <label class="form-label" for="nombre">Nombre</label>
                                    <?php 
                                        if (isset($fallos["nombre"])) { 
                                            echo "<span style='color: red;'>". $fallos["nombre"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="apellidos" type="text" name="apellidos" value="<?php echo $datos->apellidos; ?>" data-constraints="@Required">
                                    <label class="form-label" for="apellidos">Apellidos</label>
                                    <?php 
                                        if (isset($fallos["apellidos"])) { 
                                            echo "<span style='color: red;'>". $fallos["apellidos"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="email" type="email" name="email" value="<?php echo $datos->email; ?>" disabled>
                                    <label class="form-label" for="email">Email</label>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="telefono" type="text" name="telefono" value="<?php echo $datos->telefono; ?>" data-constraints="@Required">
                                    <label class="form-label" for="telefono">Teléfono</label>
                                    <?php 
                                        if (isset($fallos["telefono"])) { 
                                            echo "<span style='color: red;'>". $fallos["telefono"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                
                                <div class="row justify-content-between align-items-center">
                                    <!-- Los botones estarán en fila con espacio entre ellos en escritorio y tablet -->
                                    <div class="col-12 col-sm-3 col-lg-2"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                        <input class="button button-third mb-2 mb-sm-0 boton-login" type="submit">
                                    </div>
                                    <div class="col-12 col-sm-9 col-lg-10"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                        <a href="administracion.php"><button class="button button-third" type="submit">Volver</button></a>
                                    </div>
                                </div>
                                
                        </form>
                    </div>
                </div>
                </div>
            </section>
            <!-- Page Footer-->
            <?php
              include("footer.php");
            ?>
        
<?php
        
            } else {
                
                try {
        
                    $conexion = $con->conectar_db();
                    $stmt = $conexion->prepare(
                        'UPDATE clientes SET nombre = :nombre, apellidos = :apellidos, telefono = :telefono WHERE dni = :dni');
        
                        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
                        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                        
                        
                    $stmt->execute();
        
                } catch(PDOException $e) {
                    echo 'Error al insertar el cliente: ' . $e->getMessage();
                }
        
                header("Location: administracion.php");


            }
}

?>

<?php
$dni = $_SESSION["dni"];
$con = new Conexion();
$datos = $con->buscarCliente($dni);

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
              <h2 class="text-center text-sm-start">Editar Cuenta</h2>
              <!-- RD Mailform-->
                <form class="form-login" method="post" action="editardatosAdmin.php">
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="dni" type="text" name="dni" value="<?php echo $datos->dni; ?>" disabled>
                            <label class="form-label" for="dni">DNI</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="nombre" type="text" name="nombre" value="<?php echo $datos->nombre; ?>" data-constraints="@Required">
                            <label class="form-label" for="nombre">Nombre</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="apellidos" type="text" name="apellidos" value="<?php echo $datos->apellidos; ?>" data-constraints="@Required">
                            <label class="form-label" for="apellidos">Apellidos</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="email" type="email" name="email" value="<?php echo $datos->email; ?>" disabled>
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="telefono" type="telefono" name="telefono" value="<?php echo $datos->telefono; ?>" data-constraints="@Required">
                            <label class="form-label" for="telefono">Teléfono</label>
                        </div>
                        
                        <div class="row justify-content-between align-items-center">
                            <!-- Los botones estarán en fila con espacio entre ellos en escritorio y tablet -->
                            <div class="col-12 col-sm-3 col-lg-2"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <input class="button button-third mb-2 mb-sm-0 boton-login" type="submit">
                            </div>
                            <div class="col-12 col-sm-9 col-lg-10"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <a href="administracion.php"><button class="button button-third" type="submit">Volver</button></a>
                            </div>
                        </div>
                        
                    </div>
                        
                </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <?php
        include("footer.php");
      ?>