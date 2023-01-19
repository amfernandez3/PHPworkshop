<?php
require_once("./funciones.php");
// prueba llamado clase: mensaje();

if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["entrada"])){

  if(comprobarCuentaBancaria($_POST["entrada"])){
    echo "La cuenta es válida";
  }
  else{
    echo "</br>La cuenta no es válida";
  }
}

if(isset($_POST["entrada"])){
    guardarCookie($_POST["entrada"]);   
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
    <h1>Ejercicio 2</h1>
    <form action="" method="POST">
        <section id="cuerpoWeb">
        <caption>Comprobar cuenta bancaria</caption></br>
        <input type="text" name="entrada" id="entrada" value="<?php if(isset($_COOKIE["cuenta"])) echo $_COOKIE["cuenta"]?>"></br>
        <input type="submit" value="Comprobar">
        </section>
        <article>
          
        </article>
    </form>
</body>
</html>