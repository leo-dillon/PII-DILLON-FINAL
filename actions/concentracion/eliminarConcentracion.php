<?php 
    include '../../clases/modelos/Concentraciones.php';
    include '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];  
        if(Producto::existeProductoConcentracion($id)){
            $respuesta = "existe";
        }else{
            $respuesta = Concentraciones::eliminarConcentracion(
                $id
            );
        }
        echo json_encode($respuesta);
    }
?>