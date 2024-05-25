<?php

include("conectar_db.php");

if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
    $categoriaSeleccionada = $_POST['categoria'];
    $con = new Conexion();
    $conexion = $con->conectar_db();
    
    $stmtServicios = $conexion->prepare("SELECT * FROM servicios WHERE activo = 1 AND categoria = :categoria");
    $stmtServicios->bindParam(':categoria', $categoriaSeleccionada, PDO::PARAM_STR);
    $stmtServicios->execute();

    echo '<option value="">Selecciona un servicio</option>';
    while ($servicio = $stmtServicios->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $servicio["codigo"] . '">' . $servicio["nombre"] . " - " . $servicio["precio"] . ".-€" . '</option>';
    }
}
?>