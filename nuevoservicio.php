<?php

include("seguridad.php");
include("conectar_db.php");

$rol = $_SESSION["rol"];

if ($rol == "usuario") {
    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
    
    $con = new Conexion();

    //array para almacenar fallos
    $fallos = array();

    $codigo = $_REQUEST["codigo"];
    $nombre = $_REQUEST["nombre"];
    $descripcion = $_REQUEST["descripcion"];
    $categoria = $_REQUEST["categoria"];
    $precio = $_REQUEST["precio"];
    $activo = 1;

    // Obtengo las tres primeras letras del codigo para verificar si es correcto
    $categoriaCodigo = substr($codigo, 0, 3);
    $categoriaCodigo = strtoupper($categoriaCodigo);

    // Verifico si la categoría del código existe en la base de datos
    try {

        if (empty($codigo)) {
            $fallos["codigo"] = "El código es obligatorio";
        }
    
        $conexion = $con->conectar_db();
        // $stmt = $conexion->prepare("SELECT * FROM categorias WHERE LEFT(nombre, 3) = :categoriaCodigo");
        // $stmt->bindParam(':categoriaCodigo', $categoriaCodigo, PDO::PARAM_STR);
        // $stmt->execute();

        // if ($stmt->rowCount() == 0) {
        //     // Si no se ha encontrado ninguna categoría con las tres primeras letras del código muestro mensaje 
        //     $fallos["codigo"] = "Código Incorrecto";
        // } else {
            // Si se ha encontrado una categoría con las tres primeras letras del código se verifica si existe o no
            $stmt = $conexion->prepare("SELECT * FROM servicios WHERE codigo = :codigo");
            $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Si ya existe un artículo con el mismo código muestro mensaje
                $fallos["codigo"] = "El código ya se encuentra en la base de datos";
            }
        // }
    } catch(PDOException $e) {
        echo 'Error al verificar el código: ' . $e->getMessage();
    }

  
    if (empty($nombre)) {
        $fallos["nombre"] = "El nombre es obligatorio";
    }

    if (empty($precio)) {
        $fallos["precio"] = "El precio del servicio es obligatorio";
    }

    if (empty($categoria)) {
        $fallos["categoria"] = "La categoria del servicio es obligatoria";
    }

    if (empty($descripcion)) {
        $fallos["descripcion"] = "La descripción del servicio es obligatoria";
    }


    //si hay fallos al introducir el fomulario se vuelve a mostrar indicando el error en color rojo
    if (count($fallos) > 0) {
        
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
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administracion</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="reservas.php">Reservas</a>
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
                
            
                <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
                    <div class="container">
                    <div class="row justify-content-left justify-content-lg-between row-2-columns-bordered row-50">
                        
                        
                        <h2 class="text-center text-sm-start">Nuevo Servicio</h2>
                        <!-- RD Mailform-->
                            <form class="form-login" method="post" action="nuevoservicio.php">
                                    <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="codigo" type="text" name="codigo" value="<?php echo $codigo; ?>">
                                    <label class="form-label" for="codigo">Código</label>
                                    <?php 
                                        if (isset($fallos["codigo"])) { 
                                            echo "<span style='color: red;'>". $fallos["codigo"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="nombre" type="text" name="nombre" value="<?php echo $nombre; ?>" data-constraints="@Required">
                                    <label class="form-label" for="nombre">Nombre</label>
                                    <?php 
                                        if (isset($fallos["nombre"])) { 
                                            echo "<span style='color: red;'>". $fallos["nombre"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="descripcion" type="text" name="descripcion" value="<?php echo $descripcion; ?>" data-constraints="@Required">
                                    <label class="form-label" for="descripcion">Descripción</label>
                                    <?php 
                                        if (isset($fallos["descripcion"])) { 
                                            echo "<span style='color: red;'>". $fallos["descripcion"]."</span>"; 
                                        } 
                                    ?>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <label class="form-label" for="categoria">Categoría</label>
                                    <select class="form-input" name="categoria" id="categoria">
                                            <option value="<?php echo $categoria; ?>"><?php echo $nombre ?></option>
                                            <?php
                                            $conexion = $con->conectar_db();
                                            $stmtCategorias = $conexion->prepare("SELECT * FROM categorias");
                                            $stmtCategorias->execute();

                                            while ($categoria = $stmtCategorias->fetch(PDO::FETCH_ASSOC)) {
                                                echo '<option value="' . $categoria["codigo"] . '">' . $categoria["nombre"] . '</option>';
                                            }
                                            ?>
                                    </select>
                                    <?php 
                                            if (isset($fallos["categoria"])) { 
                                                echo "<span style='color: red;'>". $fallos["categoria"]."</span>"; 
                                            } 
                                    ?>
                                </div>
                                <div class="form-wrap rd-form-2-2">
                                    <input class="form-input" id="precio" type="number" name="precio" value="<?php echo $precio; ?>" data-constraints="@Required">
                                    <label class="form-label" for="precio">Precio</label>
                                    <?php 
                                    if (isset($fallos["precio"])) { 
                                        echo "<span style='color: red;'>". $fallos["precio"]."</span>"; 
                                    } 
                                    ?>
                                </div>
                                            
                                            <div class="row justify-content-left">
                                                <div class="col-12 col-sm-7 col-lg-5">
                                                    <button class="button button-third" type="submit">Enviar</button>
                                                </div>
                                            </div> 
                            </form>
                    
                    </div>
                    </div>
                </section>
                <!-- Page Footer-->
                <?php
                  include("footer.php");
                ?>
        
<?php
        
            } else {
                
                try {

                    $conexion = $con->conectar_db();
                    $stmt = $conexion->prepare("SELECT * FROM servicios WHERE codigo = :codigo");
                    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        
                        $stmtCliente = $conexion->prepare("UPDATE servicios SET nombre = :nombre, descripcion = :descripcion, categoria = :categoria, precio = :precio, activo = 1 WHERE codigo = :codigo");
                        $stmtCliente->bindParam(':codigo', $codigo, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                        $stmtCliente->bindParam(':precio', $precio, PDO::PARAM_STR);
                        $stmtCliente->execute();

                        header("Location: servicios.php?registro=OK");

                    } else {
                        $stmtRegistro = $conexion->prepare(
                        'INSERT INTO servicios (codigo, nombre, descripcion, categoria, precio, activo) VALUES (:codigo, :nombre, :descripcion, :categoria, :precio, :activo)');
        
                        $stmtRegistro->bindParam(':codigo', $codigo, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':precio', $precio, PDO::PARAM_STR);
                        $stmtRegistro->bindParam(':activo', $activo, PDO::PARAM_STR);
                        
                        $stmtRegistro->execute();

                        header("Location: servicios.php?registro=OK");

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
                      <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administracion</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="reservas.php">Reservas</a>
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
    
 
      <section class="section section-lg bg-gray-1 contacto-login" id="contacts">
        <div class="container">
          <div class="row justify-content-left justify-content-lg-between row-2-columns-bordered row-50">
            
            
              <h2 class="text-center text-sm-start">Nuevo Servicio</h2>
              <!-- RD Mailform-->
                <form class="form-login" method="post" action="nuevoservicio.php">
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="codigo" type="text" name="codigo" data-constraints="@Required">
                            <label class="form-label" for="codigo">Código</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="nombre" type="text" name="nombre" data-constraints="@Required">
                            <label class="form-label" for="nombre">Nombre</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="descripcion" type="text" name="descripcion" data-constraints="@Required">
                            <label class="form-label" for="descripcion">Descripción</label>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <label class="form-label" for="categoria">Categoría</label>
                            <select class="form-input" name="categoria" id="categoria">
                            <option value="">Selecciona una categoría</option>
                            <?php
                           
                        
                            $con = new Conexion();
                            $conexion = $con->conectar_db();
                            $stmtCategorias = $conexion->prepare("SELECT * FROM categorias WHERE activo = 1");
                            $stmtCategorias->execute();

                            while ($categoria = $stmtCategorias->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $categoria["codigo"] . '">' . $categoria["nombre"] . '</option>';
                            }
                            ?>
                        </select>
                        </div>
                        <div class="form-wrap rd-form-2-2">
                            <input class="form-input" id="precio" type="number" name="precio" data-constraints="@Required">
                            <label class="form-label" for="precio">Precio</label>
                        </div>
                        
                        
                        <div class="row justify-content-left">
                            <div class="col-12 col-sm-7 col-lg-5">
                                <button class="button button-third" type="submit">Enviar</button>
                            </div>
                        </div> 
                        
                </form>
            
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <?php
        include("footer.php");
      ?>