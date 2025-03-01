<?php 
    require_once '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $marca = $_POST['marca'];
        if(!empty($marca)){
            $resultado = Producto::traerProductoMarca($marca);
            header('Content-Type: application/json');
            echo(json_encode($resultado));
        }
    }
?>