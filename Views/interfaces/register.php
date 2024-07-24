<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="Views/css/master.css">
</head>

<body>
    <main class="login register" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tus Datos y Crea una Nueva. Recuerda elegir tu rol.</p>
        <form method="post">
            <input type="number" placeholder="Identificación" name="idR" required>
            <input type="text" placeholder="Nombres" name="nombreR" required>
            <input type="text" placeholder="Apellidos" name="apellidosR" required>
            <input type="number" placeholder="Teléfono" name="telefonoR" required>
            <input type="email" placeholder="Correo Electrónico" name="correoR" required>            
            <input type="password" placeholder="Contraseña" name="claveR" required>
            <div class="select">
                <select name="rolR" required>
                    <option value="">Seleccione Rol</option>
                    <option value="1">Usuario</option>
                    <option value="2">Inmobiliaria</option>
                </select>
            </div>
            <button name="btn_register">Crear Mi Cuenta</button>
        </form>
        <?php

        $ingreso = new usuarioC();
        $ingreso -> registrarusuario();

        ?>
    </main>
</body>

</html>