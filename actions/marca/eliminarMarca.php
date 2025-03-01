<?php 
    include '../../clases/modelos/Marcas.php';
    include '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];  
        if(Producto::existeProductoMarca($id)){
            echo json_encode("existe");
        }else{
            $respuesta = Marcas::eliminarMarca(
                $id
            );
            echo json_encode($respuesta);
        }
    }
?>