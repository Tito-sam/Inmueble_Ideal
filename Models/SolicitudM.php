<?php

require_once("./db/conexionDB.php");

class SolicitudM extends Conectar{
    static public function crearsolicitud($datosS, $tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB WHERE id_inm = :id_inm AND id_user = :id_user";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id_inm", $datosS["id_inm"],PDO::PARAM_INT);
        $sql -> bindParam(":id_user", $datosS["id_user"],PDO::PARAM_INT);
        $sql -> execute();
        $resultado = $sql -> fetch();
        if ($resultado == false) {
            $sql = "INSERT INTO $tablaDB (fecha, id_inm, id_user) VALUES (:fecha, :id_inm, :id_user)";
            $sql = $conectar -> prepare($sql);
            $sql -> bindParam(":fecha", $datosS["fecha"]);
            $sql -> bindParam(":id_inm", $datosS["id_inm"]);
            $sql -> bindParam(":id_user", $datosS["id_user"]);
            if ($sql -> execute()) {
                return "OK" ;
            } else {
                return "ERROR";
            }
        } else {
            return "Ya existe la solicitud";
        }
    }

    static public function mostrarsolicitudes($tablaDB) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        while ($fila = $sql -> fetch()) {
            $resultado []= $fila;
        }
        return $resultado;
    }

    static public function mostrarsolicitudId($tablaDB, $id_sol) {
        $conectar = Conectar::Conexion();
        $sql = "SELECT * FROM $tablaDB WHERE id_sol = :id_sol";
        $sql = $conectar -> prepare($sql);
        $sql -> bindParam(":id_sol", $id_sol, PDO::PARAM_INT);
        $sql -> execute();
        return $resultado = $sql -> fetch();
    }
}

?>