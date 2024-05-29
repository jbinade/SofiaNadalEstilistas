<?php
include("seguridad.php");
include("conectar_db.php");

$servicio = $_POST["servicio"];
$precio = $_POST["precio"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$dni = $_SESSION["dni"];
$pagado = "SI";

$con = new Conexion();
$conexion = $con->conectar_db();

$stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
$stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
$stmt->execute();
$res = $stmt->fetch(PDO::FETCH_OBJ);

$stmtServicio = $conexion->prepare("SELECT * FROM servicios WHERE codigo = :codigo");
$stmtServicio->bindParam(':codigo', $servicio, PDO::PARAM_STR);
$stmtServicio->execute();
$res = $stmtServicio->fetch(PDO::FETCH_OBJ);

// Convertir el monto a centavos y asegurarse de que sea un entero
$precioEnCentimos = intval($precio * 100);


  require 'vendor/autoload.php';

  \Stripe\Stripe::setApiKey("sk_test_51PLkGgP6f9KZ5XtHE3GSaWBDzDyVDGPV6A4eYmQgYRS1q1QEdZC6Jil3Iuj6pKHhV2rdys0Cch1xfpkcJCLsFV5R00EYCBFE99");

  $token = $_POST["stripeToken"];

  $charge = \Stripe\Charge::create([
    "amount" => $precioEnCentimos,
    "currency" => "eur",
    "description" => "Reserva servicio " . $resServicio->nombre . " por cliente con DNI: " . $dni,
    "source" => $token
  ]);

  header("Location: realizarReserva.php?fecha=$fecha&servicio=$servicio&hora=$hora&preco=$precio&pagado=$pagado");
?>