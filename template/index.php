<?php

$PageTitle="Index";

function customPageHeader(){?>
  <!--Arbitrary HTML Tags-->
<?php }
include_once('./vista/header.php');

//body contents go here

?>
<body>
    <header></header>
    <nav class="alert alert-primary" role="alert">
        <ul class="nav nav-pills">
            <li class="nav-item active">
                <a href="index.php">Index</a>
            </li>
            <li class="nav-item">
                <a href="#">Login</a>
            </li>

        </ul>
    </nav>
    <section class="alert alert-info" role="alert">
    <h1>Plantilla para ejercicios PHP</h1>
    <form action="" method="POST" class="card">
        <label for="correo">correo</label>
        <input type="email" name="correo">
        <label for="password">Password</label>
        <input type="text" name="password">
        <label for="enviar">Comprobar</label>
        <input type="submit" name="enviar" value="Enviar!">

    </form>
    </section>
<?php
// at bottom:
include_once('./vista/footer.php');
?>