<?php 
    require_once "../../clases/modelos/Carrito.php";
    require_once '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $respuesta = '';
        $usuario_id = $_POST['usuario_id'];
        $respuesta = Carrito::getCarritoUser($usuario_id);
        echo json_encode($respuesta);
    }
?>