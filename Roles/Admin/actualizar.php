<?php
session_start();
require_once('../../base/database.php');
include('../../includes/validarSesion.php');
$conex = new dataBase;
$con = $conex->conectar();
 ?>

<?php 

$cd = $_GET['documento'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>