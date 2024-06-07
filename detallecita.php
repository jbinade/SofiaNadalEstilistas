<?php

if (isset($_SESSION["rol"])) {

include("conectar_db.php");
// Asegúrate de que todas las variables estén correctamente definidas antes del uso
$categoria = isset($_REQUEST["categoria"]) ? $_REQUEST["categoria"] : '';
$servicio = isset($_REQUEST["servicio"]) ? $_REQUEST["servicio"] : '';
$dniEmpleado = isset($_REQUEST["empleado"]) ? $_REQUEST["empleado"] : '';
$fecha = isset($_REQUEST["fecha_seleccionada"]) ? $_REQUEST["fecha_seleccionada"] : '';
$hora = isset($_REQUEST["hora_seleccionada"]) ? $_REQUEST["hora_seleccionada"] : '';
$dni = $_SESSION["dni"];

try {
    $con = new Conexion();
    $conexion = $con->conectar_db();

    // Consultar si ya hay una reserva para el cliente en la hora y fecha seleccionadas
    $stmtReserva = $conexion->prepare("SELECT * FROM citas WHERE codCliente = :codCliente AND fecha = :fecha AND hora = :hora AND activo = 1");
    $stmtReserva->bindParam(':codCliente', $dni, PDO::PARAM_STR);
    $stmtReserva->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmtReserva->bindParam(':hora', $hora, PDO::PARAM_STR);
    $stmtReserva->execute();
    $reserva_existente = $stmtReserva->fetch(PDO::FETCH_ASSOC);

    if ($reserva_existente) {
        // Si hay una reserva existente, mostrar una alerta y redirigir a reservarCita.php
        echo '<script>alert("Ya tienes una reserva para esta fecha y hora.");</script>';
        echo '<script>window.location.href = "reservarCita.php";</script>';
        exit();
    }
} catch (PDOException $e) {
    echo "Error al consultar la reserva: " . $e->getMessage();
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
        try {
            $con = new Conexion();
            $conexion = $con->conectar_db();

            $stmtServicio = $conexion->prepare("SELECT * FROM servicios WHERE codigo = :codigo");
            $stmtServicio->bindParam(':codigo', $servicio, PDO::PARAM_STR);
            $stmtServicio->execute();
            $resServicio = $stmtServicio->fetch(PDO::FETCH_OBJ);

            $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
            $stmt->bindParam(':dni', $dniEmpleado, PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_OBJ);

            if ($resServicio) {
        ?>
        <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-center row-2-columns-bordered row-50">
                    <div class="col-md-10 col-lg-8">
                        <h2 class="text-center text-sm-start">Detalle de la cita</h2>

                        <div class="table-responsive">
                            <table class="table">
                               
                                <tr>
                                    <th>Servicio Seleccionado</th>
                                    <td><?php echo $resServicio->nombre; ?></td>
                                </tr>
                                <tr>
                                    <th>Precio del servicio</th>
                                    <td><?php echo $resServicio->precio; ?> .-€</td>
                                </tr>
                                <tr>
                                    <th>Fecha</th>
                                    <td><?php echo $fecha; ?></td>
                                </tr>
                                <tr>
                                    <th>Hora</th>
                                    <td><?php echo $hora; ?></td>
                                </tr>
                            </table>
                        </div>

                        <!-- Formulario para enviar los datos a realizarReserva.php -->
                        <form action="pago.php" method="post">
                            <input type="hidden" name="dniempleado" value="<?php echo $dniEmpleado; ?>">
                            <input type="hidden" name="servicio" value="<?php echo $servicio; ?>">
                            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                            <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                            <input type="hidden" name="precio" value="<?php echo $resServicio->precio; ?>">
                            
                            
                            <div class="col-12 col-lg-10">
                                 <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <button class="button button-third" type="submit">Pagar Ahora</button> 
                                <?php echo "<a href='realizarReserva.php?servicio=" . $servicio . "&fecha=" . $fecha . "&hora=" . $hora . "&precio=" . $resServicio->precio . "'><button class='button button-third' type='submit'>Pagar en Salón</button></a>";?>
                                <a href="reservarCita.php"><button class="button button-third" type="submit">Volver</button></a>
                            </div>
                        </form>

                        
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

    header("Location: login.php");

}
?>
