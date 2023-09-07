<?php
// Ruta al archivo de registro de errores
$logFile = 'logs.txt';

// Configura PHP para redirigir mensajes de error al archivo de registro
ini_set('log_errors', 1);
ini_set('error_log', $logFile);

// Mensaje de error personalizado
$errorMessage = 'Ha ocurrido un error inesperado en la aplicación.';

// Intenta ejecutar una operación que podría generar un error
$result = dividePorCero(10, 0);

// Verifica si $result contiene un valor booleano falso, lo que indica un error
if ($result === false) {
    // Obtiene información sobre el error actual
    $errorInfo = error_get_last();

    // Verifica si hay un error y si es un error de tipo E_ERROR
    if ($errorInfo !== null && $errorInfo['type'] === E_ERROR) {
        // Registra el mensaje de error en el archivo de registro
        error_log($errorMessage);

        // También puedes imprimir el mensaje de error en el navegador o realizar otras acciones
        echo $errorMessage;
    }
}

// Función personalizada que puede generar un error
function dividePorCero($numerator, $denominator) {
    if ($denominator === 0) {
        // Intentar dividir por cero generará un error
        return false;
    } else {
        return $numerator / $denominator;
    }
}
?>