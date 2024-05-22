<?php
session_start();
include("conectar_db.php");

$con = new Conexion();
$conexion = $con->conectar_db();

$codigoEmpleado = $_REQUEST["empleado"]; // ID del empleado seleccionado, pasado por GET o POST
$categoria = $_REQUEST["categoria"];
$servicio = $_REQUEST["servicio"];

$dias = 10;
$horario_inicio = '10:00:00';
$horario_fin = '19:00:00';
$intervalo = 30; // intervalo en minutos

$disponibilidad = [];

for ($i = 0; $i < $dias; $i++) {
    $dia = date('Y-m-d', strtotime("+$i days"));
    $horas_dia = [];
    
    for ($hora = strtotime($horario_inicio); $hora < strtotime($horario_fin); $hora = strtotime("+$intervalo minutes", $hora)) {
        $hora_formateada = date('H:i:s', $hora);
        $fecha_hora = "$dia $hora_formateada";
        
        $stmtHorario = $conexion->prepare("SELECT COUNT(*) FROM citas WHERE empleado = :empleado AND fecha = :fecha");
        $stmtHorario->bindParam(':empleado', $codigoEmpleado, PDO::PARAM_STR);
        $stmtHorario->bindParam(':fecha', $fecha_hora, PDO::PARAM_STR);
        $stmtHorario->execute();
        $count = $stmtHorario->fetchColumn();
        
        $horas_dia[] = [
            'hora' => $hora_formateada,
            'disponible' => $count == 0
        ];
    }
    
    $disponibilidad[] = [
        'dia' => $dia,
        'horas' => $horas_dia
    ];
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Seleccionar Horario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .available {
            cursor: pointer;
            background-color: #c8e6c9; /* Green background for available slots */
        }
        .available:hover {
            background-color: #a5d6a7; /* Darker green on hover */
        }
        .disabled {
            background-color: #ffcdd2; /* Red background for unavailable slots */
            cursor: not-allowed;
        }
    </style>
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
                                    ?>
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="micuenta.php">Mi Cuenta</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Mis Reservas</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a></li>
                                    </ul>
                                    <?php
                                    } else {
                                        // Si no está autenticado, incluye el formulario de inicio de sesión
                                    ?>
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#about">About</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="#contacts">Contacto</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="login.php">Login</a></li>
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
                        <h2 class="text-center text-sm-start mb-4">Selecciona una hora disponible</h2>
                    </div>
                    <div class="col-lg-12">
                        <form id="form-seleccion-hora" action="detallecita.php" method="post">
                            <input type="hidden" id="fecha-seleccionada" name="fecha_seleccionada">
                            <input type="hidden" id="hora-seleccionada" name="hora_seleccionada">
                            <input type="hidden" id="categoria" name="categoria" value="<?php echo $categoria ?>">
                            <input type="hidden" id="servicio" name="servicio" value="<?php echo $servicio ?>">
                            <input type="hidden" id="empleado" name="empleado" value="<?php echo $codigoEmpleado ?>">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <?php foreach ($disponibilidad as $dia): ?>
                                        <th><?php echo $dia['dia']; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($disponibilidad[0]['horas'] as $index => $hora): ?>
                                    <tr>
                                        <?php foreach ($disponibilidad as $dia): ?>
                                        <td class="<?php echo $dia['horas'][$index]['disponible'] ? 'available' : 'disabled'; ?>" data-dia="<?php echo $dia['dia']; ?>" data-hora="<?php echo $dia['horas'][$index]['hora']; ?>">
                                            <?php echo $dia['horas'][$index]['disponible'] ? $dia['horas'][$index]['hora'] : 'No disponible'; ?>
                                        </td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        document.querySelectorAll('.available').forEach(function(element) {
            element.addEventListener('click', function() {
                var dia = this.getAttribute('data-dia');
                var hora = this.getAttribute('data-hora');
                document.getElementById('fecha-seleccionada').value = dia;
                document.getElementById('hora-seleccionada').value = hora;
                
                document.getElementById('form-seleccion-hora').submit();
            });
        });
        
        // Asegúrate de que las celdas deshabilitadas no sean clicables
        document.querySelectorAll('.disabled').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>
</body>
</html>



































