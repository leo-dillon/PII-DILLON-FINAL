<?php

class Concentraciones{
    private $id;
    private $nombre;

    public function getId(){
        return $this -> id;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public static function traerConcentraciones(): array{
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            nombre
            FROM
            concentracion
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();
        $lista = $PDOStatement -> fetchAll();
        $arrayLista = [];
        foreach($lista as $value){
            $arrayLista[] = $value['nombre'];
        }
        return $arrayLista;
    }
}
?>