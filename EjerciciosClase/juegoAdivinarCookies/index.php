<?php
//include_once "./encriptadoCookies.php";
$mensaje = "";
$contador = 5;
$random = rand(0, 100);
$partidas = 0;
$partidasEncriptado = hash('sha1',$partidas);
$modificadaCookie = true;
$contadorAux = 0;
$trampa = false;

/*
//Variables encriptado:
$partidasEncriptado = $encriptar($partidas);

// Como usar las funciones para encriptar y desencriptar.
$dato = "Esta es informaciÃ³n importante";
//Encripta informaciÃ³n:
$dato_encriptado = $encriptar(urlencode($dato));
//Desencripta informaciÃ³n:
$dato_desencriptado = $desencriptar(urldecode($dato_encriptado));
$desencriptado2 = str_replace(' ','+', $dato_encriptado );
echo 'Dato encriptado: '. $dato_encriptado . '<br>';
echo 'Dato desencriptado: '. $dato_desencriptado . '<br>';
echo 'Dato desencriptado: '. $desencriptado2 . '<br>';
echo "IV generado: " . $getIV();

*/

//Si no existe la cookie contador
if (!isset($_COOKIE["contador"])) {
    setcookie("contador", $contador, time() + 3600);
    setcookie("random", $random, time() + 3600);
    //Si no existe la cookie partidas se crea.
    $mensaje = "Introduce un numero";
} else {
    //Si existe asignamos su valor a la variable contador
    $contador = $_COOKIE["contador"];
}
//Si existe la cookie partidas (HASH) comprobamos no modificado
if (isset($_COOKIE['partidas'])) {
    while($modificadaCookie && $contadorAux < 100){

        if(hash('sha1',$contadorAux) == $_COOKIE['partidas']){
            $modificadaCookie = false;
        }
        $contadorAux++;
    }
    if($modificadaCookie){
        $trampa = true;
        $partidas = 0;
    }
    else{
        $partidas = $contadorAux;
    }
    
} else {
    //Aqui solo entra cuando la cookie caduca
    setcookie('partidas', $partidasEncriptado, time() + 3600 * 24 * 30);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"]) && isset($_COOKIE["contador"]) && $_COOKIE["contador"] > 0) {
    $contador--;
    //Almacenamos en la cookie el cambio de valor.
    setcookie("contador", $contador, time() + 3600);

    if ($_COOKIE["random"] == $_POST["numero"]) {
        $mensaje = "Has acertado! felicidades.";
        setcookie("contador", "", time() - 3600);

        //Almacenamos en la cookie el cambio de valor.
       
        $partidasEncriptado = hash('sha1',$partidas);
        setcookie('partidas', $partidasEncriptado, time() + 3600 * 24 * 30);
    }
    if ($_COOKIE["random"] > $_POST["numero"]) {
        $mensaje = "El número: " . $_POST["numero"] . " es menor que el secreto";
    }
    if ($_COOKIE["random"] < $_POST["numero"]) {
        $mensaje = "El número: " . $_POST["numero"] . " es mayor que el secreto";
    }
}
if (isset($_COOKIE["contador"]) && $_COOKIE["contador"] <= 1) {
    $mensaje = "Has perdido, el número era: ". $random ;
    setcookie("contador", "", time() - 3600);
    $partidasEncriptado = hash('sha1',$partidas);
    setcookie('partidas', $partidasEncriptado, time() + 3600 * 24 * 30);
    //Almacenamos en la cookie el cambio de valor.
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            text-align: center;
            padding: 10px;
            margin-top: 15px;
        }
    </style>
    <title>Adivinar número Cookies</title>
</head>

<body>
    <h3 class="font-weight-bold" style="text-align: center;">Adivina el número secreto! (entre 0 - 100)</h3>
    <p><br> <?php echo $mensaje; ?> </p>
    <?php
    if ($contador > 0 && $mensaje != "Has acertado") {
    ?>

        <form action="" method="post">
            <input type="text" name="numero" id="numero" value="">
            <input type="submit" value="enviar">
        </form>
        <p><br> <?php echo "Intentos restantes: " . $contador; ?> </p>

    <?php
    } else {
        $partidas++;
        $_COOKIE['partidas'] = $partidas;

    ?>
        <form action="" method="post">
            <input type="submit" value="Reiniciar Juego">
        </form>


    <?php
    }
    ?>
    <?php
    //Controlador de alteración de cookie
    if (1 == 1) {
    ?>
        <p><br> <?php if($trampa){echo "Reinicio por tramposo.</br>";} echo "Partidas jugadas: " . $partidas; ?> </p>
    <?php
    } 
    //Si la Cookie fue alterada:
    else {
    ?>
    <?php
    }
    ?>
<?php

?>
</body>

</html>