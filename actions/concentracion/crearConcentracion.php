<?php 
    include '../../clases/modelos/Concentraciones.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["concentracion"];  
        if(Concentraciones::existeConcentracion($nombre)){
            $respuesta = "existe";
        }else{
            $respuesta = Concentraciones::crearConcentracion($nombre);
        }
        echo json_encode($respuesta);
    }
?>