<?php
// Mensaje que deseas registrar en el archivo de logs
$logMessage = "Se ha accedido al archivo index.php el " . date("Y-m-d H:i:s") . "\n";

// Ruta al archivo de logs
$logFile = "logs.txt";

// Abre el archivo de logs en modo de escritura (si no existe, se crea)
if ($file = fopen($logFile, "a")) {
    // Escribe el mensaje en el archivo de logs
    fwrite($file, $logMessage);

    // Cierra el archivo
    fclose($file);
} else {
    // Manejo de errores si no se puede abrir el archivo
    echo "No se pudo abrir el archivo de logs.";
}

// Resto de tu código de la aplicación
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mi Página Web</title>
</head>
<body>
    <h1>Bienvenido a mi página web</h1>
    <!-- El contenido de tu página web -->
</body>
</html>
