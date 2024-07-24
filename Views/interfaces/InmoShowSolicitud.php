<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud || Tu Inmueble Ya</title>
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
    <main class="show">
        <header>
            <h2>Consultar Solicitud</h2>
            <a href="index.php?ruta=InmoSolicitudes" class="back"></a>
            <a href="index.php?ruta=index" class="close"></a>
        </header>
        <?php
            $solicitud = new SolicitudC();
            $solicitud ->MostrarSolicitud();
        ?>
    </main>
</body>

</html>