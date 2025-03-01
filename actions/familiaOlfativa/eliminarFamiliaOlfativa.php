<?php 
    include '../../clases/modelos/FamiliasOlfativas.php';
    include '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];  
        if(Producto::existeProductoFamiliaOlfativa($id)){
            $respuesta = "existe";
        }else{
            $respuesta = FamiliasOlfativas::eliminarFamiliaOlfativa(
                $id
            );
        }
        echo json_encode($respuesta);
    }
?>