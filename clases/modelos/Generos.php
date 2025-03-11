<?php

class Generos{
    private $id;
    private $nombre;

    public function getId(){
        return $this -> id;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public static function traerGeneros(): array{
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            nombre
            FROM
            genero
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

    public static function traerGenerosDatos(): array{
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            id,
            nombre
            FROM
            genero
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();
    
        $lista = $PDOStatement -> fetchAll();
    
        return $lista;
    }

    public static function crearGenero($nombre){
        $conexion = (new Conexion()) -> getConexion();
        $query = " INSERT INTO 
        genero (nombre) 
        VALUES
        (:nombre)
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> execute([
            "nombre" => $nombre
        ]);
        if ($PDOStatement->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    public static function editarGenero($id, $nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            UPDATE genero
            SET 
                nombre = :nombre
            WHERE id = :id
        ";
        $PDOStatement = $conexion->prepare($query);
    
        $PDOStatement->execute([
            ":id" => $id,
            ":nombre" => $nombre
        ]);
    
        if ($PDOStatement->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }   
    }
    public static function eliminarGenero($id){
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM genero WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            ":id" => $id
        ]);
        if ($PDOStatement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function existeGenero($nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM genero AS g
                WHERE g.nombre = :nombre
            ) AS genero_existe;
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([":nombre" => $nombre]);
        $resultado = $PDOStatement->fetchColumn();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
}