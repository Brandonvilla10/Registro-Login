<?php 

class dataBase{

    private $hostname = "localhost";
    private $database =  "loginregistro";
    private $user = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar(){

        try {
            // Corrige el DSN agregando "=" después de "charset"
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            
            $opcion = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->user, $this->password, $opcion);
            
            return $pdo;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }
}

?>
