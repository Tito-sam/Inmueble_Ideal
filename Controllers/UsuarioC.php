<?php

    class UsuarioC{
        public function ingresarusuario(){
            if(isset($_POST["btn_login"])){
                if($_POST["correo"] != "" && $_POST["clave"] != "") {
                    $datosU = array("correo" => $_POST["correo"]);
                    $tablaDB = "usuario";
                    
                    $respuesta = UsuarioM::ingresoUsuario($datosU,$tablaDB);
                    if($respuesta != false) {
                        echo "hola";
                        if($respuesta["correo"] == $_POST["correo"] && $respuesta["clave"] == md5($_POST["clave"])) {
                            session_start();
        
                            $_SESSION["Ingreso"] = true;
                            $_SESSION["idUsuario"] = $respuesta["id"];
                            if ($respuesta["rol"] == "Inmobiliaria") {
                                header("location:index.php?ruta=InmoDashboard");
                            }
                            else {
                                header("location:index.php?ruta=UserDashboard");
                            }
                        } else {
                            echo '
                            <script type="text/javascript">
                                alert("La Contraseña no es la correcta");
                            </script>
                            ';
                        }
                    } else {
                        header("location:index.php?ruta=register");
                    }
                } 
            } 
        }

        public function registrarusuario(){
            if(isset($_POST["btn_register"])) {
                if ($_POST["idR"] != "" && $_POST["nombreR"] != "" && $_POST["apellidosR"] != "" && $_POST["telefonoR"] != "" && $_POST["correoR"] != "" && $_POST["claveR"] != "" && $_POST["rolR"] != "") {
                    if ($_POST["rolR"]  != "") {
                        if($_POST["rolR"] == "1") {
                            $rol = "Usuario";
                        } else {
                            $rol = "Inmobiliaria";
                        }
                    }
                    $datosU = array("id" => $_POST["idR"], "nombre" => $_POST["nombreR"],  "apellidos" => $_POST["apellidosR"],  "telefono" => $_POST["telefonoR"],  "correo" => $_POST["correoR"],  "clave" => md5($_POST["claveR"]),  "rol" => $rol);
                    $tablaDB = "usuario";
    
                    $respuesta = UsuarioM::registrarUsuario($datosU,$tablaDB); 
    
                    if ($respuesta == "OK") {
                        session_start();
                        $_SESSION["Ingreso"] = true;
                        $_SESSION["idUsuario"] = $datosU["id"];

                        if ($_POST["rolR"] == "2"){
                            header("location:index.php?ruta=InmoDashboard");
                        } else {
                            header("location:index.php?ruta=UserDashboard");
                        }
                    }  else if ($respuesta == "El usuario ya existe") {
                        echo '
                        <script type="text/javascript">
                            alert("Ya existe una cuenta con esa identificación.");
                            window.location.href="index.php?ruta=index";
                        </script>
                        ';
                    } else {
                        echo '
                        <script type="text/javascript">
                            alert("Error, intente de nuevo por favor!!");
                        </script>
                        ';
                    }
                }
            }
            
        }
    }

?>