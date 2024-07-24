<?php

require_once("./db/conexionDB.php");

class InmuebleM extends Conectar{
    static public function mostrarinmuebles($tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB ";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        while ($fila = $sql -> fetch()) {
            $resultado []= $fila;
        }
        return $resultado;
    }

    static public function mostrarinmueble($tablaDB, $id) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB WHERE id = :id";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id",$id,PDO::PARAM_INT);
        $sql -> execute();
        return $resultado = $sql -> fetch();
    }

    static public function ingresarinmuebles($tablaDB, $datosI) {
        $conectar = Conectar::Conexion();
        $sql = "INSERT INTO $tablaDB (tipo, categoria, precio, tamaño, ciudad, barrio, foto) VALUES (:tipo, :categoria, :precio, :tamano, :ciudad, :barrio, :foto)";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":tipo", $datosI["tipo"], PDO::PARAM_STR);
        $sql -> bindParam(":categoria", $datosI["categoria"], PDO::PARAM_STR);
        $sql -> bindParam(":precio", $datosI["precio"], PDO::PARAM_INT);
        $sql -> bindParam(":tamano", $datosI["tamaño"], PDO::PARAM_INT);
        $sql -> bindParam(":ciudad", $datosI["ciudad"], PDO::PARAM_STR);
        $sql -> bindParam(":barrio", $datosI["barrio"], PDO::PARAM_STR);
        $sql -> bindParam(":foto", $datosI["foto"], PDO::PARAM_STR);
        if($sql -> execute()) {
            return "OK";
        }
        else {
            return "ERROR";
        }
    }

    static public function editarinmueble($datosI, $tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "UPDATE $tablaDB SET tipo = IFNULL(:tipo, tipo), categoria = IFNULL(:categoria, categoria), precio = IFNULL(:precio, precio), tamaño = IFNULL(:tam, tamaño), ciudad = IFNULL(:ciudad, ciudad), barrio = IFNULL(:barrio, barrio) WHERE id = :id";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id", $datosI["id"], $datosI["id"] != null ? PDO::PARAM_INT : PDO::PARAM_NULL);
        $sql -> bindParam(":tipo", $datosI["tipo"], $datosI["tipo"] != null ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $sql -> bindParam(":categoria", $datosI["categoria"], $datosI["categoria"] != null ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $sql -> bindParam(":precio", $datosI["precio"], $datosI["precio"] != null ? PDO::PARAM_INT : PDO::PARAM_NULL);
        $sql -> bindParam(":tam", $datosI["tam"], $datosI["tam"] != null ? PDO::PARAM_INT : PDO::PARAM_NULL);
        $sql -> bindParam(":ciudad", $datosI["ciudad"], $datosI["ciudad"] != null ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $sql -> bindParam(":barrio", $datosI["barrio"], $datosI["barrio"] != null ? PDO::PARAM_STR : PDO::PARAM_NULL);
        if($sql -> execute()) {
            return "OK";
        }
        else {
            return "ERROR";
        }
    }

    static public function eliminarinmueble($id, $tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "DELETE  FROM $tablaDB WHERE id = :id";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id",$id,PDO::PARAM_INT);
        if($sql -> execute()) {
            return "OK";
        }
        else {
            return "ERROR";
        }
    }
}
?>