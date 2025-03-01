<?php 
    require_once "../../clases/modelos/Carrito.php";
    require_once '../../clases/servicios/Conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $respuesta = '';
        $producto_id = $_POST['producto_id'];
        $usuario_id = $_POST['usuario_id'];
        $cantidad = $_POST['cantidad'];
        if(empty($usuario_id) || empty($producto_id) || empty($cantidad)){
            $respuesta = "los datos estan vacios";
        }else{
            if( Carrito::userProducto($producto_id, $usuario_id)){
                $respuesta = Carrito::updateProducto($usuario_id, $producto_id, $cantidad);
            }else{
                $respuesta = Carrito::agregarAlCarrito($usuario_id, $producto_id, $cantidad);
            }
        }
        echo json_encode($respuesta);
    }
?>