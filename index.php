<?php

require_once("./Controllers/rutasC.php");
require_once("./Controllers/UsuarioC.php");
require_once("./Models/UsuarioM.php");
require_once("./Models/rutasM.php");
require_once("./Models/InmuebleM.php");
require_once("./Controllers/InmuebleC.php");
require_once("./Models/SolicitudM.php");
require_once("./Controllers/SolicitudC.php");
$rutas = new RutasController();
$rutas -> plantilla();

?>