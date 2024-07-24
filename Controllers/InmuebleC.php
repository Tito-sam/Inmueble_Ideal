<?php

class InmuebleC {
    public function MostrarInmueblesInmo(){
        $tablaDB = "inmuebles";
        $respuesta = InmuebleM::mostrarinmuebles($tablaDB);
        if($respuesta != false) {
            foreach ($respuesta as $key => $value) {
                $precio = number_format($value["precio"], 2, ',', '.');
                echo '
                    <tr>
                        <td>
                            <figure class="photo">
                                <img src="'.$value["foto"].'" alt="">
                            </figure>
                            <div class="info">
                                <h3>'.$value["tipo"].'</h3>
                                <h4>$'.$precio.'</h4>
                                <p>'.$value["ciudad"].'/'.$value["barrio"].'</p>
                            </div>
                            <div class="controls">    
                                <a href="index.php?ruta=InmoEdit&id='.$value["id"].'" class="edit"></a>
                                <a href="index.php?ruta=InmoApartamentos&id_eliminar='.$value["id"].'" class="delete"></a>
                            </div>
                        </td>
                </tr>
                ';
            }
        }
    }

    public function IngresarInmueble(){
        if(isset($_POST["btn-crearInmueble"]) && $_POST["tipoI"] != "" && $_POST["categoriaI"] != "" && $_POST["precioI"] != "" && $_POST["tamañoI"] != "" && $_POST["ciudadI"] != "" && $_POST["barrioI"] != "") {
            if(isset($_FILES["fotoI"]) && $_FILES["fotoI"]['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES["fotoI"]['tmp_name'];
                $fileName = $_FILES["fotoI"]['name'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

                $allowedfileExtensions = array('jpg', 'png');
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    $uploadFileDir = 'Views/imgs/';
                    $dest_path = $uploadFileDir . $newFileName;
                    if(move_uploaded_file($fileTmpPath, $dest_path)){
                        echo  "OK";
                    } else {
                        echo "Error al subir el archivo";
                    }
                }
                $datosU = array("foto" => $dest_path, "tipo" => $_POST["tipoI"], "categoria" => $_POST["categoriaI"], "precio" => $_POST["precioI"], "tamaño" => $_POST["tamañoI"], "ciudad" => $_POST["ciudadI"], "barrio" => $_POST["barrioI"]);
                $tablaDB = "inmuebles";
                $respuesta = InmuebleM::ingresarinmuebles($tablaDB, $datosU);
                if ($respuesta == "OK") {
                    header("location:index.php?ruta=InmoApartamentos");
                }
            }
        }

    }

    public function MostrarInmueblesUsuario(){
        $tablaDB = "inmuebles";
        $respuesta = InmuebleM::mostrarinmuebles($tablaDB);
        if($respuesta != false) {
            foreach ($respuesta as $key => $value) {
                $precio = number_format($value["precio"], 2, ',', '.');
                echo '
                    <div class="card-inmueble">
                        <img src="'.$value["foto"].'" alt="">
                        <div class="info-card">
                            <h4>Valor de Arriendo:</h4>
                            <h2>$'.$precio.'</h2>
                            <p>'.$value["tipo"].' - '.$value["tamaño"].'m2</p>
                            <p class="direccion">'.$value["ciudad"].'/'.$value["barrio"].'</p>
                            <a href="index.php?ruta=UserShowInmueble&id='.$value["id"].'">Ver Más</a>
                        </div>
                    </div>
                ';
            }
        }
    }

    public function MostrarInmuebleUsuario(){
        $tablaDB = "inmuebles";
        $id = $_GET["id"];
        $respuesta = InmuebleM::mostrarinmueble($tablaDB, $id);
        if($respuesta != false) {
            $precio = number_format($respuesta["precio"], 2, ',', '.');
            echo '
                <figure class="photo-preview">
                    <img src="'.$respuesta["foto"].'" alt="">
                </figure>
                <div class="cont-details">
                    <div>
                        <article class="info-name"><p>'.$respuesta["tipo"].'</p></article>
                        <article class="info-category"><p>'.$respuesta["categoria"].'</p></article>
                        <article class="info-precio"><p>$'.$precio.'</p></article>
                        <article class="info-direccion"><p>'.$respuesta["barrio"].'/'.$respuesta["ciudad"].'</p></article>
                        <article class="info-tamano"><p>'.$respuesta["tamaño"].'M2</p></article>

                        <a href="index.php?ruta=UserShowInmueble&id='.$id.'&idUsuario='.$_SESSION["idUsuario"].'" class="btn-home">Solictar cita</a>

                    </div>
                </div>
            ';
        }    
    }

    public function EditarInmueble() {
        $tablaDB = "inmuebles";
        if(isset($_POST["btnEditar"])) {
            $datosI = array("id" => $_GET["id"], "tipo" => $_POST["tipo"] != "" ? $_POST["tipo"] : null,"categoria" => $_POST["categoria"] != "" ? $_POST["categoria"] : null,"precio" => $_POST["precio"] != "" ? $_POST["precio"] : null, "tam" => $_POST["tam"] != "" ? $_POST["tam"] : null, "ciudad" => $_POST["ciudad"] != "" ? $_POST["ciudad"] : null, "barrio" => $_POST["barrio"] != "" ? $_POST["barrio"] : null);
            $respuesta = InmuebleM::editarinmueble($datosI, $tablaDB);
            if ($respuesta == "OK") {
                header("location:index.php?ruta=InmoApartamentos");
            }
        }
    }

    public function EliminarInmueble() {
        $tablaDB = "inmuebles";
        if(isset($_GET["id_eliminar"])) {
            $id = $_GET["id_eliminar"];
            $respuesta = InmuebleM::eliminarinmueble($id, $tablaDB);
            if ($respuesta == "OK") {
                header("location:index.php?ruta=InmoApartamentos");
            }
        }
    }
}

?>