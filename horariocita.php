<?php

session_start();
include("conectar_db.php");

$con = new Conexion();
$conexion = $con->conectar_db();

function obtener_numero_empleados() {
    $con = new Conexion();
    $conexion = $con->conectar_db();
    
    $stmt = $conexion->query("SELECT COUNT(*) as total_empleados FROM clientes WHERE rol = 'empleado' AND activo = 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result['total_empleados'];
}

function obtener_horas_reservadas() {
    $con = new Conexion();
    $conexion = $con->conectar_db();
    
    // Obtener la fecha actual
    $fecha_actual = date('Y-m-d');
    
    // Preparar la consulta para contar las reservas por cada hora, incluyendo la fecha
    $stmt = $conexion->query("SELECT CONCAT(fecha, ' ', hora) as fecha_hora, COUNT(*) as total_reservas FROM citas WHERE fecha >= '$fecha_actual' GROUP BY fecha_hora");
    $horas_reservadas = [];
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $horas_reservadas[$row['fecha_hora']] = $row['total_reservas'];
    }
    
    return $horas_reservadas;
}


$categoria = isset($_REQUEST["categoria"]) ? $_REQUEST["categoria"] : '';
$servicio = isset($_REQUEST["servicio"]) ? $_REQUEST["servicio"] : '';

$dias = 14;
$horario_inicio = '10:00:00';
$horario_fin = '19:00:00';
$intervalo = 60;

$disponibilidad = [];

// Obtener las horas reservadas del backend
$horas_reservadas = obtener_horas_reservadas();
$numero_empleados = obtener_numero_empleados();

for ($i = 0; $i < $dias; $i++) {
    $dia = date('Y-m-d', strtotime("+$i days"));

    $dia_semana = date('N', strtotime($dia));
    if ($dia_semana == 7 || $dia_semana == 1) {
        // Si es domingo (7) o lunes (1), el día no está disponible para reservar
        continue;
    }

    $horas_dia = [];
    
    for ($hora = strtotime($horario_inicio); $hora < strtotime($horario_fin); $hora = strtotime("+$intervalo minutes", $hora)) {
        $hora_formateada = date('H:i:s', $hora);
        $fecha_hora = "$dia $hora_formateada";
        
        // Verificar si la hora está reservada y cuántas veces ha sido reservada
        $total_reservas = isset($horas_reservadas[$fecha_hora]) ? $horas_reservadas[$fecha_hora] : 0;
        $hora_reservada = $total_reservas >= $numero_empleados;
        // Agregar la clase "disabled" si la hora está reservada
        $clase_disponible = $hora_reservada ? 'disabled' : 'available';
        
        $horas_dia[] = [
            'hora' => $hora_formateada,
            'disponible' => !$hora_reservada // Invertir la disponibilidad para guardar solo las horas disponibles
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
            background-color: #a688cd; /* Green background for available slots */
        }
        .available:hover {
            background-color: #a688cd; /* Darker green on hover */
        }
        .disabled {
            background-color: red; /* Red background for unavailable slots */
            font-weight: bold;
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
                                            <td class="<?php echo $dia['horas'][$index]['disponible'] ? 'available' : 'disabled'; ?><?php echo $dia['horas'][$index]['disponible'] ? '' : ' reserved'; ?>" data-dia="<?php echo $dia['dia']; ?>" data-hora="<?php echo $dia['horas'][$index]['hora']; ?>">
                                                <?php echo $dia['horas'][$index]['disponible'] ? $dia['horas'][$index]['hora'] : 'No disponible'; ?>
                                            </td>

                                        <?php endforeach; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="col-12 col-sm-9 col-lg-10"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                                <a href="reservarCita.php"><button class="button button-third" type="submit">Volver</button></a>
                            </div>
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
                if (!this.classList.contains('reserved')) {
                    var dia = this.getAttribute('data-dia');
                    var hora = this.getAttribute('data-hora');
                    document.getElementById('fecha-seleccionada').value = dia;
                    document.getElementById('hora-seleccionada').value = hora;
                    document.getElementById('form-seleccion-hora').submit();
                }
            });
        });
    </script>
</body>
</html>








































