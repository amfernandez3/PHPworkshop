<?php
require_once("./funciones.php");
// prueba llamado clase: mensaje();

if ($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST["entrada"])){

    try {
        $salida =  generarDatos(comprobarValidezEntrada($_POST["entrada"]));
    } catch (Exception $e) {
        echo 'Datos introducidos no válidos: ',  $e->getMessage(), "\n";
    }
  
}
else{
    if(isset($_POST["entrada"])){
        generarDatos($_POST["entrada"]);
    }
    
}
if(isset($_POST["entrada"])){
    guardarSesion($_POST["entrada"]);   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        b{
            display: inline;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 1px solid black;
        }
        section{
            text-align: center;
        
            padding: 15px;
            margin: 15px;
            width: 300px;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
    <form action="" method="POST">
        <section id="cuerpoWeb">
        <caption>Introduce dos valores mayores de 0. <b>Formato: x,y</b></caption></br>
        <input type="text" name="entrada" id="entrada" value="<?php if(isset($_SESSION["entrada"])) echo $_SESSION["entrada"]?>"></br>
        <input type="submit" value="Enviar">
        </section>
        <article>
            <?php
            if(isset($salida)){
                echo $salida;
            }
            
            ?>
        </article>
    </form>
</body>
</html>