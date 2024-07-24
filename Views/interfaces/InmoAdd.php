<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inmueble || Tu Inmueble Ideal</title>
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
    <main class="add">
        <header>
            <h2>Adicionar Inmueble</h2>
            <a href="index.php?ruta=InmoApartamentos" class="back"></a>
            <a href="index.php?ruta=index" class="close"></a>
        </header>
        <form enctype="multipart/form-data" method="post">
            <input type="file" class="upload" aria-describedby="Foto Inmueble" name="fotoI" required>
            <div class="select">
                <select name="tipoI" required>
                    <option value="">Seleccione Tipo de Inmueble...</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            <div class="select">
                <select name="categoriaI" required>
                    <option value="">Seleccione Categoría...</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>
            <input type="number" name="precioI" placeholder="Precio..." required>
            <input type="number" name="tamañoI" placeholder="Tamaño..." required>
            <input type="text" name="ciudadI" placeholder="Ciudad..." required>
            <input type="text" name="barrioI" placeholder="Localidad/Barrio..." required>
            
            <button class="btn-home" name="btn-crearInmueble">Guardar</button>
        </form>

        <?php
            $ingresar = new InmuebleC();
            $ingresar -> IngresarInmueble();
        ?>
    </main>
</body>

</html>