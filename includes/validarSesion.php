    <?php 

    if (!isset($_SESSION['documento'] )) {
    
        unset($_SESSION['documento']);
        unset($_SESSION['estado']);
        $_SESSION = array();
        session_destroy();
        session_write_close();
        echo "<script>alert('Debe ingresar sus credenciales para continuar'); window.location.href = '../../login.php';</script>";
        exit();
        
        


    }
    ?>