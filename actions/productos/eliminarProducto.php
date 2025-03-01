<?php 
    include '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];  
        $respuesta = Producto::eliminarProducto(
            $id
        );
        echo json_encode($respuesta);
    }
?>