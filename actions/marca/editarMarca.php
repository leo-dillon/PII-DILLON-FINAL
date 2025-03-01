<?php 
    include '../../clases/modelos/Marcas.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["marca"];  
        $id = $_POST["id"];  
        if(Marcas::existeMarca($nombre)){
            $respuesta = "existe";
        }else{
            $respuesta = Marcas::editarMarca($id, $nombre);
        }
        echo json_encode($respuesta);
    }
?>