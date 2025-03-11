<?php 
    class Carrito{
        private $id;
        private $cantidad;
        private $usuario_id;
        private $producto_id;
        
        public function getID(){
            return $this -> id;
        }
        
        public function getUsuarioId(){
            return $this -> usuario_id;
        }

        public function getProductoId(){
            return $this -> producto_id;
        }

        public function getCantidad(){
            return $this -> cantidad;
        }

        public static function getCarritoUser($usuario_id) {
            $conexion = (new Conexion) ->getConexion();
            $query = "SELECT
                ca.usuario_id,
                ca.producto_id,
                ca.cantidad,
                po.id,
                po.nombre,
                po.imagen,
                po.precio,
                po.stock
            FROM
                carrito AS ca
            JOIN producto AS po
            ON
                ca.producto_id = po.id
            WHERE
                usuario_id = :usuario_id;";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
            $PDOStatement -> execute([
                'usuario_id' => $usuario_id
            ]);
            $resultado = $PDOStatement -> fetchAll(); 
            return $resultado;
        }

        public static function userProducto($producto_id, $usuario_id){
            $conexion = (new Conexion) ->getConexion();
            $query = "SELECT 
            cantidad 
            from carrito
            WHERE usuario_id = :usuario_id AND producto_id = :producto_id";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement -> execute([
                'producto_id' => $producto_id,
                'usuario_id' => $usuario_id
            ]);
            $resultado = $PDOStatement -> fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public static function updateProducto($usuario_id, $producto_id, $cantidad) {
            $cantidadBase = self::userProducto($producto_id, $usuario_id)["cantidad"];
            $cantidadFinal = $cantidadBase + $cantidad;
            $conexion = (new Conexion()) -> getConexion();
            $query = "UPDATE carrito
                SET cantidad = :cantidad
                WHERE usuario_id = :usuario_id AND producto_id = :producto_id;
             ";
            $PDOStatement = $conexion -> prepare($query);
            header('Content-Type: application/json');
            $resultado = $PDOStatement -> execute([
                'usuario_id' => $usuario_id,
                'producto_id' => $producto_id,
                'cantidad' => $cantidadFinal
            ]);
            if($resultado){
                return "El producto se a actualizado";
            }else{
                return "Se produjo un error inesperado al agregar el producto al carrito, intentalo denuevo más tarde";
            }

        }

        public static function agregarAlCarrito($usuario_id, $producto_id, $cantidad) {
            $conexion = (new Conexion) -> getConexion();
            $query = "INSERT INTO 
                carrito (usuario_id, producto_id, cantidad) 
                VALUES (:usuario_id, :producto_id, :cantidad)
            ";
            $PDOStatement = $conexion->prepare($query);
            header('Content-Type: application/json');
            $resultado = $PDOStatement -> execute([
                'usuario_id' => $usuario_id,
                'producto_id' => $producto_id,
                'cantidad' => $cantidad
            ]);
            if($resultado){
                return "producto agregado al carrito satisfactoriamente";
            }else{
                return "Se produjo un error inesperado al agregar el producto al carrito, intentalo denuevo más tarde";
            }
        }

        public static function eliminarProducto($usuario_id, $producto_id){
            $conexion = (new Conexion) -> getConexion();
            $query = "DELETE FROM 
            carrito
            WHERE usuario_id = :usuario_id AND producto_id = :producto_id;
            ";
            $PDOStatement = $conexion->prepare($query);
            header('Content-Type: application/json');
            $resultado = $PDOStatement -> execute([
                'usuario_id' => $usuario_id,
                'producto_id' => $producto_id
            ]);
            if($resultado){
                return "producto eliminado del carrito";
            }else{
                return "Se produjo un error inesperado al eliminar el producto, intentelo denuevo más adelante";
            }

        }
    }