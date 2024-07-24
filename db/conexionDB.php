<?php 


class Conectar{
    protected $dbh;
    protected static function Conexion(){
        $dsn = 'mysql:host=localhost;dbname=inmueblecasa';
        $username = 'root';
        $password = '';
        try {
            $dbh = new PDO($dsn, $username, $password);
            return $dbh;    
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
            die();
        }
    }
}

?>