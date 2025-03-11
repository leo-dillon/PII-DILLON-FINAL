<?php class Producto{
    private $producto_id ;
    private $producto_nombre ;
    private $producto_descripcion ;
    private $producto_precio ;
    private $producto_stock ;
    private $producto_marca_id ;
    private $producto_genero_id ;
    private $producto_familia_olfativa_id ;
    private $producto_concentracion_id ;
    private $producto_capacidad ;

    public function getProductoId (){
        return $this -> producto_id;
    }

    public function getProductoNombre (){
        return $this -> producto_nombre;
    }

    public function getProductoDescripcion (){
        return $this -> producto_descripcion;
    }

    public function getProductoPrecio (){
        return $this -> producto_precio;
    }

    public function getProductoStock (){
        return $this -> producto_stock;
    }

    public function getProductoMarcaID (){
        return $this -> producto_marca_id;
    }

    public function getProductoGeneraId (){
        return $this -> producto_genero_id;
    }

    public function getProductoFamiliaOlfativaId (){
        return $this -> producto_familia_olfativa_id;
    }

    public function getProductoConcentracionId (){
        return $this -> producto_concentracion_id;
    }

    public function getProductoCapacidad (){
        return $this -> producto_capacidad;
    }

    public static function traerProductos(): array{
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            p.id,
            p.nombre,
            p.descripcion,
            p.precio,
            p.stock,
            p.imagen,
            m.nombre AS marcaNombre,
            g.nombre AS generoNombre,
            fo.nombre AS familaOlfativaNombre,
            c.nombre AS concentracionNombre,
            p.capacidad
        FROM
            producto AS p
        LEFT JOIN marca AS m
        ON
            p.marca_id = m.id
        JOIN genero AS g
        ON
            p.genero_id = g.id
        JOIN familia_olfativa AS fo
        ON
            p.familia_olfativa_id = fo.id
        JOIN concentracion AS c
        ON
            p.concentracion_id = c.id
        ";  
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();

        $lista = $PDOStatement -> fetchAll();

        return $lista;
    }

    public static function traerProductoMarca( String $marca){
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            p.id,
            p.nombre,
            p.descripcion,
            p.precio,
            p.stock,
            p.imagen,
            m.nombre AS marcaNombre,
            g.nombre AS generoNombre,
            fo.nombre AS familaOlfativaNombre,
            c.nombre AS concentracionNombre,
            p.capacidad
        FROM
            producto AS p
        LEFT JOIN marca AS m
        ON
            p.marca_id = m.id
        JOIN genero AS g
        ON
            p.genero_id = g.id
        JOIN familia_olfativa AS fo
        ON
            p.familia_olfativa_id = fo.id
        JOIN concentracion AS c
        ON
            p.concentracion_id = c.id
        WHERE
            m.nombre = :marca;
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute(["marca" => $marca]);

        $lista = $PDOStatement -> fetchAll();

        return $lista;
    }
    
    public static function traerProductoId( Int $id){
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            p.id,
            p.nombre,
            p.descripcion,
            p.precio,
            p.stock,
            p.imagen,
            m.nombre AS marcaNombre,
            g.nombre AS generoNombre,
            fo.nombre AS familaOlfativaNombre,
            c.nombre AS concentracionNombre,
            p.capacidad
        FROM
            producto AS p
        LEFT JOIN marca AS m
        ON
            p.marca_id = m.id
        JOIN genero AS g
        ON
            p.genero_id = g.id
        JOIN familia_olfativa AS fo
        ON
            p.familia_olfativa_id = fo.id
        JOIN concentracion AS c
        ON
            p.concentracion_id = c.id
        WHERE
            p.id = :id;
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute(["id" => $id]);

        $lista = $PDOStatement -> fetch();

        return $lista;
    }

    public static function cantidadProductos() : array {
        $conexion = (new Conexion()) -> getConexion();
        $query = " SELECT
            COUNT(p.nombre) AS total
        FROM
            producto AS p
        ";  
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute();

        $lista = $PDOStatement -> fetch();
        return $lista;
    }

    public static function crearProdcuto($imagen, $nombre, $descripcion, $precio, $stock, $marca_id, $genero_id, $familia_olfativa_id, $concentracion_id, $capacidad_ml){
        $conexion = (new Conexion()) -> getConexion();
        $query = " INSERT INTO 
            producto (
                imagen,
                nombre, 
                descripcion, 
                precio, 
                stock, 
                marca_id, 
                genero_id, 
                familia_olfativa_id, 
                concentracion_id, 
                capacidad
            ) 
            VALUES
            (
                :imagen,
                :nombre, 
                :descripcion, 
                :precio, 
                :stock, 
                :marca_id, 
                :genero_id, 
                :familia_olfativa_id, 
                :concentracion_id, 
                :capacidad_ml
            )
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> execute([
            "imagen" => $imagen,
            "nombre" => $nombre, 
            "descripcion" => $descripcion, 
            "precio" => $precio, 
            "stock" => $stock, 
            "marca_id" => $marca_id, 
            "genero_id" => $genero_id, 
            "familia_olfativa_id" => $familia_olfativa_id, 
            "concentracion_id" => $concentracion_id, 
            "capacidad_ml" => $capacidad_ml
        ]);
        if ($PDOStatement->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    public static function editarProducto($id, $nombre, $descripcion, $precio, $stock, $marca_id, $genero_id, $familia_olfativa_id, $concentracion_id, $capacidad_ml) {
        $conexion = (new Conexion())->getConexion();
        $query = "
            UPDATE producto
            SET 
                nombre = :nombre, 
                descripcion = :descripcion, 
                precio = :precio, 
                stock = :stock, 
                marca_id = :marca_id, 
                genero_id = :genero_id, 
                familia_olfativa_id = :familia_olfativa_id, 
                concentracion_id = :concentracion_id, 
                capacidad = :capacidad_ml
            WHERE id = :id
        ";
        $PDOStatement = $conexion->prepare($query);
    
        $PDOStatement->execute([
            ":id" => $id,
            ":nombre" => $nombre,
            ":descripcion" => $descripcion,
            ":precio" => $precio,
            ":stock" => $stock,
            ":marca_id" => $marca_id,
            ":genero_id" => $genero_id,
            ":familia_olfativa_id" => $familia_olfativa_id,
            ":concentracion_id" => $concentracion_id,
            ":capacidad_ml" => $capacidad_ml
        ]);
    
        if ($PDOStatement->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    
    public static function eliminarProducto($id) {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM producto WHERE id = :id";
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

    public static function existeProductoNombre($nombre){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM producto AS p
                WHERE p.nombre = :nombre
            ) AS producto_existe;
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

    public static function existeProductoMarca($marca){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM producto AS p
                LEFT JOIN marca AS m
                ON p.marca_id = m.id
                WHERE m.id = :marca
            ) AS producto_existe;
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([":marca" => $marca]);
        $resultado = $PDOStatement->fetchColumn();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public static function existeProductoGenero($genero){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM producto AS p
                LEFT JOIN genero AS g
                ON p.genero_id = g.id
                WHERE g.id = :genero
            ) AS producto_existe;
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([":genero" => $genero]);
        $resultado = $PDOStatement->fetchColumn();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public static function existeProductoFamiliaOlfativa($familiaOlfativa){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM producto AS p
                LEFT JOIN familia_olfativa AS fo
                ON p.familia_olfativa_id = fo.id
                WHERE fo.id = :familiaOlfativa
            ) AS producto_existe;
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([":familiaOlfativa" => $familiaOlfativa]);
        $resultado = $PDOStatement->fetchColumn();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public static function  existeProductoConcentracion($concentracion){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT EXISTS (
                SELECT 1
                FROM producto AS p
                LEFT JOIN concentracion AS c
                ON p.concentracion_id = c.id
                WHERE c.id = :concentracion
            ) AS producto_existe;
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([":concentracion" => $concentracion]);
        $resultado = $PDOStatement->fetchColumn();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public static function traerIDProductoAnteriorPosterior($id){
        $conexion = (new Conexion())->getConexion();
        $query = "
            SELECT 
                (SELECT MAX(id) FROM producto WHERE id < :idProducto) AS producto_anterior,
                (SELECT MIN(id) FROM producto WHERE id > :idProducto) AS producto_siguiente;
        ";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute( ['idProducto' => $id]);

        $lista = $PDOStatement -> fetch();
        return $lista;
    }
    
}