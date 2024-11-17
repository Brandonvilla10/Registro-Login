let tiempoInactividad = 1200; // 2 minutos en milisegundos
let tiempoUltimaActividad = Date.now();

function verificarInactividad() {
    let tiempoTranscurrido = Date.now() - tiempoUltimaActividad;
    
    if (tiempoTranscurrido > tiempoInactividad) {
        window.location.href = '../../login.php'; // Redirigir a la página de logout
    }
}

// Actualizar la última actividad cada vez que el usuario interactúe
window.addEventListener('mousemove', () => { tiempoUltimaActividad = Date.now(); });
window.addEventListener('keydown', () => { tiempoUltimaActividad = Date.now(); });

// Verificar inactividad cada minuto
setInterval(verificarInactividad, 60000);
