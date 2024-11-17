<?php


// Duración de inactividad permitida (en segundos)
$tiempoInactividad = 120; // 2 minutos

// Verifica si hay una sesión activa y si la variable de última actividad está configurada
if (isset($_SESSION['ultima_actividad'])) {
    $tiempoTranscurrido = time() - $_SESSION['ultima_actividad'];
    
    // Si el tiempo transcurrido supera el límite, destruye la sesión
    if ($tiempoTranscurrido > $tiempoInactividad) {
        session_unset(); // Elimina las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: '../../login.php'"); // Redirige al usuario a la página de inicio de sesión
        exit();
    }
}

// Actualiza la marca de tiempo de la última actividad
$_SESSION['ultima_actividad'] = time();
?>
