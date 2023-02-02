<?php
require_once("./Usuario.php");
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if (isset($_POST['correo']) && isset($_POST['password'])) {
        $usuario1 = new Usuario();
        if($_POST['correo'] == "alejandro@gmail.com" && $_POST['password'] == "abc123."){
            header('Location: addEvento.php');
        }
        else{
            echo "False" . " " . $_POST['correo'] ." ". $_POST['password'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto de una agenda</title>
</head>
<body>
    <section>
        <article>
            <h3>Formulario login</h3>
            <form action="" method="POST">
                <label for="correo"></label>
                <input type="text" name="correo">
                <label for="password"></label>
                <input type="password" name="password">
                <input type="submit" value="login">
            </form>
        </article>
    </section>
</body>
</html>