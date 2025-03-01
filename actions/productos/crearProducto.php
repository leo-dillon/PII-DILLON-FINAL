<?php 
    include '../../clases/modelos/Productos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $imagen = $_POST["imagenLimpia"];  
        $nombre = $_POST["nombre"];  
        $descripcion = $_POST["descripcion"];  
        $precio = $_POST["precio"]; 
        $stock = $_POST["stock"];
        $marca_id = $_POST["marca"];  
        $genero_id = $_POST["genero"];
        $familiaOlfativa_id = $_POST["familiaOlfativa"];
        $concentracion_id = $_POST["concentracion"];  
        $capacidad = $_POST["capacidad"];  
        if(Producto::existeProductoNombre($nombre)){
            $respuesta = "existe";
        }else{
            $respuesta = Producto::crearProdcuto(
                $imagen,
                $nombre,
                $descripcion,
                $precio,
                $stock,
                $marca_id,
                $genero_id,
                $familiaOlfativa_id,
                $concentracion_id,
                $capacidad
            );
        }
        echo json_encode($respuesta);
    }
?>