<?php

if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    // Redirigir a index.php
    header("Location: index.php");
    exit; // Asegura que el script se detenga después de la redirección
}


class Cliente {

    public $dni;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $rol;
    public $email;
    public $contrasena;


    public function __construct($dni, $nombre, $apellidos, $telefono, $rol, $email, $contrasena) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->rol = $rol;
        $this->email = $email;
        $this->$contrasena = $contrasena;

    }

}


    class Conexion {

        private $host = "localhost";
        private $baseDatos = "SNEstilistas";
        private $usuario = "root";
        private $password = "";


        public function conectar_db() {

            $dsn = "mysql:host=$this->host;dbname=$this->baseDatos";

            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                $con = new PDO($dsn, $this->usuario, $this->password, $opciones);
                return $con;

            } catch(PDOException $e) {
                echo 'Error: '.$e->getMessage();
            }

        }

        public function buscarDNI($dni) {

            $con = $this->conectar_db();

                try {
                    $stmt = $con->prepare('SELECT * FROM clientes WHERE dni = :dni');
                    $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
                    $stmt->execute();

                    return $stmt->rowCount() > 0;

                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

        }

        public function buscarCliente($dni) {

            $con = $this->conectar_db();

            try {
                $stmt = $con->prepare('SELECT * FROM clientes WHERE dni = :dni');
                $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
                $stmt->execute();

                $res = $stmt->fetch(PDO::FETCH_OBJ);

                if($res) {
                    $cliente = new Cliente(
                        $res->dni,
                        $res->nombre,
                        $res->apellidos,
                        $res->telefono,
                        $res->rol,
                        $res->email,        
                        $res->contrasena
                    );

                    return $cliente;
                } else {
                    return null;
                }

            } catch(PDOException $e) {
                echo 'Error al buscar el cliente: ' . $e->getMessage();
            }

        }

        public function verificarLogin($email) {

            $con = $this->conectar_db();

            try {
                $stmt = $con->prepare('SELECT dni, nombre, rol, contrasena FROM clientes WHERE email = :email AND activo = 1');
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);

              

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }



    }

?>