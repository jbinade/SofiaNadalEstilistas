<?php
include("seguridad.php");

include("conectar_db.php");

$dni = $_SESSION["dni"];
$estado = "Confirmada";
$activo = 1;


$servicio = $_POST["servicio"];
$precio = $_POST["precio"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];


try {
    $con = new Conexion();
    $conexion = $con->conectar_db();

    $stmt = $conexion->prepare(
        'INSERT INTO citas (fecha, hora, total, estado, codCliente, servicio, activo) 
        VALUES (:fecha, :hora, :total, :estado, :codCliente, :servicio, :activo)'
    );

    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':hora', $hora, PDO::PARAM_STR);
    $stmt->bindParam(':total', $precio, PDO::PARAM_STR);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    $stmt->bindParam(':codCliente', $dni, PDO::PARAM_STR);
    $stmt->bindParam(':servicio', $servicio, PDO::PARAM_STR);
    $stmt->bindParam(':activo', $activo, PDO::PARAM_STR);


    if ($stmt->execute()) {
        header("Location: confirmacioncita.php?fecha=$fecha&hora=$hora");
        exit();
    } else {
        echo "Error al insertar la cita";
    }
} catch (PDOException $e) {
    echo "Error al procesar la cita: " . $e->getMessage();
}
?>





