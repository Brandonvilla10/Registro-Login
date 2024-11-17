<?php


include('cerrarSesion.php');

session_start();
include('../../includes/validarSesion.php');
require_once('../../base/database.php');
$conex = new dataBase;
$con = $conex->conectar();
 ?>

<?php



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    
    <table border="2">
        <tr>
            <td>Documento</td>
            <td>User Name</td>
            <td>Tipo De Usuario</td>
            <td>Estado</td>
            <td>//:://</td>
        </tr>

        <?php
    


    $sql1 = $con->prepare("SELECT * FROM `usuario` 
    INNER JOIN tipouusuario on  tipouusuario.idTipoUsuario = usuario.tipoUsuario
    INNER JOIN estado on  estado.id_estado = usuario.idEstado");
    
    $sql1->execute();
    $fila = $sql1->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($fila as $resu ){

    

    ?>

        <tr>
            <td><input type="text" readonly value="<?php echo $resu['documento']; ?>"></td>
            <td><input type="text" readonly value="<?php echo $resu['username']; ?>"></td>
            <td><input type="text" readonly value="<?php echo $resu['tipoDeUsuario']; ?>"></td>
            <td><input type="text" readonly value="<?php echo $resu['nombreEstado']; ?>"></td>
            <td><a href="" onclick="window.open('actualizar.php?id=<?php echo $resu['documento'];?>','','width=300 height=300 toolbar=NO')"><img src="" alt="">Actualizar</a> <a href="">Eliminar</a></td>
        </tr>


    <?php

    }?>


    </table>
  
    <a href="index.php">Volver</a>


</body>
</html>