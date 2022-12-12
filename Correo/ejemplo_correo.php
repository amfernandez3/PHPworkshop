<?php
require_once "./Envio.php";
require_once "./ControladorMailer.php";


$mensaje = "Introduce tus datos";
//Creación de instancias:
//Instancia del emisor:
if (isset($_POST["direccion"]) && isset($_POST["asunto"])&& isset($_POST["mensaje"])) {
    //echo $_POST["direccion"];
    $envio1 = new Envio($_POST["direccion"], $_POST["asunto"], $_POST["mensaje"]);
    $controladorMailer1 = new ControladorMailer();
    $controladorMailer1->envioMensaje($envio1);
} else {
    $mensaje = "Introduce bien los datos";
}




?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        section{
            margin: 0px auto;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <section>
        <h3>Introduce los datos</h3>
        <form action="" method="POST">
            <caption> tu direccion de correo</caption>
    <input type="text" name="direccion" id="direccion">
    <caption> Asunto del mensaje</caption>
    <input type="text" name="asunto" id="asunto">
    <caption>Mensaje</caption>
    <input type="textArea" name="mensaje">
    <input type="submit" value="enviar" value="Enviar">
        </form>
    </section>
 </body>
 </html>
