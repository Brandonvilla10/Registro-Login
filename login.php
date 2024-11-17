<?php
 
require_once('base/database.php');

$conex = new dataBase;
$con = $conex->conectar();
session_start();



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    


    <section class="tarjeta">
    <section class="seccionDerecha">
        <div class="tituloregistro">
        <h1>Login</h1>

        <label for="" class="mensajito">Bienvenido De Vuelta</label>

        </div>

        <form action="../registro-login/includes/primero.php" method="post">
        <div class="inputs">

        
        <i for="entradaDatos">Documento</i>
        <input type="text" class="entradaDatos" name="documento" placeholder="Documento" id="">


        <i for="entradaDatos">User name</i>
        <input type="text" class="entradaDatos" name="username" placeholder="Username" id="">

        <i for="entradaDatos">Contraseña</i>
        <input type="password" class="entradaDatos" name="contrasena" placeholder="Contraseña" id="">

        
        

        <input type="submit" name="logear" value="Entrar" class="sumit">
        </div>
        
        <a class="cambioLogin" href="index.php">Registro</a>

        </form>
        
    </section>
    <section class="seccionIzquierda">
    </section>

    

    </section>



</body>
</html>