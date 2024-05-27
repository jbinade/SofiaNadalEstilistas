<?php

 

    session_start();
    include("conectar_db.php");

    // Recuperar los valores del formulario
    $dni = $_REQUEST["dni"];
    $email = $_REQUEST["email"];
    $fallos = array();
    
    // Verificar en la base de datos si existe el DNI
    $con = new Conexion();
    $conexion = $con->conectar_db();

    // Realizar la consulta para verificar el DNI
    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni AND email = :email");
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si se encontraron registros para el DNI
    if ($stmt->rowCount() > 0) {

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
            
                            <div class="col-md-10 col-lg-12">
                                <h2 class="text-center text-sm-start">Introduce tu nueva contraseña</h2>
                                <!-- RD Mailform-->
                                    <form class="form-login" method="post" action="nuevacontraseña.php">

                                        <input type="hidden" name="dni" value="<?php echo $dni ?>">
                                        <input type="hidden" name="email" value="<?php echo $email ?>">

                                        <div class="form-wrap rd-form-2-2">
                                            <input class="form-input" type="password" name="contrasena" id="contrasena"  required>
                                            
                                        </div> 
                                        
                                        <div class="row justify-content-between align-items-center">
                                                    <!-- Los botones estarán en fila con espacio entre ellos en escritorio y tablet -->
                                            <div class="col-12 col-sm-2"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                                <input class="button button-third mb-2 mb-sm-0 boton-login" type="submit">
                                            </div>
                                            <div class="col-12 col-sm-10"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                                <a href="index.php"><button class="button button-third" type="submit">Cancelar</button></a>
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
        <!-- coded by dyoma-->
        </script>
    </body>
    </html>

<?php

} else {

    $datosIncorrectos = "Datos no encontrados";
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
            
                            <div class="col-md-10 col-lg-12">
                                <h2 class="text-center text-sm-start">Nueva Contraseña</h2>
                                <!-- RD Mailform-->
                                    <form class="form-login" method="post" action="actualizarcontraseña.php">
                                        <div class="form-wrap rd-form-2-2">
                                            <input class="form-input" id="dni" type="text" name="dni" required>
                                            <label class="form-label" for="email">DNI</label>
                                        </div>
                                        <div class="form-wrap rd-form-2-2">
                                            <input class="form-input" id="email" type="email" name="email" required>
                                            <label class="form-label" for="contrasena">Email</label>
                                        </div>
                                        <?php
                                            if (isset($datosIncorrectos)) {
                                                echo '<p class="error-mensaje">' . $datosIncorrectos . '</p>';
                                            }
                                        ?> 
                                                
                                        <div class="row justify-content-between align-items-center">
                                                    <!-- Los botones estarán en fila con espacio entre ellos en escritorio y tablet -->
                                            <div class="col-12 col-sm-2"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                                <input class="button button-third mb-2 mb-sm-0 boton-login" type="submit">
                                            </div>
                                            <div class="col-12 col-sm-10"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                                <a href="index.php"><button class="button button-third" type="submit">Cancelar</button></a>
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
        <!-- coded by dyoma-->
        </script>
    </body>
    </html>

<?php

}

?>