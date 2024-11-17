<?php 

require_once('base/database.php');

$conex = new dataBase;
$con = $conex->conectar();

$estado = 2;


session_start();

    // aqui declro variables para poder usarlas en php
    if (isset($_POST['registarse'])){
        $documento = $_POST['documento'];
        $username = $_POST['username'];
        $contrasena = $_POST['contrasena'];
        $tipousuario = $_POST['idTipoUsuario'];
    


    // vamos a encriptar la contraseña

    $contraseña_encriptada = password_hash($contrasena,PASSWORD_DEFAULT,array("pass"=>12));

    

    // consultar si existe el campo en la base de datos y sino entonces que no lo envie 

    $validacion = $con->prepare("SELECT * FROM usuario where documento = '$documento'");
    $validacion -> execute();

    $fila = $validacion->fetchAll(PDO::FETCH_ASSOC);

    if($fila){
        echo "<script>alert('El usuario ya existe')</script>";
        

    }
    if($documento == "" || $username == "" || $contrasena == "" || $tipousuario == "") {
        echo "<script>alert('Registro vacio')</script>"; 
    }
    else{

        // con este fragmento se hace un insert hacia la tabla de la base da datos mientras que no haya problemas de repeticion

        $query = "INSERT INTO usuario(documento,username,contraseña,tipoUsuario,idEstado) VALUES('$documento','$username','$contraseña_encriptada','$tipousuario','$estado')";

        $insert = $con->prepare($query);
        $insert->execute();
        echo "<script>alert('Registro exitoso')</script>";
        echo "<script>window.location = 'login.php' </script>";
    
    }

    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    


    <section class="tarjeta">

    <section class="seccionIzquierda">

    </section>

    <section class="seccionDerecha">
        <div class="tituloregistro">
        <h1>Registro</h1>

        <label for="">Es completamente gratis papa</label>

        </div>
        <form action="" method="post">
        <div class="inputs">

        <i for="entradaDatos">Documento</i>
        <input type="int" class="entradaDatos" name="documento" placeholder="Documento" id="">

        <i for="entradaDatos">User Name</i>
        <input type="text" class="entradaDatos" name="username" placeholder="User Name" id="">

        <i for="entradaDatos">Contraseña</i>
        <input type="password" class="entradaDatos" name="contrasena" placeholder="Contraseña" id="contrasena" maxlength="15" minlength="4">

        
        <select name="idTipoUsuario" class="entradaDatos" id="">
            <option value="">Seleccione El Rol</option>

            <?php 
            // aqui se decalra la variable sql despues llamo a la con que es la conexion con la base de datos
            // preparo la base de datos y lo que quiero hacer en este caso una consulta a todo en la tabla tipoUsuario
            // despues se ejecuta con el execute
                $sql = $con -> prepare("select * from tipouusuario where idTipoUsuario > 1");
                $sql->execute();


            // con este while se hace un recorrido por todos los campos de la lista tipo python le decimos una varibale que inicie
            // despues que va a ser igual a la variable sql que tiene los registros con el fetch se dice los elemetnos
            // y pues el metodo pdo fetchh assoc asociar algo asi
                while($fila = $sql->fetch(PDO::FETCH_ASSOC)){
                    
            // despues escribimos en la opcion el valor o VALUE donde busque el elemento de la fial bueno eso es recorrido
                    echo "<option value = " .  $fila['idTipoUsuario'] . ">" .  $fila['tipoDeUsuario']  . "</option>";
                }
            ?>
        
        </select>
            


        <input type="submit" name="registarse" value="Registrarse" class="sumit">
        </div>
        
        <a class="cambioLogin" href="login.php">Iniciar Sesion</a>

        </form>
        
    </section>

    </section>



</body>
</html>