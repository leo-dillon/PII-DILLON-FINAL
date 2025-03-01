<?php 
    require_once "../../clases/modelos/Carrito.php";
    require_once '../../clases/servicios/Conexion.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $respuesta = "";
        $producto_id = $_POST['producto_id'];
        $usuario_id = $_POST['usuario_id'];
        if(empty($usuario_id) || empty($producto_id)){
            $respuesta = "Los datos estan vacios";
        }else{
            $respuesta = Carrito::eliminarProducto($usuario_id, $producto_id);
        }
        echo json_encode($respuesta);
    }
?>