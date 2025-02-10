<?php 
class Producto{
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
}

?>