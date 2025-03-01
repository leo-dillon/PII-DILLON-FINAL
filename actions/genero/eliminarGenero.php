<?php 
    include '../../clases/modelos/Generos.php';
    include '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];  
        if(Producto::existeProductoGenero($id)){
            echo json_encode("existe");
        }else{
            $respuesta = Generos::eliminarGenero(
                $id
            );
            echo json_encode($respuesta);
        }
    }
?>