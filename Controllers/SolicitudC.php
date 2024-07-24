<?php

class SolicitudC{
    public function MostrarSolicitudes(){
        $tablaDB = "solicitudes";
        $respuestaSolicitud = SolicitudM::mostrarsolicitudes($tablaDB);
        foreach ($respuestaSolicitud as $key => $value) {
            $respuestaUsuario = UsuarioM::mostrarUsuarioId($value["id_user"], "usuario");
            $respuestaInmueble = InmuebleM::mostrarinmueble("inmuebles", $value["id_inm"]);
            echo '
                <tr>
                <td>
                    <figure class="photo">
                        <img src="'.$respuestaInmueble["foto"].'" alt="">
                    </figure>
                    <div class="info">
                        <h3>'.$respuestaInmueble["tipo"].'</h3>                        
                        <p>'.$respuestaInmueble["ciudad"].'/'.$respuestaInmueble["barrio"].'</p>
                        <p>'.$respuestaUsuario["nombre"].' '.$respuestaUsuario["apellidos"].'</p>
                    </div>
                    <div class="controls">
                        <a href="index.php?ruta=InmoShowSolicitud&id_sol='.$value["id_sol"].'" class="show"></a>
                    </div>
                </td>
            </tr>
            ';
        }  
    }

    public function CrearSolicitud(){
        if(isset($_GET["idUsuario"])) {
            $tablaDB = "solicitudes";
            $datosU = array("id_inm" => $_GET["id"], "id_user" => $_GET["idUsuario"], "fecha" => date("Y-m-d"));
            $respuesta = SolicitudM::crearsolicitud($datosU, $tablaDB);
            if ($respuesta == "OK") {
                echo '
                <script type="text/javascript">
                    alert("Solicitud Creada");
                </script>
                ';
            } else if($respuesta == "Ya existe la solicitud") {
                echo '
                <script type="text/javascript">
                    alert("La Solicitud ya existe");
                </script>
                ';
            } else {
                echo '
                <script type="text/javascript">
                    alert("Hay un error en el sistema, intente de nuevo por favor");
                </script>
                ';
            }
        }
    }

    public function MostrarSolicitud() {
        $tablaDB = "solicitudes";
        $id_sol = $_GET["id_sol"];
        $respuesta = SolicitudM::mostrarsolicitudId($tablaDB, $id_sol);
        $respuestaUsuario = UsuarioM::mostrarUsuarioId($respuesta["id_user"], "usuario");
        $respuestaInmueble = InmuebleM::mostrarinmueble("inmuebles", $respuesta["id_inm"]);
        $precio = number_format($respuestaInmueble["precio"], 2, ',', '.');
        echo '
            <figure class="photo-preview">
                <img src="'.$respuestaInmueble["foto"].'" alt="">
            </figure>
            <div class="cont-details">
                <div>
                    <article class="info-name">
                        <p>'.$respuestaInmueble["tipo"].'</p>
                    </article>
                    <article class="info-category">
                        <p>'.$respuestaInmueble["categoria"].'</p>
                    </article>
                    <article class="info-precio">
                        <p>$'.$precio.'</p>
                    </article>
                    <article class="info-direccion">
                        <p>'.$respuestaInmueble["barrio"].'/'.$respuestaInmueble["ciudad"].'</p>
                    </article>
                    <hr>
                    <br>
                    <article class="info-fecha">
                        <p>'.$respuesta["fecha"].'</p>
                    </article>
                    <article class="info-usuario">
                        <p>'.$respuestaUsuario["nombre"].' '.$respuestaUsuario["apellidos"].'</p>
                    </article>
                    <article class="info-telefono">
                        <p>'.$respuestaUsuario["telefono"].'</p>
                    </article>
                    <article class="info-correo">
                        <p>'.$respuestaUsuario["correo"].'</p>
                    </article>
                </div>
            </div>
        ';

    }
}

?>