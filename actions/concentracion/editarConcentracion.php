<?php 
    include '../../clases/modelos/Concentraciones.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["concentracion"];  
        $id = $_POST["id"];  
        if(Concentraciones::existeConcentracion($nombre)){
            $respuesta = "existe";
        }else{
            $respuesta = Concentraciones::editarConcentracion($id, $nombre);
        }
        echo json_encode($respuesta);
    }
?>