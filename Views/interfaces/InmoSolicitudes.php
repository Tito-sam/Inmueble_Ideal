<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Solicitudes || Tu Inmueble Ideal</title>
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
    <main class="dashboard solicitudes">
        <header>
            <h2>Administrar Solicitudes</h2>
            <a href="index.php?ruta=InmoDashboard" class="back"></a>
            <a href="index.php?ruta=index" class="close"></a>
        </header>
        <table>
            <?php
                $solicitudes = new SolicitudC();
                $solicitudes ->MostrarSolicitudes();
            ?>
        </table>
    </main>
</body>

</html>