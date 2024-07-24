<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inmo || Tu Inmueble Ideal</title>
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
            <h2>Panel de Administración</h2>
            <a href="index.php?ruta=index" class="close"></a>
        </header>
        <a href="index.php?ruta=InmoApartamentos" class="btn-home inmuebles">Inmuebles</a>
        <a href="index.php?ruta=InmoSolicitudes" class="btn-home solicitudes">Solicitudes</a>
        
    </main>
</body>

</html>