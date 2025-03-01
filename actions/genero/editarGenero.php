<?php 
    include '../../clases/modelos/Generos.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["genero"];  
        $id = $_POST["id"];  
        if(Generos::existeGenero($nombre)){
            $respuesta = "existe";
        }else{
            $respuesta = Generos::editarGenero($id, $nombre);
        }
        echo json_encode($respuesta);
    }
?>