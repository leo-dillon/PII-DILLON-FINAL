<?php

class FamiliasOlfativas{
    private $id;
    private $nombre;

    public function getId(){
        return $this -> id;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public static function traerFamiliasOlfativas(): array{
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            nombre
            FROM
            familia_olfativa
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

    public static function traerFamiliasOlfativasDatos(){
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            id,
            nombre
            FROM
            familia_olfativa
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();

        $lista = $PDOStatement -> fetchAll();

        return $lista;
    }

    public static function crearFamiliaOlfativa($nombre){
        $conexion = (new Conexion()) -> getConexion();
        $query = " INSERT INTO 
        familia_olfativa (nombre) 
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
    public static function editarFamiliaOlfativa($id, $nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            UPDATE familia_olfativa
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
    public static function eliminarFamiliaOlfativa($id){
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM familia_olfativa WHERE id = :id";
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
    public static function existeFamiliaOlfativa($nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM familia_olfativa AS fo
                WHERE fo.nombre = :nombre
            ) AS familiaOlfativa_existe;
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
?>