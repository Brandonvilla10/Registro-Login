<?php
session_start();
require_once('../base/database.php');

$conex = new dataBase;
$con = $conex->conectar();

        $documento = $_POST['documento'];
        $username = $_POST['username'];
        $contrasena = $_POST['contrasena'];

if($documento == "" || $username == "" || $contrasena == ""){
    echo "<script> alert('No ingreso datos')</script>";
    echo "<script> window.location = '../login.php'</script>";
    
} else{
    if(isset($_POST['logear'])){

        
    
        $sql = $con->prepare("SELECT * FROM usuario WHERE  documento = :documento");
        $sql->bindParam(':documento',$documento);
    
    
        $sql-> execute();
    
        $fila = $sql->fetch();
        if($fila && password_verify($contrasena,$fila['contraseña']) && ($fila['idEstado'] == 1 )){
               
            $_SESSION['documento'] = $fila['documento'];
            $_SESSION['estado'] = $fila['idEstado'];
            $_SESSION['tipo'] = $fila['tipoUsuario'];
    
            echo $_SESSION['documento']. '<br>' . $_SESSION['estado'], $_SESSION['tipo'] ;
    
            if ($_SESSION['tipo'] == 1){
                echo "<script>window.location = '../Roles/Admin/index.php'</script>";
            }
            if ($_SESSION['tipo'] == 2){
                echo "<script>window.location = '../Roles/Usuario/index.php'</script>";
            }
            if ($_SESSION['tipo'] == 3){
                echo "<script>window.location = '../Roles/Invitado/index.php'</script>";
            }
            
            
            
    
        }
        else{
           echo "<script>alert('Error de usuario (inactivo o error de datos)')</script>";
           echo "<script></script>";
    
            exit();
        }
    
    
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo "Se encontro un registro"; ?>

<h1>BIENVENIDO</h1>
</body>
</html>