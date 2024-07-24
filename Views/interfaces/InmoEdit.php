<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inmueble || Tu Inmueble Ideal</title>
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
    <main class="edit">
        <header>
            <h2>Modificar Inmueble</h2>
            <a href="index.php?ruta=InmoApartamentos" class="back"></a>
            <a href="index.php?ruta=index" class="close"></a>
        </header>
        <form method="post">
            <div class="select">
                <select name="tipo">
                    <option value="">Seleccione Tipo de Inmueble...</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            <div class="select">
                <select name="categoria">
                    <option value="">Seleccione Categoría...</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>
            <input type="number" placeholder="Precio..." name="precio">
            <input type="number" placeholder="Tamaño..." name="tam">
            <input type="text" placeholder="Ciudad..." name="ciudad">
            <input type="text" placeholder="Localidad/Barrio..." name="barrio">
            
            <button class="btn-home" name="btnEditar">Modificar</button>
        </form>

        <?php

            $modificar = new InmuebleC();
            $modificar -> EditarInmueble();

        ?>
    </main>
</body>
</html>