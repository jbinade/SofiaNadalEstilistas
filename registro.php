<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include("conectar_db.php");
    
    $con = new Conexion();

    //array para almacenar fallos
    $fallos = array();

    $dni = $_REQUEST["dni"];
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $email = $_REQUEST["email"];
    $contrasena = $_REQUEST["contrasena"];
    $activo = 1;

    $hashcontrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    //funcion para validar el dni
    function validarDNI($dni, $con) {
        $fallos = array();

        if (strlen($dni) == 9) {
            $numeros = substr($dni, 0, 8);
            $letra = strtoupper(substr($dni, 8, 1));

            $comprobarNumeros = ord($numeros);
            
            //se comprueba si hay numeros
            if ($comprobarNumeros >= 48 && $comprobarNumeros <= 57) {
                $comprobarLetra = ord($letra);
                
                //se comprueba que la letra es valida
                if (($comprobarLetra >= 65 && $comprobarLetra <= 90) || ($comprobarLetra >= 97 && $comprobarLetra <= 122)) {
                    $letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
                    $numDni = $numeros % 23;
                    $comprobarDni = $letrasDNI[$numDni];

                    if ($letra == $comprobarDni) {
                        $letra = strtoupper($letra);
                    } else {
                        $fallos["dni"] = "Letra no válida";
                    }
                } else {
                    $fallos["dni"] = "No has introducido una letra";
                }
            } else {
                $fallos["dni"] = "No has introducido números";
            }

            //$buscarDNI = $con->buscarDNI($dni);

            try {

                $conexion = $con->conectar_db();
                $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
                $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
                $stmt->execute();

               
                $dni_existe = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($dni_existe) {
                    if ($dni_existe['activo'] == 0) {
                        // Si el usuario existe pero está inactivo, permitir el registro
                        $fallos = array();
                    } else {
                        // Si el usuario existe y está activo, mostrar mensaje de error
                        $fallos["dni"] = "Este DNI ya se encuentra en la base de datos";
                    }
                }

            } catch(PDOException $e) {
                    echo 'Error al insertar el email: ' . $e->getMessage();
            }
            
            //se comprueba si el dni ya existe en la base de datos
            //if ($buscarDNI) {
                //$fallos["dni"] = "Este DNI ya se encuentra en la base de datos";
            //}
        } else {
            $fallos["dni"] = "El DNI es obligatorio";
        }

        return $fallos;
    }

    //verificar los campos
    if (empty($nombre)) {
        $fallos["nombre"] = "El nombre es obligatorio";
    }

    if (empty($apellidos)) {
        $fallos["apellidos"] = "Por favor, introduce el nombre completo";
    }

    if (empty($contrasena)) {
        $fallos["contrasena"] = "La contraseña es obligatoria";
    }

    if (empty($email) || strpos($email, " ") !== false) {
        $fallos["email"] = "El email no puede estar en blanco ni tener espacios";

    } else {
        if ($email) {

            try {

                $conexion = $con->conectar_db();
                $stmt = $conexion->prepare("SELECT * FROM clientes WHERE email = :email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

               
                $email_existe = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($email_existe) {
                    if ($email_existe['activo'] == 0) {
                        // Si el usuario existe pero está inactivo, permitir el registro
                        $fallos = array();
                    } else {
                        // Si el usuario existe y está activo, mostrar mensaje de error
                        $fallos["email"] = "Este email ya se encuentra en uso";
                    }
                }

            } catch(PDOException $e) {
                    echo 'Error al insertar el email: ' . $e->getMessage();
            }

        }

    } 
        
    $fallos = array_merge($fallos, validarDNI($dni, $con));

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
                                <h4><a href="#">1-800-123-1234</a></h4>
                                <p>You can call us anytime</p>
                            </div>
                            </div>
                        </div>
                        <div class="row-md-6 row-lg-4">
                            <div class="box-icon-modern">
                            <div class="box-icon-inner decorate-circle decorate-color-primary-light"><span class="icon-xl linearicons-map2 icon-gray-800"></span></div>
                            <div class="box-icon-caption">
                                <h4><a href="#">51 Francis Street, Darlinghurst NSW 2010, United States</a></h4>
                            </div>
                            </div>
                        </div>
                        <div class="row-md-6 row-lg-4">
                            <div class="box-icon-modern">
                            <div class="box-icon-inner decorate-rectangle decorate-color-primary-light"><span class="icon-xl linearicons-paper-plane icon-gray-800"></span></div>
                            <div class="box-icon-caption">
                                <h4><a href="#">info@demolink.org</a></h4>
                                <p>Feel free to email us your questions</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-10 col-lg-7">
                        <h2 class="text-center text-sm-start">Registro</h2>
                        <!-- RD Mailform-->
                            <form class="form-login" method="post" action="registro.php">
                                    <div class="form-wrap rd-form-2-2">
                                        <input class="form-input" id="dni" type="text" name="dni" value="<?php echo $dni; ?>" required>
                                        <label class="form-label" for="dni">DNI</label>
                                        <?php 
                                            if (isset($fallos["dni"])) { 
                                                echo "<span style='color: red;'>".$fallos["dni"]."</span>"; 
                                            } 
                                        ?>
                                    </div>
                                    <div class="form-wrap rd-form-2-2">
                                        <input class="form-input" id="nombre" type="text" name="nombre" value="<?php echo $nombre;?>" required>
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <?php 
                                            if (isset($fallos["nombre"])) { 
                                                echo "<span style='color: red;'>". $fallos["nombre"]."</span>"; 
                                            } 
                                        ?>
                                    </div>
                                    <div class="form-wrap rd-form-2-2">
                                        <input class="form-input" id="apellidos" type="text" name="apellidos" value="<?php echo $apellidos;?>" required>
                                        <label class="form-label" for="apellidos">Apellidos</label>
                                        <?php 
                                            if (isset($fallos["apellidos"])) { 
                                                echo "<span style='color: red;'>". $fallos["apellidos"]."</span>"; 
                                            } 
                                        ?>
                                    </div>
                                    <div class="form-wrap rd-form-2-2">
                                        <input class="form-input" id="email" type="email" name="email" value="<?php echo $email; ?>" required>
                                        <label class="form-label" for="email">Email</label>
                                        <?php 
                                            if (isset($fallos["email"])) { 
                                                echo "<span style='color: red;'>".$fallos["email"]."</span>"; 
                                            } 
                                        ?>
                                    </div>
                                    <div class="form-wrap rd-form-2-2">
                                        <input class="form-input" id="contrasena" type="password" name="contrasena" value="<?php echo $contrasena; ?>" required>
                                        <label class="form-label" for="contrasena">Contraseña</label>
                                        <?php 
                                            if (isset($fallos["contrasena"])) { 
                                                echo "<span style='color: red;'>".$fallos["contrasena"]."</span>"; 
                                            } 
                                        ?>
                                    </div>
                                    
                                    <div class="row justify-content-left">
                                        <div class="col-12 col-sm-7 col-lg-5">
                                            <button class="button button-third" type="submit">Registrarse</button>
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
        
<?php
        
            } else {
                
                try {

                    $conexion = $con->conectar_db();
                    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
                    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        
                        $stmtCliente = $conexion->prepare("UPDATE clientes SET nombre = :nombre, apellidos = :apellidos, email = :email, contrasena = :contrasena, activo = 1 WHERE dni = :dni");
                        $stmtCliente->bindParam(':dni', $dni, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':email', $email, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':contrasena', $hashcontrasena, PDO::PARAM_STR);
                        $stmtCliente->execute();

                        echo "<script>alert('Registro realizado correctamente. Inicie Sesión.');</script>";
                        echo '<script>window.location.href = "login.php";</script>';

                        //header("Location: index.php?registro=OK");

                    } else {
                        $stmtRegistro = $conexion->prepare(
                        'INSERT INTO clientes (dni, nombre, apellidos, email, contrasena, activo) VALUES (:dni, :nombre, :apellidos, :email, :contrasena, :activo)');
        
                        $stmtRegistro->bindParam(':dni', $dni, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':email', $email, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':contrasena', $hashcontrasena, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':activo', $activo, PDO::PARAM_STR);
                        
                        $stmtRegistro->execute();

                        echo "<script>alert('Registro realizado correctamente. Inicie Sesión.');</script>";
                        echo '<script>window.location.href = "login.php";</script>';

                        //header("Location: index.php?registro=OK");

                    }

                } catch(PDOException $e) {
                    echo 'Error al insertar el cliente: ' . $e->getMessage();
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
              <h2 class="text-center text-sm-start">Registro</h2>
              <!-- RD Mailform-->
                <form class="form-login" method="post" action="registro.php">
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="dni" type="text" name="dni" required>
                            <label class="form-label" for="dni">DNI</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="nombre" type="text" name="nombre" required>
                            <label class="form-label" for="nombre">Nombre</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="apellidos" type="text" name="apellidos" required>
                            <label class="form-label" for="apellidos">Apellidos</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="email" type="email" name="email" required>
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="contrasena" type="password" name="contrasena" required>
                            <label class="form-label" for="contrasena">Contraseña</label>
                        </div>
                        
                        <div class="row justify-content-left">
                            <div class="col-12 col-sm-7 col-lg-5">
                                <button class="button button-third" type="submit">Registrarse</button>
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