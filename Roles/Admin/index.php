<?php
session_start();
require_once('../../base/database.php');
include('cerrarSesion.php');
include('../../includes/validarSesion.php');



$conex = new dataBase;
$con = $conex->conectar();
 ?>


<?php

$_SESSION['documento'];

$sql1 = $con->prepare("SELECT * FROM `usuario` 
INNER JOIN tipouusuario on  tipouusuario.idTipoUsuario = usuario.tipoUsuario
INNER JOIN estado on  estado.id_estado = usuario.idEstado 
WHERE documento = documento");

$sql1->execute();
$fila = $sql1->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?php echo "Bienvenido ". $fila['username'] . " " . $fila['tipoDeUsuario']  ?></h1>
    
    <a href="../../includes/salir.php">Cerrar Sesion</a>

    <a href="ver-usu.php">Ver usuarios</a>


    
<script src="../../js/js.js"></script>
</body>
</html>