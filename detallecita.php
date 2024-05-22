<?php
include("seguridad.php");
include("conectar_db.php");
// Asegúrate de que todas las variables estén correctamente definidas antes del uso
$categoria = isset($_REQUEST["categoria"]) ? $_REQUEST["categoria"] : '';
$servicio = isset($_REQUEST["servicio"]) ? $_REQUEST["servicio"] : '';
$dniEmpleado = isset($_REQUEST["empleado"]) ? $_REQUEST["empleado"] : '';
$fecha = isset($_REQUEST["fecha_seleccionada"]) ? $_REQUEST["fecha_seleccionada"] : '';
$hora = isset($_REQUEST["hora_seleccionada"]) ? $_REQUEST["hora_seleccionada"] : '';
$dni = $_SESSION["dni"];
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
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="micuenta.php">Mi Cuenta</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Mis Reservas</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a></li>
                                    </ul>
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
                                    <th>Empleado</th>
                                    <td><?php echo $dniEmpleado; ?></td>
                                </tr>
                                <tr>
                                    <th>Servicio Seleccionado</th>
                                    <td><?php echo $resServicio->nombre; ?></td>
                                </tr>
                                <tr>
                                    <th>Precio del servicio</th>
                                    <td><?php echo $resServicio->precio . ".-€"; ?></td>
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
                        <form action="realizarReserva.php" method="post">
                            <input type="hidden" name="dniempleado" value="<?php echo $dniEmpleado; ?>">
                            <input type="hidden" name="servicio" value="<?php echo $servicio; ?>">
                            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                            <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                            <input type="hidden" name="precio" value="<?php echo $resServicio->precio; ?>">
                            <button class="button button-third" type="submit">Confirmar Cita</button>
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
                            <a class="nuevo-brand-2" href="index.php">Sofía Nadal Estilistas</a>
                        </div>
                        <div class="col-12">
                            <ul class="footer-minimal-nav">
                                <li><a href="index.php">Inicio</a></li>
                                <li><a href="reservarCita.php">Reservar Cita</a></li>
                                <li><a href="registro.php">Registrarse</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <ul class="social-list">
                                <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                                <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                                <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter" href="#"></a></li>
                                <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-google-plus" href="#"></a></li>
                                <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-vimeo" href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
