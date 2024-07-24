<?php

require_once("./db/conexionDB.php");

class UsuarioM extends Conectar{

    static public function registrarUsuario($datosU,$tablaDB) {
        $conectar = Conectar::Conexion();
        
        $sql = "SELECT * FROM $tablaDB WHERE id = :id";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id", $datosU["id"],PDO::PARAM_INT);
        $sql -> execute();
        $resultado = $sql -> fetch();
        if ($resultado == false) {
            $sql = "INSERT INTO $tablaDB (id,nombre,apellidos,telefono,correo,clave,rol) VALUES (:id,:nombre,:apellidos,:telefono,:correo,:clave, :rol)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindParam(":id", $datosU["id"], PDO::PARAM_INT);
            $sql -> bindParam(":nombre", $datosU["nombre"], PDO::PARAM_STR);
            $sql -> bindParam(":apellidos", $datosU["apellidos"], PDO::PARAM_STR);
            $sql -> bindParam(":telefono", $datosU["telefono"], PDO::PARAM_INT);
            $sql -> bindParam(":correo", $datosU["correo"], PDO::PARAM_STR);
            $sql -> bindParam(":clave", $datosU["clave"], PDO::PARAM_STR);
            $sql -> bindParam(":rol", $datosU["rol"], PDO::PARAM_STR);
            if($sql -> execute()) {
                return "OK";
            }
            else {
                return "ERROR";
            }
        } else {
            return "El usuario ya existe";
        }
    }

    static public function ingresoUsuario($datosU, $tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB WHERE correo = :correo";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":correo", $datosU["correo"],PDO::PARAM_STR);
        $sql -> execute();
        return $resultado = $sql -> fetch(); 
    }

    static public function mostrarUsuarioId($id, $tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB WHERE id = :id";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id", $id,PDO::PARAM_INT);
        $sql -> execute();
        return $resultado = $sql -> fetch(); 
    }
}

?>