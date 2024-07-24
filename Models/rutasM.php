<?php

class Modelo{

    static public function RutasModelo($ruta){
        $rutasPagina = array("login","register", "UserDashboard", "InmoDashboard", "InmoApartamentos", "InmoSolicitudes", "InmoAdd", "InmoEdit", "UserShowInmueble", "InmoShowSolicitud");
        if(in_array($ruta, $rutasPagina)) {
            $pagina = "Views/interfaces/".$ruta.".php";
        } else {
            session_start();
            session_destroy();
            $_SESSION["Ingreso"] = false;
            $pagina = "Views/interfaces/index.php";
        }
        return $pagina;
    }
}

?>