<?php
include("seguridad.php");
include("conectar_db.php");

$rol = $_SESSION["rol"];

if ($rol == "usuario") {
    header("Location: index.php");
}

try {

    $con = new Conexion();
    $conexion = $con->conectar_db();
    $dni = $_SESSION["dni"];

    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE dni = :dni");
    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);

} catch (PDOException $e) {
    echo "Error al recuperar datos: " . $e->getMessage();

}
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
    
<?php

try {

    $con = new Conexion();
    $conexion = $con->conectar_db();
    $dni = $_SESSION["dni"];

    $stmt = $conexion->prepare("SELECT * FROM servicios"); 
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_OBJ);

    if ($res) {
    ?>
    <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
        <div class="container">
          <div class="row justify-content-center justify-content-lg-center row-2-columns-bordered row-50">
            <div class="col-md-10 col-lg-10">
                   
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="true" href="#">Servicios Disponibles</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="servnodisponible.php">Servicios No disponibles</a>
                          </li>                       
                        </ul>

                    </div>
                    <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        try {

                            //Limito la búsqueda de cada página
                            $PAGS = 8;

                            //inicializamos la página y el inicio para el límite de SQL
                            $pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : 1;
                            $inicio = ($pagina - 1) * $PAGS;

                            $con = new Conexion();
                            $conexion = $con->conectar_db();

                            $stmt = $conexion->prepare("SELECT * FROM servicios");
                            $stmt->execute();
                            //contar los registros y las páginas con la división entera
                            $num_total_registros = $stmt->rowCount();
                            $total_paginas = ceil($num_total_registros / $PAGS);

                            $stmt = $conexion->prepare("SELECT * FROM servicios WHERE activo = 1 LIMIT ".$inicio."," .$PAGS);
                            $stmt->execute();
                            
                            while ($res = $stmt->fetch(PDO::FETCH_OBJ)) {
                                echo "<tr>";
                                echo "<td>" . $res->codigo . "</td>";
                                echo "<td>" . $res->nombre . "</td>";
                                echo "<td>" . $res->descripcion . "</td>";
                                echo "<td>" . $res->categoria . "</td>";
                                echo "<td>" . $res->precio . "</td>";
                                echo "<td><a href='editarservicio.php?codigo=" . $res->codigo . "'><img class='imagen-tabla' src='./images/editar.png' alt='Editar'></a></td>";
                                echo "<td><a href='eliminarservicio.php?codigo=" . $res->codigo . "'><img class='imagen-tabla' src='./images/borrar.jpg' alt='Borrar'></a></td>";
                                echo "</tr>";
                                echo "</tr>";
                            }
                        echo "</table>";
                            
                        } catch (PDOException $e) {
                            echo "Error al recuperar datos: " . $e->getMessage();

                        }

                        if ($total_paginas > 1) {
                          for ($i = 1; $i <= $total_paginas; $i++) {
                              if ($pagina == $i) {
                                  // Si muestro el índice de la página actual, no coloco enlace
                                  echo $pagina . " ";
                              } else {
                                  // Si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
                                  echo "<a href='empleados.php?pagina=$i'>$i</a> ";
                              }
                          }
                      }

?>
                    </tbody>
                    </table>
                    </div>
                </div> 
                  <div class="col-12 col-sm-9 col-lg-10 mt-3"> <!-- Se ocupa la mitad del ancho en escritorio y tablet -->
                      <a href="nuevoservicio.php"><button class="button button-third" type="submit">Nuevo Servicio</button></a>
                  </div>
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
      <!-- Page Footer-->
      <?php
        include("footer.php");
      ?>