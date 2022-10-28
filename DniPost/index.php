<?php

//Método comprobación de acceso por método
if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if (isset($_POST['DNI'])) {
        if ($_POST['DNI']>1 && $_POST['DNI'] < 100000000) {
            require_once("./Dni.php");
            $dni1 = new Dni();
            $dni1->setdni($_POST["DNI"]);
            $dni1->calcularLetra();
            $dniFlag = true;
        } else {
            $errorDni = true;
        }
    }
    if (isset($_POST['NIF'])) {
        $datosNif = explode("-", $_POST['NIF']);
        if ($datosNif[0]>1 && $datosNif[0] < 100000000) {
            require_once("./Dni.php");
            $dni1 = new Dni();
            $dni1->setdni($datosNif[0]);
            $dni1->calcularLetra();
            if (isset($datosNif[1])) {
                if ($dni1->getLetra() == $datosNif[1]) {
                    $nifFlag = true;
                } else {
                    $nifFlag = false;
                }
            }
            else{
                $nifFlag = false;
            }
        } else {
            $errorNif = true;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            padding: 50px;
            padding-left: 320px;
            padding-top: 100px;
            
        }
        #contenedor{
            display: flex;
            justify-content: center;
            border: solid 2px green;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">

    <h5 class="text-success">Comprobar DNI (00000000):</h5>
    <?php
    if (isset($errorDni)) {
        echo"<p>Dni introducido no válido</p>";
    }
?>
    <form class="form-group" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input  type="text" placeholder="DNI" name="DNI">
	<input class="btn btn-success" type="submit" name="submit" value="Comprobar">
</form>
<h5><?php if (isset($dniFlag)) {
    echo "El NIF ES: ". $dni1->getdni() . "-" . $dni1->getLetra();
}
?></h5>
<br>
<br>
<br>
<h5 class="text-success">Validar NIF (00000000-X):</h5>
    <?php
    if (isset($errorNif)) {
        echo"<p>NIF introducido no válido</p>";
    }
?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<input type="text" placeholder="NIF" name="NIF">
	<input  class="btn btn-success" type="submit" name="submit" value="Comprobar">
</form>
<h5></h5><?php if (isset($nifFlag) && $nifFlag) {
    echo "El NIF: ". $dni1->getdni() . "-" . $dni1->getLetra(). " es correcto";
} elseif (isset($nifFlag) && !$nifFlag) {
    echo "No es un NIF correcto";
}
?></h5>
</div>
</body>
</html>