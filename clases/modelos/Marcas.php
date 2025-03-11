<?php
class Marcas{
    private $id;
    private $nombre;

    public function getId(){
        return $this -> id;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public static function traerMarcas(): array{
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            nombre
            FROM
            marca
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

    public static function traerMarcasDatos(){
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            id,
            nombre
            FROM
            marca
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();
    
        $lista = $PDOStatement -> fetchAll();
    
        return $lista;
    }
    public static function crearMarca($nombre){
        $conexion = (new Conexion()) -> getConexion();
        $query = " INSERT INTO 
        marca (nombre) 
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

    public static function editarMarca($id, $nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            UPDATE marca
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
    public static function eliminarMarca($id){
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM marca WHERE id = :id";
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
    public static function existeMarca($nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM marca AS m
                WHERE m.nombre = :nombre
            ) AS marca_existe;
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