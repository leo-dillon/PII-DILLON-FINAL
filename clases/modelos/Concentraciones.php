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

    public static function traerDatosConcentraciones(){
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
                id,
                nombre
            FROM
            concentracion
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();

        $lista = $PDOStatement -> fetchAll();

        return $lista;
    }

    public static function crearConcentracion($nombre){
        $conexion = (new Conexion()) -> getConexion();
        $query = " INSERT INTO 
        concentracion (nombre) 
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
    public static function editarConcentracion($id, $nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            UPDATE concentracion
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
    public static function eliminarConcentracion($id){
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM concentracion WHERE id = :id";
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
    public static function existeConcentracion($nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM concentracion AS c
                WHERE c.nombre = :nombre
            ) AS concentracion_existe;
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