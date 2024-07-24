<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inmuebles || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="Views/css/master.css">
</head>

<body>
<?php

session_start();

if(!$_SESSION["Ingreso"]) {
    header("location:index.php?ruta=index");
    exit();
}
?>
    <main class="dashboard">
        <header>
            <h2>Administrar Inmuebles</h2>
            <a href="index.php?ruta=InmoDashboard" class="back"></a>
            <a href="index.php?ruta=index" class="close"></a>
        </header>
        <a href="index.php?ruta=InmoAdd" class="btn-home adicionar">+ Adicionar</a>
        <table>
            <?php
                $inmuebles = new InmuebleC();
                $inmuebles -> MostrarInmueblesInmo(); 
            ?>
        </table>
        <?php
            $eliminar = new InmuebleC();
            $eliminar ->EliminarInmueble();
        ?>
    </main>
</body>

</html>