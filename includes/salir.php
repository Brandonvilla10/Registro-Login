<?php 
   session_start();


    unset($_SESSION['documento']);
    unset($_SESSION['estado']);
    session_destroy();
    session_write_close();

    echo "<script>window.location = '../../login.php'</script>";






?>