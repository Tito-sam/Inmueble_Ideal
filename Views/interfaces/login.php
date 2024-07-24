<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="Views/css/master.css">
</head>
<body>
    <main class="login loginInmo" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tu Email y Contraseña</p>
        <form method="post">
            <input type="email" placeholder="Correo Electrónico" name="correo" required>
            <input type="password" placeholder="Contraseña" name="clave" required>
            <button name="btn_login" >Ingresar</button>
        </form>

        <?php

        $ingreso = new usuarioC();
        $ingreso -> ingresarusuario();

        ?>
    </main>
</body>
</html>

